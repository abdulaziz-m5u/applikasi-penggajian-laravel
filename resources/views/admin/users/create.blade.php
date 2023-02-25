@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Karyawan') }}</h1>

                    <a href="{{ route('admin.users.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> </a>
                </div>
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
                    <div class="card">
                        <div class="card-body p-3">

                            <form action="{{ route('admin.users.store') }}" method="POST">
                                @csrf 
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="jabatan">Jabatan</label>
                                    <select class="form-control" style="width: 80%;" name="jabatan_id" id="jabatan">
                                        @foreach($jabatans as $jabatan)
                                            <option value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="nama">Nama</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="email">Email</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="email" value="{{ old('email') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="password">Password</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="password" value="{{ old('password') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="nik">Nik</label>
                                    <input class="form-control" style="width: 80%;" type="number" name="nik" value="{{ old('nik') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" style="width: 80%;" name="jenis_kelamin" id="jenis_kelamin">
                                        <option value="laki-laki">Laki-Laki</option>
                                        <option value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="status">Status</label>
                                    <select class="form-control" style="width: 80%;" name="status" id="status">
                                        <option value="1">Pegawai Tetap</option>
                                        <option value="0">Pegawai Tidak Tetap</option>
                                    </select>
                                </div>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection