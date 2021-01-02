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
                                <button class="btn waves-effect waves-light hor-grd btn-grd-primary btn-sm mb-3"
                                    data-toggle="modal" data-target="#tambahPengguna"> <i class="fa fa-plus"></i>
                                    Tambah</button>
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
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($dusun) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Dusun BPS</th>
                                                            <th>Kode Dusun Kemendagri</th>
                                                            <th>Nama Dusun</th>
                                                            <th>Luas Wilayah</th>
                                                            <th>Desa</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($dusun as $index => $d)
                                                    <tr>
                                                        <td>{{$index + $dusun->firstItem()}}</td>
                                                        <td>{{$d->kode_dusun_bps}}</td>
                                                        <td>{{$d->kode_dusun_kemendagri}}</td>
                                                        <td>{{$d->nama_dusun}}</td>
                                                        <td>{{$d->luas_wilayah}}</td>
                                                        <td>{{$d->desa->nama_desa}}</td>
                                                        <td>
                                                            <a href="{{route('dashboard.admin.edit-dusun',$d->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $dusun->total() }}</b></a>
                                                {{$dusun->appends(request()->query())->links()}}
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
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dusun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.admin.dusun-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Kode Dusun BPS</label>
                        <input type="text" name="kode_dusun_bps" class="form-control" placeholder="Kode Dusun BPS" value="{{ old('kode_dusun_bps') }}">
                    </div>
                    <div class="form-group">
                        <label>Kode Dusun Kemendagri</label>
                        <input type="text" name="kode_dusun_kemendagri" class="form-control" placeholder="Kode Dusun Kemendagri" value="{{ old('kode_dusun_kemendagri') }}">  
                    </div>
                    <div class="form-group">
                        <label>Nama Dusun</label>
                        <input type="text" name="nama_dusun" class="form-control" placeholder="Nama Dusun" value="{{ old('nama_dusun') }}">
                    </div>
                    <div class="form-group">
                        <label>Luas Wilayah</label>
                        <input type="number" name="luas_wilayah" class="form-control" placeholder="Luas Wilayah" value="{{ old('luas_wilayah') }}">
                    </div>
                    <div class="form-group">
                        <label>Desa</label>
                        <select name="id_desa" class="form-control">
                            <option value="">--PILIH DESA--</option>
                            @foreach($desa as $d)
                                <option value="{{$d->id}}">{{$d->nama_desa}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end modal-->
@endsection
@section('footer')

@endsection