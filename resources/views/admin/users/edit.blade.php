@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('user') }}</h1>

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

                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf 
                                @method('put')
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="jabatan">Jabatan</label>
                                    <select class="form-control" style="width: 80%;" name="jabatan_id" id="jabatan">
                                        @foreach($jabatans as $jabatan)
                                            <option {{ $user->jabatan->id === $jabatan->id ? 'selected' : null }} value="{{ $jabatan->id }}">{{ $jabatan->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="nama">Nama</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="nama" value="{{ old('nama', $user->nama) }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="email">Email</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="email" value="{{ old('email', $user->email) }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="password">Password</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="password" value="{{ old('password', $user->password) }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="nik">Nik</label>
                                    <input class="form-control" style="width: 80%;" type="number" name="nik" value="{{ old('nik', $user->nik) }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="jenis_kelamin">Jenis Kelamin</label>
                                    <select class="form-control" style="width: 80%;" name="jenis_kelamin" id="jenis_kelamin">
                                        <option {{ $user->jenis_kelamin === 'laki-laki' ? 'selected' : null }} value="laki-laki">Laki-Laki</option>
                                        <option {{ $user->jenis_kelamin === 'perempuan' ? 'selected' : null }} value="perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="status">Status</label>
                                    <select class="form-control" style="width: 80%;" name="status" id="status">
                                        <option {{ $user->status === 1 ? 'selected' : null }} value="1">Pegawai Tetap</option>
                                        <option {{ $user->status === 0 ? 'selected' : null }} value="0">Pegawai Tidak Tetap</option>
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