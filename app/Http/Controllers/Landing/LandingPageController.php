<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Model\Landing\Struktur;
use App\Model\Landing\Divisi;
use App\Model\Landing\Ketua;
use App\Model\Landing\Berita;
use App\Model\Landing\Visimisi;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function home()
    {
        $data['panjattebing'] = Divisi::where('title', 'Panjat Tebing')->first();
        $data['gununghutan'] = Divisi::where('title', 'Gunung Hutan')->first();
        $data['susugua'] = Divisi::where('title', 'Susur Gua')->first();
        $data['berita'] = Berita::orderBy('created_at', 'desc')->get()->take(6);

        return view('landing.home', $data);
    }

    public function sejarah()
    {
        $data = Ketua::orderBy('mulai', 'asc')->get();
        return view('landing.sejarah', compact('data'));
    }

    public function visiMisi()
    {
        $data['visi'] = Visimisi::where('category', 'visi')->first();
        $data['misi'] = Visimisi::where('category', 'misi')->get();
        return view('landing.visimisi', $data);
    }

    public function strukturPengurus()
    {
        $data = Struktur::select('image')->first();
        return view('landing.struktur', compact('data'));
    }

    public function kontak()
    {
        return view('landing.kontak');
    }

    public function berita()
    {
        $data = Berita::orderBy('created_at', 'desc')->paginate(4);

        return view('landing.berita', compact('data'));
    }

    public function hotberita()
    {
        $hotberita = Berita::orderBy('created_at', 'desc')->get()->take(5);

        return response()->json([
            "status" => true,
            "html" => view('landing.hotberita', compact("hotberita"))->render()
        ], 200);
    }

    public function beritaKegiatan()
    {
        $data = Berita::where('category', 'kegiatan')->orderBy('created_at', 'desc')->paginate(4);

        return view('landing.beritakegiatan', compact('data'));
    }

    public function beritaFeature()
    {
        $data = Berita::where('category', 'feature')->orderBy('created_at', 'desc')->paginate(4);

        return view('landing.beritafeature', compact('data'));
    }

    public function beritaOpini()
    {
        $data = Berita::where('category', 'opini')->orderBy('created_at', 'desc')->paginate(4);

        return view('landing.beritaopini', compact('data'));
    }

    public function detailberita(Request $request, $id)
    {
        $data = Berita::findOrFail($id);

        return view('landing.detailberita', compact('data'));
    }

    // bulan
    public function mont(Request $request)
    {
        $bulan = Berita::whereMonth('created_at', $request->month)->paginate(4);

        return response()->json([
            "status" => true,
            "html" => view('landing.beritaJan', compact("bulan"))->render()
        ], 200);
    }
}
