@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->

      


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Potongan Gaji') }}</h1>

                    <a href="{{ route('admin.potongan-gaji.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
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
                        <div class="card-body p-0">

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Jenis Potongan</th>
                                            <th>Jumlah Potongan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($potongan_gaji as $pg)
                                        <tr>
                                            <td>{{ $pg->jenis_potongan }}</td>
                                            <td>Rp. {{ number_format($pg->jumlah_potongan,0,'','.') }}</td>
                                            <td>
                                                <a href="{{ route('admin.potongan-gaji.edit', $pg->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                <form onclick="return confirm('anda yakin ? ');" class="d-inline-block" action="{{ route('admin.potongan-gaji.destroy', $pg->id) }}" method="post">
                                                    @csrf 
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer clearfix">
                            {{ $potongan_gaji->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection