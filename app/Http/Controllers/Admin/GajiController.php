<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\PotonganGaji;

class GajiController extends Controller
{
    public function index(Request $request)
    {
        $potongan_alpha = PotonganGaji::where('jenis_potongan', 'alpha')->get();
        $potongan_izin = PotonganGaji::where('jenis_potongan', 'izin')->get();
     
        $bulan = $request->get('bulan') . $request->get('tahun');
        if($bulan === '') {
            $bulanSaatIni = ltrim(date('m').date('Y'), '0');
            $items = DB::select(" 
                SELECT users.nik,users.nama,users.jenis_kelamin,jabatan.nama as nama_jabatan,jabatan.gaji_pokok,jabatan.transportasi,jabatan.uang_makan,absensi.alpha,absensi.izin
                FROM users JOIN absensi ON absensi.user_id=users.id
                JOIN jabatan ON jabatan.id = users.jabatan_id
                WHERE absensi.bulan = $bulanSaatIni");
        }else {
            $items = DB::select("
                SELECT users.nik,users.nama,users.jenis_kelamin,jabatan.nama as nama_jabatan,jabatan.gaji_pokok,jabatan.transportasi,jabatan.uang_makan,absensi.alpha,absensi.izin
                FROM users JOIN absensi ON absensi.user_id=users.id
                JOIN jabatan ON jabatan.id = users.jabatan_id
                WHERE absensi.bulan = $bulan");
        }
        
        return view('admin.gaji.index', compact('items','potongan_alpha', 'potongan_izin'));
    }

    public function cetak($bulan,$tahun)
    {
        $tanggal = $bulan.$tahun;
        $potongan_alpha = PotonganGaji::where('jenis_potongan', 'alpha')->get();
        $potongan_izin = PotonganGaji::where('jenis_potongan', 'izin')->get();
     
        $items = DB::select("
            SELECT users.nik,users.nama,users.jenis_kelamin,jabatan.nama as nama_jabatan,jabatan.gaji_pokok,jabatan.transportasi,jabatan.uang_makan,absensi.alpha,absensi.izin
            FROM users JOIN absensi ON absensi.user_id=users.id
            JOIN jabatan ON jabatan.id = users.jabatan_id
            WHERE absensi.bulan = $tanggal");
 
        return view('admin.gaji.cetak', compact('items', 'bulan', 'tahun','potongan_alpha', 'potongan_izin'));
    }
}
