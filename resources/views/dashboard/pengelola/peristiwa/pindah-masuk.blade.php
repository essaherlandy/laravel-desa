@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css">
<style>
   td {
    white-space: normal !important;
    }
</style>
@endsection

@section('content')
<div class="pcoded-inner-content">

    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="card">
                            <div class="card-header">
                            <h3>DATA PERISTIWA masuk</h3>
                            </div>

                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                @if(session('sukses'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                            </button>
                                            {{session('sukses')}}
                                        </div>
                                    </div>
                                @endif
                                <a href="{{route('dashboard.pengelola.peristiwa.pindah-masuk-create')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($pindahMasuk) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama Bayi</th>
                                                            <th>Jenis Kelamin</th>
                                                            <th>Tanggal Lahir</th>
                                                            <th>Berat Bayi</th>
                                                            <th>Panjang Bayi</th>
                                                            <th>Nama Ayah</th>
                                                            <th>Nama Ibu</th>
                                                            <th>Kembar?</th>
                                                            <th>Tempat Lahir</th>
                                                            <th>Penolong</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($pindahMasuk as $index => $masuk)
                                                    <tr>
                                                        <td>{{$index + $pindahMasuk->firstItem()}}</td>
                                                        <td>{{$masuk->nama_bayi}}</td>
                                                        <td>{{$masuk->jenis_kelamin->deskripsi}}</td>
                                                        <td>{{\Carbon\Carbon::parse($masuk->tgl_masuk)->format('d-m-Y')}}</td>
                                                        <td>{{$masuk->berat_bayi}} kg</td>
                                                        <td>{{$masuk->panjang_bayi}} cm</td>
                                                        <td>{{$masuk->nama_ayah}}</td>
                                                        <td>{{$masuk->nama_ibu}}</td>
                                                        <td>{{$masuk->is_kembar}}</td>
                                                        <td>{{$masuk->tempat_lahir}}</td>
                                                        <td>{{$masuk->penolong}}</td>
                                                        <td>
                                                        <a href="{{url('edit-pindah-masuk', $masuk->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>   
                                                        <a class="btn btn-danger btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#hapusmasuk{{$masuk->id}}"> <i class="fa fa-trash"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="hapusmasuk{{$masuk->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peristiwa masuk</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.peristiwa.pindah-masuk-delete',$masuk->id)}}" method="GET" enctype="multipart/form-data">
                                                                                {{csrf_field()}}
                                                                                <div class="text-center">
                                                                                    <h4><strong>Apakah anda yakin ingin menghapus item ini??</strong></h4>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>Batal</button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus item ini?')"><i class="fa fa-trash"></i>Ya, Hapus Data</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end modal-->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $pindahMasuk->total() }}</b></a>
                                                {{$pindahMasuk->appends(request()->query())->links()}}
                                            </div>
                                        </div>
                                        @else
                                        <br>
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Data</h3>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div id="styleSelector">
</div>
</div>
@endsection

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
@endsection