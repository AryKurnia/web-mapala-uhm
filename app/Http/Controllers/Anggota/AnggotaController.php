<?php

namespace App\Http\Controllers\Anggota;

use Illuminate\Database\Eloquent\Builder;
use App\Http\Controllers\Controller;
use App\Model\Admin\Perlengkapan;
use Illuminate\Http\Request;
use App\Model\Admin\Anggota;
use App\Model\Admin\Iuran;
use Validator, Auth, File;
use App\User;

class AnggotaController extends Controller
{
    public function index(Request $request)
    {
        $anggota = Anggota::with(['user' => function ($query) {
            $query->where('level', '<>', 'admin')->where('is_active', 1);
        }, 'atribut' => function ($query) {
            $query->where('identitas', 'like', 'Slayer%');
        }])->whereHas('user', function (Builder $query) {
            $query->where('level', '<>', 'admin')->where('is_active', 1);
        })->where('nama', '<>', 'Admin')->get();
        
        return view('anggota.useranggota.index', compact('anggota'));
    }

    public function detail($id)
    {
        $user = Anggota::with('atribut', 'user')->findOrFail($id);

        $this->iduser = $user->user_id;

        $iuran = Iuran::with(['users' => function ($query) {
            $query->where('users.id', $this->iduser);
        }])->get();
        // dd($iuran[0]->users[0]->pivot);

        return view('anggota.useranggota.detail', compact('user', 'iuran'));
    }

    public function perlengkapan()
    {
        $perlengkapan = Perlengkapan::all();
        return view('anggota.perlengkapan.perlengkapan', compact('perlengkapan'));
    }

    public function detailPerlengkapan(Request $request)
    {
        $detail = Perlengkapan::findOrFail($request->id_data);

        return response()->json([
            "status" => true,
            "html" => view('anggota.perlengkapan.detail', compact('detail'))->render(),
        ], 200);
    }

    public function editProfil($id)
    {
        $profil = Anggota::with('atribut', 'user')->where('user_id', $id)->firstOrFail();
        return view('anggota.profil.edit', compact('profil'));
    }

    public function updateProfil(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'username' => 'required',
            'angkatan' => 'required|max:30',
            'email' => 'unique:users,email,' . Auth::id(),
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $anggota = Anggota::find($request->id_data);
            $anggota->nama = $request->nama;
            $anggota->angkatan = $request->angkatan;
            $anggota->alamat = $request->alamat;
            $anggota->no_telp = $request->nohp;
            $anggota->ket = $request->keterangan;
            $anggota->save();

            $user = User::find($anggota->user_id);
            $user->email = $request->email;
            $user->name = $request->username;
            $user->save();

            return response()->json([
                "status" => true,
                "message" => 'Profil Berhasil di update',
            ], 200);
        }
    }

    public function updateFoto(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'foto.required' => 'foto tidak boleh kosong !',
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max' => 'size image melebihi batas 2 MB !',
        ]);

        if ($validasi->fails()) {
            response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $profile = Anggota::select('image')->where('user_id', Auth::id())->firstOrFail();
            File::delete('assets/images/anggota/' . $profile->image);
            $file = $request->file('foto');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $storage = 'assets/images/anggota';
            $file->move($storage, $nama_file);
            $image = $nama_file;

            Anggota::where('user_id', Auth::id())->update([
                'image' => $image,
            ]);

            return response()->json([
                "status" => true,
                "message" => 'Foto berhasil di update !',
            ], 200);
        }
    }

    public function updatePassword(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'password' => 'required',
        ], [
            'password.required' => 'password tidak boleh kosong !',
        ]);

        if ($validasi->fails()) {
            response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $profil = User::find(Auth::id());
            $profil->password = bcrypt($request->password);
            $profil->save();

            return response()->json([
                "status" => true,
                "message" => 'password berhasil di ubah !',
            ], 200);
        }
    }

    public function viewfoto(Request $request)
    {
        $data = Anggota::find($request->id_data);

        return response()->json([
            "status" => true,
            "html" => view('anggota.profil.foto', compact("data"))->render()
        ], 200);
    }
}
