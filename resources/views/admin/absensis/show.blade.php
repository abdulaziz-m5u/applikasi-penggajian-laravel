@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Absensi kehadiran') }}</h1>
                </div><!-- /.col --> 
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card p-4">
                        <form action="{{ route('admin.absensis.show') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="bulan">Bulan</label>
                                        <select class="form-control" name="bulan" id="bulan">
                                            <option value="#">-- Pilih Bulan --</option>
                                            <option value="1">Januari</option>
                                            <option value="2">Februari</option>
                                            <option value="3">Maret</option>
                                            <option value="4">April</option>
                                            <option value="5">Mei</option>
                                            <option value="6">Juni</option>
                                            <option value="7">Juli</option>
                                            <option value="8">Agustus</option>
                                            <option value="9">September</option>
                                            <option value="10">Oktober</option>
                                            <option value="11">November</option>
                                            <option value="12">Desember</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="tahun">Tahun</label>
                                        <select class="form-control" name="tahun" id="tahun">
                                        <option value="#">-- Pilih Tahun --</option>
                                        {{ $last= date('Y')-5 }}
                                        {{ $now = date('Y') }}

                                        @for ($i = $now; $i >= $last; $i--)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
            @if(request()->get('bulan') === null && request()->get('tahun') === null )
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success }}">
                            Menampilkan data kehadiran karyawan bulan <span class="text-bold">{{ date('m') }}</span> tahun <span class="text-bold">{{ date('Y') }}</span>
                        </div>
                    </div>
                </div>
            @else 
                <div class="row">
                    <div class="col-12">
                        <div class="alert alert-success }}">
                            Menampilkan data kehadiran karyawan bulan <span class="text-bold">{{ request()->get('bulan') }}</span> tahun <span class="text-bold">{{ request()->get('tahun') }}</span>
                        </div>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12">
                     <form action="{{ route('admin.absensis.store') }}" method="post">
                        @csrf 
                        @if(request()->get('bulan') === null && request()->get('tahun') === null )
                            <input type="hidden" name="bulan" value="{{ ltrim(date('m').date('Y'), '0') }}">
                        @else 
                            <input type="hidden" name="bulan" value="{{ request()->get('bulan').request()->get('tahun') }}">
                        @endif
                    <div class="card">
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nik</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Jabatan</th>
                                            <th>Hadir</th>
                                            <th>Sakit</th>
                                            <th>Alpha</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($absensis as $absensi)
                                        <tr>
                                            <input type="hidden" name="karyawan_id[]" value="{{ $absensi->id  }}">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $absensi->nik }}</td>
                                            <td>{{ $absensi->nama }}</td>
                                            <td>{{ $absensi->jenis_kelamin }}</td>
                                            <td>{{ $absensi->nama_jabatan }}</td>
                                            <td width="10%">
                                                <input name="hadir[]" style="width: 100%" type="number">
                                            </td>
                                            <td width="10%">
                                                <input name="izin[]" style="width: 100%" type="number">
                                            </td>
                                            <td width="10%">
                                                <input name="alpha[]" style="width: 100%" type="number">
                                            </td>
                                        </tr>
                                    @empty 
                                        <tr>
                                            <td colspan="9" class="text-center">Data Kosong</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>

                        </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                    </div>

                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection