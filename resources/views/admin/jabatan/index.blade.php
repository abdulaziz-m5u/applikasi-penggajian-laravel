@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->

      


    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-12 d-flex justify-content-between">
                    <h1 class="m-0">{{ __('Jabatan') }}</h1>

                    <a href="{{ route('admin.jabatan.create') }}" class="btn btn-success"> <i class="fa fa-plus"></i> </a>
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
                                            <th>Nama</th>
                                            <th>Gaji Pokok</th>
                                            <th>Transportasi</th>
                                            <th>Uang Makan</th>
                                            <th>Total Gaji</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($items as $item)
                                        <tr>
                                            <td>{{ $item->nama }}</td>
                                            <td>Rp. {{ number_format($item->gaji_pokok, 0, '', '.') }}</td>
                                            <td>Rp. {{ number_format($item->transportasi,0,'','.') }}</td>
                                            <td>Rp. {{ number_format($item->uang_makan,0,'','.') }}</td>
                                            @php $total_gaji =  $item->gaji_pokok + $item->transportasi + $item->uang_makan @endphp
                                            <td>Rp. {{ number_format($total_gaji,0,'','.') }}</td>
                                            <td>
                                                <a href="{{ route('admin.jabatan.edit', $item->id) }}" class="btn btn-info"> <i class="fa fa-edit"></i> </a>
                                                <form onclick="return confirm('anda yakin ? ');" class="d-inline-block" action="{{ route('admin.jabatan.destroy', $item->id) }}" method="post">
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
                            {{ $items->links() }}
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection