<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Perlengkapan;
use Validator, File;

class PerlengkapanController extends Controller
{
    public function index()
    {
        $perlengkapan = Perlengkapan::all();

        return view('admin.perlengkapan.index', compact('perlengkapan'));
    }

    public function formperlengkapan()
    {
        return response()->json([
            "status" => true,
            "html" => view('admin.perlengkapan.form')->render()
        ], 200);
    }

    public function loadgambar(Request $request)
    {
        $data = Perlengkapan::select('gambar')->where('id', $request->id_data)->first();

        return response()->json([
            "status" => true,
            "html" => view('admin.perlengkapan.gambar', compact('data'))->render()
        ], 200);
    }

    public function simpan(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max'   => 'size image melebihi batas 2 MB !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first()
            ], 200);
        } else {

            if ($request->has('foto')) {

                $file = $request->file('foto');
                $nama_file = time()."_".$file->getClientOriginalName();
                $storage = 'assets/images/perlengkapan';
                $file->move($storage,$nama_file);

            }

            $perlengkapan = new Perlengkapan();
            $perlengkapan->nama = $request->perlengkapan;
            $perlengkapan->jumlah = $request->jumlah;
            $perlengkapan->merek = $request->merek;
            $perlengkapan->warna = $request->warna;
            $perlengkapan->kondisi = $request->kondisi;
            $perlengkapan->jenis = $request->jenis;
            if ($request->has('foto')) {
                $perlengkapan->gambar = $nama_file;
            } else {
                $perlengkapan->gambar = null;
            }
            $perlengkapan->save();

            return response()->json([
                'status' => true,
                'message' => "Success"
            ], 200);
        }
    }

    public function edit(Request $request)
    {
        $data = Perlengkapan::find($request->id_data);

        return response()->json([
            "status" => true,
            "html" => view('admin.perlengkapan.edit', compact('data'))->render()
        ], 200);
    }

    public function update(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'foto' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'foto.image' => 'file yang di upload harus file image !',
            'foto.mimes' => 'format image tidak diketahui (jpeg,png,jpg) !',
            'foto.max'   => 'size image melebihi batas 2 MB !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first()
            ], 200);
        } else {
            $perlengkapan = Perlengkapan::find($request->id_data);

            if ($request->has('foto')) {
                File::delete('assets/images/perlengkapan/' . $perlengkapan->gambar);

                $file = $request->file('foto');
                $nama_file = time()."_".$file->getClientOriginalName();
                $storage = 'assets/images/perlengkapan';
                $file->move($storage,$nama_file);
                $perlengkapan->gambar = $nama_file;
            }

            $perlengkapan->nama = $request->perlengkapan;
            $perlengkapan->jumlah = $request->jumlah;
            $perlengkapan->merek = $request->merek;
            $perlengkapan->warna = $request->warna;
            $perlengkapan->kondisi = $request->kondisi;
            $perlengkapan->jenis = $request->jenis;
            $perlengkapan->save();

            return response()->json([
                'status' => true,
                'message' => "Success"
            ], 200);
        }

    }

    public function delete(Request $request)
    {
        try {
            $data = Perlengkapan::find($request->id_data);
            File::delete('assets/images/perlengkapan/' . $data->gambar);

            $data->delete();

            return response()->json([
                "status" => true,
                "message" => 'perlengkapan berhasil di hapus !',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message" => 'perlengkapan gagal di hapus !',
            ], 200);
        }
    }
}
