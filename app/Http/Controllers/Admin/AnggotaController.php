<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Http\Controllers\Controller;
use App\Model\Admin\Identitas;
use Illuminate\Http\Request;
use App\Model\Admin\Anggota;
use Carbon\Carbon;
use Validator, File, Auth;
use App\User;

class AnggotaController extends Controller
{
    public function index()
    {
        $user = User::with(['anggota' => function ($query) {
            $query->where('nama', '<>','Admin');
        }])->where('is_active', 1)->where('level', '<>', 'admin')->orderBy('nia', 'asc')->get();
        return view('admin.anggota.index', compact('user'));
    }

    public function detailanggota(Request $request)
    {
        $data = Anggota::find($request->id_data);

        return response()->json([
            "status" => true,
            "html" => view('admin.anggota.detail', compact("data"))->render()
        ], 200);
    }

    public function formanggota()
    {
        $identitas = Identitas::select('id','identitas')->get();
        return response()->json([
            "status" => true,
            "html" => view('admin.anggota.form', compact('identitas'))->render()
        ], 200);
    }

    public function simpan(Request $request)
    {
        try {
            $validasi = Validator::make($request->all(), [
                'foto'      => 'file|image|mimes:jpeg,png,jpg|max:2048',
                'nia'       => 'required|unique:users,nia',
                'username'  => 'required',
                'password'  => 'required',
                'nama'      => 'required',
                'angkatan'  => 'required',
                'atribut'   => 'required',
            ], [
                'foto.image' => 'file yang di upload harus file image !',
                'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
                'foto.max'   => 'size image melebihi batas 2 MB !',
                'nia.unique' => 'nia sudah terdaftar, ganti dengan nia yang lain !'
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validasi->errors()->first()
                ], 200);
            } else {

                if ($request->hasFile('foto')) {
                    $file = $request->file('foto');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $storage = 'assets/images/anggota';
                    $file->move($storage,$nama_file);
                    $image = $nama_file;
                } else {
                    $image = null;
                }

                $atributs = $request->atribut;

                $create = User::create([
                    'nia'       => $request->nia,
                    'name'      => $request->username,
                    'level'     => 'anggota',
                    'email'     => $request->email,
                    'password'  => bcrypt($request->password),
                ]);

                $anggota = Anggota::create([
                    'nama'      => $request->nama,
                    'jurusan'   => $request->jurusan,
                    'category'  => $request->kategori,
                    'user_id'   => $create->id,
                    'angkatan'  => $request->angkatan,
                    'image'     => $image,
                ]);


                foreach ($atributs as $atribut) {
                    Anggota::find($anggota->id)->atribut()->attach($atribut, [
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ]);
                }

                return response()->json([
                    "status" => true,
                    "message" => 'User berhasil di buat !',
                ], 200);
            }

        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => 'User gagal di buat !',
            ], 500);
        }

    }

    public function edituser(Request $request)
    {
        $data = User::with('anggota')->find($request->id_data);
        $this->id = $data->id;
        $identitas = Identitas::with(['atribut' => function ($query) {
            $query->where('user_id', $this->id);
        }])->select('id','identitas')->get();

        return response()->json([
            "status" => true,
            "html" => view('admin.anggota.edit', compact('data','identitas'))->render()
        ], 200);
    }

    public function update(Request $request)
    {
        try {
            $validasi = Validator::make($request->all(), [
                'nia'       => 'required',
                // 'username'  => 'required',
                // 'angkatan'  => 'required',
                // 'nama'      => 'required',
                // 'alamat'    => 'required',
                // 'no_telp'   => 'required|max:15',
                // 'ket'       => 'required',
                // 'atribut'   => 'required',
                'foto'      => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validasi->errors()->first()
                ], 200);
            } else {
                User::find($request->id_data)->update([
                    'nia'   => $request->nia,
                    'name'  => $request->username,
                    'email'  => $request->email,
                ]);

                $anggota = Anggota::findOrFail($request->id_anggota);
                $anggota->angkatan = $request->angkatan;
                $anggota->nama = $request->nama;
                $anggota->jurusan = $request->jurusan;
                $anggota->alamat = $request->alamat;
                $anggota->no_telp = $request->no_telp;
                $anggota->ket = $request->ket;
                $anggota->category = $request->kategori;
                if ($request->hasFile('foto')) {
                    File::delete('assets/images/anggota/' . $anggota->image);
                    $file = $request->file('foto');
                    $nama_file = time()."_".$file->getClientOriginalName();
                    $storage = 'assets/images/anggota';
                    $file->move($storage,$nama_file);
                    $image = $nama_file;
                    $anggota->image = $nama_file;
                }

                $anggota->save();

                $atributs = $request->atribut;

                if (!empty($atributs)) {
                    Anggota::find($anggota->id)->atribut()->sync($atributs);
                }

                return response()->json([
                    "status" => true,
                    "message" => 'Akun user berhasil di update !',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => 'Akun user gagal di update !',
            ], 500);
        }
    }

    public function delete(Request $request)
    {
        try {

            $data = User::find($request->id_data);
            // $anggota = Anggota::where('user_id', $data->id)->first();
            // if ($anggota->image != null) {
            //     File::delete('assets/images/anggota/' . $anggota->image);
            // }
            $data->is_active = 0;
            $data->save();
            // $anggota->delete();

            return response()->json([
                "status" => true,
                "message" => 'Akun user berhasil di hapus !',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message" => 'Akun user gagal di hapus !',
            ], 200);
        }
    }

    public function resetPasssword(Request $request)
    {
        try {
            $user = User::findOrFail($request->id);
            $pass = explode(".", $user->nia);
            $user->password = bcrypt($pass[0]);
            $user->save();

            return response()->json([
                "status" => true,
                "message" => 'Password berhasil di reset !',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => 'Password gagal di reset !',
            ], 500);
        }
    }
}
