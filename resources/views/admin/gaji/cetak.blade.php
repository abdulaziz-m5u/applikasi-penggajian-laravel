<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <title>Cetak Gaji</title>
</head>
<body>
    <center>
        <h1>PT. INDONESIA DAMAI</h1>
        <h2>Daftar Gaji Pegawai</h2>
    </center>

    <table>
        <tr>
            <td>Bulan</td>
            <td>:</td>
            <td>{{ $bulan }}</td>
        </tr>
        <tr>
            <td>Tahun</td>
            <td>:</td>
            <td>{{ $tahun }}</td>
        </tr>
    </table>

        <table width="100%" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nik</th>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Gaji Pokok</th>
                    <th class="text-center">Transportasi</th>
                    <th class="text-center">Uang Makan</th>
                    <th class="text-center">Potongan</th>
                    <th class="text-center">Total Gaji</th>
                </tr>
            </thead>
            <tbody>
            @forelse($items as $item)
                <tr>
                    <td >{{ $loop->iteration }}</td>
                    <td >{{ $item->nik }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->jenis_kelamin }}</td>
                    <td>{{ $item->nama_jabatan }}</td>
                    <td>Rp. {{ number_format($item->gaji_pokok,0,'','.') }}</td>
                    <td>Rp. {{ number_format($item->transportasi,0,'','.') }}</td>
                    <td>Rp. {{ number_format($item->uang_makan,0,'','.') }}</td>
                    @php 
                        $potongan_gaji_alpha = $potongan_alpha[0]->jumlah_potongan;
                        $potongan_gaji_izin = $potongan_izin[0]->jumlah_potongan;
                        $total_potongan = $potongan_gaji_alpha * $item->alpha + $potongan_gaji_izin * $item->izin;
                        $total_gaji = ($item->gaji_pokok + $item->transportasi + $item->uang_makan) - $total_potongan;
                    @endphp
                    <td>Rp. {{ number_format($total_potongan, 0,'','.') }}</td>
                    <td>Rp. {{ number_format($total_gaji,0,'','.') }}</td>
                </tr>
            @empty 
                <tr>
                    <td colspan="9" class="text-center">Data Kosong</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <table width="100%">
            <tr>
                <td></td>
                <td width="200px">
                    <p>Lombok, {{ date("d M Y") }} <br /> Web Agency</p>
                    <br/>
                    <br/>
                    <p>________________________</p>
                </td>
            </tr>
        </table>

<script>
    window.print();
</script>
</body>
</html>