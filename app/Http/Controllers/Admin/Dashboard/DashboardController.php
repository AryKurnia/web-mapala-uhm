<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Model\Admin\Perlengkapan;
use App\Model\Admin\Anggota;
use Illuminate\Http\Request;
use App\User;
use Validator;

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
        return view('admin.dashboard.index', $data);
    }

    public function edit(Request $request)
    {
        $data = User::find($request->id_data);

        return response()->json([
            "status" => true,
            "html" => view('admin.edit', compact("data"))->render()
        ], 200);
    }


    public function update(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nia'      => 'required',
        ], [
            'nia.required'      => 'nia kosong !',
        ]);

        if ($validasi->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validasi->errors()->first()
            ], 200);
        } else {
            $user = User::find($request->id_data);
            $user->nia = $request->nia;
            if ($request->filled('password')) {
                $user->password = bcrypt($request->password);
            }
            $user->save();

            return response()->json([
                "status" => true,
                "message" => 'Akun Admin berhasil di update !',
            ], 200);
        }
    }
}
