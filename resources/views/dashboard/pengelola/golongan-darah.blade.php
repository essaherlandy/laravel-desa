@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
                            <h3>DATA GOLONGAN DARAH</h3>
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
                                <button class="btn waves-effect waves-light hor-grd btn-grd-primary btn-sm mb-3"
                                    data-toggle="modal" data-target="#tambahgoldars"> <i class="fa fa-plus"></i>
                                    Tambah</button>
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($goldars) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Deskripsi</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($goldars as $index => $goldar)
                                                    <tr>
                                                        <td>{{$index + $goldars->firstItem()}}</td>
                                                        <td>{{$goldar->deskripsi}}</td>
                                                        <td>
                                                        <a class="btn btn-warning btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#editgoldars{{$goldar->id}}"> <i class="fa fa-edit"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="editgoldars{{$goldar->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Golongan Darah</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.golongan-darah-update',$goldar->id)}}" method="POST" enctype="multipart/form-data">
                                                                                {{csrf_field()}}
                                                                                <div class="form-group">
                                                                                    <label>Deskripsi</label>
                                                                                    <input name="deskripsi" type="text" class="form-control" value="{{ $goldar->deskripsi }}">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end modal-->
                                                            <a class="btn btn-danger btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#hapusgoldars{{$goldar->id}}"> <i class="fa fa-trash"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="hapusgoldars{{$goldar->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Golongan Darah</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.golongan-darah-delete',$goldar->id)}}" method="GET" enctype="multipart/form-data">
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
                                                <a>Total Keseluruhan: <b>{{ $goldars->total() }}</b></a>
                                                {{$goldars->appends(request()->query())->links()}}
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
<!-- Modal -->
<div class="modal fade" id="tambahgoldars" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Golongan Darah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.pengelola.golongan-darah-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" value="{{ old('deskripsi') }}" placeholder="dekripsi">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end modal-->
@endsection

@section('footer')
<script>
    function show1(){
        document.getElementById('div1').style.display ='none';
    }
    function show2(){
        document.getElementById('div1').style.display = 'block';
    }
</script>
@endsection