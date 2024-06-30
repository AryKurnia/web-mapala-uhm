<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Model\Admin\Iuran;
use Carbon\Carbon;
use App\User;
use PDF, Validator;


class IuranController extends Controller
{
    public function index()
    {
        $data = Iuran::all();

        return view('admin.iuran.index', compact('data'));
    }

    // public function listiuran()
    // {
    //     $data = Iuran::paginate(10);

    //     return response()->json([
    //         "status" => true,
    //         "html" => view('admin.iuran.list', compact("data"))->render()
    //     ], 200);

    // }

    public function form()
    {
        return response()->json([
            "status" => true,
            "html" => view('admin.iuran.form')->render()
        ], 200);
    }


    public function simpan(Request $request)
    {
        try {
            $validasi = Validator::make($request->all(), [
                'jumlah' => 'required',
                'tahun' => 'required',
            ]);

            if ($validasi->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => $validasi->errors()->first(),
                ], 200);
            } else {
                $periode = explode(' - ', $request->tahun);
                $begin = $periode[0];
                $end = $periode[1];

                $data = [
                    'jumlah'    =>  $request->jumlah,
                    'tahun'     =>  date('Y-m-d', strtotime($begin)),
                    'akhir'     =>  date('Y-m-d', strtotime($end))
                ];

                Iuran::create($data);

                return response()->json([
                    "status" => true,
                    "message" => 'Rule Iuran berhasil di buat !',
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => 'Rule Iuran gagal di buat !',
            ], 200);
        }
    }

    public function detail(Request $request, $id)
    {
        $iuran = Iuran::select('id')->where('id', $id)->first();
        $detail = User::with('anggota')->where('is_active', 1)->where('level', '<>', 'admin')->orderBy('nia', 'asc')->get();

        return view('admin.iuran.detail', compact('detail', 'iuran', 'id'));
    }

    public function detailIuranUser(Request $request)
    {
        $this->iuranid = $request->id_iuran;

        $total_iuran = DB::table('iuran_detail')->where('user_id', $request->id_user)->where('iuran_id', $this->iuranid)->sum('bayar');

        $iuran_user = User::with(['iurans' => function ($query) {
            $query->where('iurans.id', $this->iuranid);
        }])->where('id', $request->id_user)->first();

        return response()->json([
            "status" => true,
            "html" => view('admin.iuran.iuranuser', compact('iuran_user', 'total_iuran'))->render()
        ], 200);
    }

    public function formiuranuser(Request $request)
    {
        $anggota = User::with('anggota')->where('is_active', 1)->where('level', '<>', 'admin')->get();
        $iuran = $request->id_iuran;

        return response()->json([
            "status" => true,
            "html" => view('admin.iuran.formiuranuser', compact('anggota', 'iuran'))->render()
        ], 200);
    }

    public function bayarIuran(Request $request)
    {
        $tanggal = date_create($request->tanggal);

        User::find($request->anggota)->iurans()->attach($request->id_iuran, [
            'bayar'         =>  $request->jumlah,
            'tanggal'       =>  $tanggal,
            'created_at'    =>  Carbon::now(),
            'updated_at'    =>  Carbon::now()
        ]);

        return response()->json([
            "status" => true,
            "message" => 'Success !',
        ], 200);
    }

    public function deleteIuranUser(Request $request)
    {
        try {

            DB::table('iuran_detail')->where('id', $request->id_data)->delete();

            return response()->json([
                "status" => true,
                "message" => 'iuran user berhasil di hapus !',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message" => 'iuran user gagal di hapus !',
            ], 200);
        }
    }

    public function report(Request $request, $id)
    {
        ini_set('memory_limit', '256M');
        $this->idiuran = $id;
        // tahun iuran
        $t = Iuran::select('tahun','akhir','jumlah')->where('id', $id)->first();
        $tahun = date_format(date_create($t->tahun), "Y");
        $akhir = date_format(date_create($t->akhir), "Y");

        $user = User::with(['iurans' => function ($query) {
            $query->where('iurans.id', $this->idiuran);
        },'anggota'])->where('is_active', 1)->where('level','<>','admin')->orderBy('nia', 'asc')->get();
        // dd($user);
        $data = [];
        foreach ($user as $value) {
            if ($value->iurans->isEmpty()) {
                $tempp = [
                    'nia'       => $value->nia,
                    'nama'      => $value->anggota->nama,
                    'angkatan'  => $value->anggota->angkatan,
                    'no_hp'     => $value->anggota->no_telp,
                    'bayar'     => 0,
                    'sisa'     => 0,
                    'total'     => $t->jumlah,
                ];
                array_push($data, $tempp);
            } else {
                $total = $value->iurans[0]->jumlah;
                $bayar = DB::table('iuran_detail')->where('iuran_id', $id)->where('user_id', $value->id)->sum('bayar');
                $sisa = $total - $bayar;
                $tempp = [
                    'nia'       => $value->nia,
                    'nama'      => $value->anggota->nama,
                    'angkatan'  => $value->anggota->angkatan,
                    'no_hp'     => $value->anggota->no_telp,
                    'bayar'     => $bayar,
                    'sisa'      => $sisa,
                    'total'     => $total,
                ];
                array_push($data, $tempp);
            }

        }

        set_time_limit(300);

        $pdf = PDF::loadview('admin.iuran.laporan_iuran_pdf',['laporan'=>$data, 'tahun'=>$tahun, 'akhir'=>$akhir])->setPaper([0, 0, 1585.98, 1296.85], 'landscape');
    	return $pdf->download('laporan-iuran-pdf.pdf');
    }

    public function deleteRuleIuran(Request $request)
    {
        try {

            Iuran::destroy($request->id_data);

            return response()->json([
                "status" => true,
                "message" => 'rule iuran berhasil di hapus !',
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                "status" => true,
                "message" => 'rule iuran gagal di hapus !',
            ], 200);
        }
    }
}
