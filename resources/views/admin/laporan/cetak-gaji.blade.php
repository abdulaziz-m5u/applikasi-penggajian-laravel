<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/adminlte.min.css') }}">
    <title>Cetak Slip Gaji</title>
    <style>
        body {
            font-family: Aria;
            color: black;
        }
    </style>
</head>
<body>

    <center>
        <h1>PT. INDONESIA DAMAI</h1>
        <h2>Slip Gaji Pegawai</h2>
        <hr style="width: 50%;border-width: 5px;color:black"/>
    </center>

        @foreach($items as $item)
            <table style="width:100%">
                <tr>
                    <td width="20%">Nama Karyawan</td>
                    <td width="30px">:</td>
                    <td>{{ $item->nama }}</td>
                </tr>
                <tr>
                    <td>NIK</td>
                    <td>:</td>
                    <td>{{ $item->nik }}</td>
                </tr>
                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td>{{ $item->nama_jabatan }}</td>
                </tr>
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

            <table class="table table-striped table-bordered mt-3">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th class="text-center">Keterangan</th>
                    <th class="text-center">Jumlah</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Gaji Pokok</td>
                    <td>Rp. {{ number_format($item->gaji_pokok, 0,'', '.') }}</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Tunjangan Transportasi</td>
                    <td>Rp. {{ number_format($item->transportasi,0,'','.') }}</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Uang Makan</td>
                    <td>Rp. {{ number_format($item->uang_makan,0,'','.') }}</td>
                </tr>
                @php 
                    $potongan_gaji_alpha = $potongan_alpha[0]->jumlah_potongan;
                    $potongan_gaji_izin = $potongan_izin[0]->jumlah_potongan;
                    $total_potongan = $potongan_gaji_alpha * $item->alpha + $potongan_gaji_izin * $item->izin;
                    $total_gaji = ($item->gaji_pokok + $item->transportasi + $item->uang_makan) - $total_potongan;
                @endphp
                <tr>
                    <td>4</td>
                    <td>Potongan</td>
                    <td>Rp. {{ number_format($total_potongan, 0,'','.') }}</td>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: right;">Total Gaji</th>
                    <th>Rp. {{ number_format($total_gaji, 0,'','.') }}</th>
                </tr>
            </table>

            <table width="100%">
                <tr>
                    <td></td>
                    <td>
                        <p>Pegawai</p>
                        <br>
                        <br>
                        <p class="font-weight-bold">{{ $item->nama }}</p>
                    </td>
                    <td width="200px">
                        <p class="font-weight-bold">Lombok, {{ date('d M Y') }} Web Agency,</p>
                        <br>
                        <br>
                        <p>_________________</p>
                    </td>
                </tr>
            </table>
        @endforeach

<script>
    window.print()
</script>
</body>
</html>