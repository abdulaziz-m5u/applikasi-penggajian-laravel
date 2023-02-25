<?php

namespace App\Http\Controllers\Admin;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AbsensiController extends Controller
{
    public function index(Request $request)
    {
        $bulan = $request->get('bulan') . $request->get('tahun');

        if($bulan === '') {
            $bulanSaatIni = ltrim(date('m').date('Y'), '0');
            $absensis = Absensi::with('user')->where('bulan', $bulanSaatIni)->get(); 
        }else {
            $absensis = Absensi::with('user')->where('bulan', $bulan)->get(); 
        }

        return view('admin.absensis.index', compact('absensis'));
    }

    public function show(Request $request)
    {
        $bulan = $request->get('bulan') . $request->get('tahun');

        if($bulan === '') {
            $bulanSaatIni = ltrim(date('m').date('Y'), '0');
            $absensis = DB::select("
                SELECT users.*,jabatan.nama as nama_jabatan
                FROM users 
                JOIN jabatan ON users.jabatan_id = jabatan.id 
                WHERE NOT EXISTS 
                (SELECT * FROM absensi 
                    WHERE bulan = $bulanSaatIni
                    AND users.id = absensi.user_id
                )");
        }else {
            $absensis = DB::select("
                select users.*,jabatan.nama as nama_jabatan
                FROM users
                JOIN jabatan ON users.jabatan_id = jabatan.id
                WHERE NOT EXISTS
                (SELECT * FROM absensi 
                    WHERE bulan = $bulan 
                    AND users.id = absensi.user_id
                )");
        }

        return view('admin.absensis.show', compact('absensis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'hadir[]' => 'nullable|number',
            'izin[]' => 'nullable|number',
            'alpha[]' => 'nullable|number'
        ]);

        foreach($request->karyawan_id as $key => $id)
        {
            $input['user_id'] = $id;
            $input['bulan'] = $request->bulan;
            $input['hadir'] = $request->hadir[$key];
            $input['izin'] = $request->izin[$key];
            $input['alpha'] = $request->alpha[$key];
            if($input['hadir'] === 0 || $input['hadir'] || $input['izin'] === 0 || $input['izin'] || $input['alpha'] === 0 || $input['alpha']) {
                Absensi::create($input);
            }
        }

        return redirect()->back()->with([
            'message' => 'berhasil di edit',
            'alert-info' => 'success'
        ]);
    }
}
