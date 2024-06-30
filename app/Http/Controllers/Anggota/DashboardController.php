<?php

namespace App\Http\Controllers\Anggota;

use App\Http\Controllers\Controller;
use App\Model\Admin\Perlengkapan;
use App\Model\Admin\Anggota;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['pendiri'] = Anggota::where('category', 'Pendiri')->count();
        $data['istimewa'] = Anggota::where('category', 'Anggota Istimewa')->count();
        $data['kehormatan'] = Anggota::where('category', 'Anggota Kehormatan')->count();
        $data['penuh'] = Anggota::where('category', 'Anggota Penuh')->count();
        $data['muda'] = Anggota::where('category', 'Anggota Muda')->count();
        $data['totalanggota'] = Anggota::count();
        $data['totalperlengkapan'] = Perlengkapan::count();
        return view('anggota.dashboard.dashboard', $data);
    }
}
