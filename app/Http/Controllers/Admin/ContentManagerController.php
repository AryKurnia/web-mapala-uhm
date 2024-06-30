<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Landing\Struktur;
use App\Model\Landing\Berita;
use App\Model\Landing\Divisi;
use App\Model\Landing\Ketua;
use App\Model\Landing\Visimisi;
use Illuminate\Http\Request;
use File, Validator;

class ContentManagerController extends Controller
{
    //=========================== divisi ===========================//

    public function beranda()
    {
        return view('admin.landing_manager.beranda');
    }

    public function listDivisi()
    {
        $divisi = Divisi::all();

        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.listdivisi', compact("divisi"))->render(),
        ], 200);
    }

    public function editDivisi(Request $request, $id)
    {
        $divisi = Divisi::findOrFail($id);

        return view('admin.landing_manager.editdivisi', compact("divisi"));
    }

    public function updateDivisi(Request $request)
    {
        try {
            $divisi = Divisi::findOrFail($request->id_data);
            $divisi->description = $request->desc;
            $divisi->save();

            return response()->json([
                "status" => true,
                "message" => 'Success',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => 'Failed',
            ], 200);
        }
    }

    //=========================== struktur pengurus ===========================//

    public function struktur()
    {
        $data = Struktur::select('id')->first();
        return view('admin.landing_manager.struktur', compact('data'));
    }

    public function uploadStruktur(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max' => 'size image melebihi batas 2 MB !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {

            if ($request->has('id_data')) {
                $struktur = Struktur::findOrFail($request->id_data);

                File::delete('assets/images/struktur/' . $struktur->image);
                $file = $request->file('foto');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $storage = 'assets/images/struktur';
                $file->move($storage, $nama_file);
                $struktur->image = $nama_file;
                $struktur->save();
            } else {
                $newStruktur = new Struktur();
                $file = $request->file('foto');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $storage = 'assets/images/struktur';
                $file->move($storage, $nama_file);
                $newStruktur->image = $nama_file;
                $newStruktur->save();
            }

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }
    }

    public function image()
    {
        $struktur = Struktur::select('id', 'image')->first();

        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.image', compact("struktur"))->render(),
        ], 200);
    }

    //=========================== berita ===========================//

    public function berita()
    {
        return view('admin.landing_manager.berita');
    }

    public function createBerita()
    {
        return view('admin.landing_manager.createberita');
    }

    public function storeBerita(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto'      => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'title'     => 'required|max:255',
            'desc'      => 'required',
            'kategori'  => 'required',
        ], [
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max' => 'size image melebihi batas 2 MB !',
            'title.max' => 'title image melebihi batas 255 karakter !',
            'title.required' => 'title berita harus di isi terlebih dahulu ',
            'desc.required' => 'deskripsi berita harus di isi terlebih dahulu ',
            'kategori.required' => 'kategori berita harus di isi terlebih dahulu ',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $berita = new Berita();
            $berita->title = $request->title;
            $berita->description = $request->desc;
            $berita->category = $request->kategori;
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $storage = 'assets/images/beritas';
                $file->move($storage, $nama_file);
                $image = $nama_file;
                $berita->image = $image;
            }
            $berita->save();

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }
    }

    public function listBerita()
    {
        $berita = Berita::select('id', 'title')->orderBy('created_at', 'desc')->paginate(15);

        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.listberita', compact("berita"))->render(),
        ], 200);
    }

    public function editBerita(Request $request, $id)
    {
        $data = Berita::findOrFail($id);

        return view('admin.landing_manager.editberita', compact('data'));
    }

    public function updateBerita(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|max:100',
            'desc' => 'required',
            'kategori'  => 'required',
        ], [
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max' => 'size image melebihi batas 2 MB !',
            'title.required' => 'judul berita tidak boleh kosong !',
            'title.max' => 'judul berita tidak boleh lebih 100 karakter !',
            'desc.required' => 'deskripsi berita tidak boleh kosong !',
            'kategori.required' => 'kategori berita tidak boleh kosong !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $berita = Berita::findOrFail($request->id_berita);
            $title = $request->title;
            $description = $request->desc;
            $kategori = $request->kategori;

            if ($request->hasFile('foto')) {
                File::delete('assets/images/beritas/' . $berita->image);
                $file = $request->file('foto');
                $nama_file = time() . "_" . $file->getClientOriginalName();
                $storage = 'assets/images/beritas';
                $file->move($storage, $nama_file);
                $berita->image = $nama_file;
                $berita->title = $title;
                $berita->description = $description;
                $berita->category = $kategori;
            } else {
                $berita->title = $title;
                $berita->description = $description;
                $berita->category = $kategori;
            }

            $berita->save();

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }
    }

    public function deleteBerita(Request $request)
    {
        try {
            $data = Berita::find($request->id_data);
            File::delete('assets/images/beritas/' . $data->image);

            $data->delete();

            return response()->json([
                "status" => true,
                "message" => 'berita berhasil di hapus !',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message" => 'berita gagal di hapus !',
            ], 200);
        }
    }

    //=========================== Sejarah ===========================//

    public function ketua()
    {
        $ketua = Ketua::all();
        return view('admin.landing_manager.ketua', compact('ketua'));
    }

    public function formketua()
    {
        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.formketua')->render()
        ], 200);
    }

    public function storeKetua(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama' => 'required',
            'periode' => 'required',
        ], [
            'nama.required' => 'nama harus di isi !',
            'periode.required' => 'periode harus di isi !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $periode = explode(' - ', $request->periode);

            $begin = $periode[0];
            $end = $periode[1];

            $ketua = new Ketua();
            $ketua->nama = $request->nama;
            $ketua->mulai = date('Y-m-d', strtotime($begin));
            $ketua->akhir = date('Y-m-d', strtotime($end));
            $ketua->save();

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }
    }

    public function deleteKetua(Request $request)
    {
        Ketua::destroy($request->id_data);

        return response()->json([
            "status" => true,
            "message" => 'Ketua berhasil di hapus !',
        ], 200);
    }

    public function visimisi()
    {
        $data = Visimisi::all();
        return view('admin.landing_manager.visimisi', compact('data'));
    }

    public function createVisiMisi()
    {
        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.formvisimisi')->render()
        ], 200);
    }

    public function storeVisimisi(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'visimisi' => 'required',
            'kategori' => 'required',
        ], [
            'visimisi.required' => 'visi / misi harus di isi !',
            'kategori.required' => 'kategori harus di isi !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $visimisi =  new Visimisi();
            $visimisi->visimisi = $request->visimisi;
            $visimisi->category = $request->kategori;
            $visimisi->save();

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }

    }

    public function editVisiMisi(Request $request)
    {
        $data = Visimisi::findOrFail($request->id);

        return response()->json([
            "status" => true,
            "html" => view('admin.landing_manager.editvisimisi', compact('data'))->render()
        ], 200);
    }

    public function updateVisimisi(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'visimisi' => 'required',
            'kategori' => 'required',
        ], [
            'visimisi.required' => 'visi / misi harus di isi !',
            'kategori.required' => 'kategori harus di isi !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first(),
            ], 200);
        } else {
            $visimisi =  Visimisi::findOrFail($request->id_data);
            $visimisi->visimisi = $request->visimisi;
            $visimisi->category = $request->kategori;
            $visimisi->save();

            return response()->json([
                'status' => true,
                'message' => "Success",
            ], 200);
        }

    }

    public function deleteVisiMisi(Request $request)
    {
        Visimisi::destroy($request->id_data);

        return response()->json([
            "status" => true,
            "message" => 'visi / misi berhasil di hapus !',
        ], 200);
    }
}
