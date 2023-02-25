@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12">
                    <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Jabatan') }}</h1>

                    <a href="{{ route('admin.jabatan.index') }}" class="btn btn-light"> <i class="fa fa-arrow-left"></i> </a>
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

                            <form action="{{ route('admin.jabatan.store') }}" method="POST">
                                @csrf 
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="name">Nama</label>
                                    <input class="form-control" style="width: 80%;" type="text" name="nama" value="{{ old('nama') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="gaji_pokok">Gaji Pokok</label>
                                    <input class="form-control" style="width: 80%;" type="number" name="gaji_pokok" value="{{ old('gaji_pokok') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="transportasi">Transportasi</label>
                                    <input class="form-control" style="width: 80%;" type="number" name="transportasi" value="{{ old('transportasi') }}">
                                </div>
                                <div style="gap: .5rem;flex-wrap: wrap;" class="form-group justify-content-between d-flex align-items-center mb-5">
                                    <label class="m-0" for="uang_makan">Uang Makan</label>
                                    <input class="form-control" style="width: 80%;" type="number" name="uang_makan" value="{{ old('uang_makan') }}">
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