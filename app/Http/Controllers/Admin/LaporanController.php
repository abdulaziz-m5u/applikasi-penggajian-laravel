<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PotonganGaji;

class LaporanController extends Controller
{
    public function index()
    {
        $users = User::get(['nama','id']);

        return view('admin.laporan.index', compact('users'));
    }

    public function store(Request $request)
    { 
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $tanggal = $bulan.$tahun;
        $potongan_alpha = PotonganGaji::where('jenis_potongan', 'alpha')->get();
        $potongan_izin = PotonganGaji::where('jenis_potongan', 'izin')->get();
        $items = DB::select("
            SELECT users.nik,users.nama,jabatan.nama as nama_jabatan, jabatan.gaji_pokok,jabatan.transportasi,jabatan.uang_makan,absensi.alpha,absensi.izin
            FROM users
            JOIN absensi ON absensi.user_id = users.id 
            JOIN jabatan ON jabatan.id = users.jabatan_id
            WHERE absensi.bulan = $tanggal 
            AND absensi.user_id = $request->karyawan_id
        ");

        return view('admin.laporan.cetak-gaji', compact('bulan', 'tahun', 'items','potongan_alpha','potongan_izin'));
    }

    public function show()
    {
        return view('admin.laporan.show');
    }

    public function cekGaji(Request $request)
    { 
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $tanggal = $bulan.$tahun;
        $potongan_alpha = PotonganGaji::where('jenis_potongan', 'alpha')->get();
        $potongan_izin = PotonganGaji::where('jenis_potongan', 'izin')->get();
        $karyawan_id = auth()->id();
        $items = DB::select("
            SELECT users.nik,users.nama,jabatan.nama as nama_jabatan, jabatan.gaji_pokok,jabatan.transportasi,jabatan.uang_makan,absensi.alpha,absensi.izin
            FROM users
            JOIN absensi ON absensi.user_id = users.id 
            JOIN jabatan ON jabatan.id = users.jabatan_id
            WHERE absensi.bulan = $tanggal 
            AND absensi.user_id = $karyawan_id
        ");

        return view('admin.laporan.cetak-gaji-karyawan', compact('bulan', 'tahun', 'items','potongan_alpha','potongan_izin'));
    }
}
