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
                                <form action="{{route('dashboard.admin.pengguna')}}" method="GET">
                                    <div class="input-group ">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari data berdasarkan Nama, email, telepon..."
                                            value="@isset($_GET['search']){{$_GET['search']}}@endisset">
                                        <input class="btn btn-primary btn-sm" type="submit" value="CARI"></span>
                                    </div>
                                </form>
                            </div>

                            <div class="card-block">
                                <button class="btn waves-effect waves-light hor-grd btn-grd-primary btn-sm mb-3"
                                    data-toggle="modal" data-target="#tambahPengguna"> <i class="fa fa-plus"></i>
                                    Tambah</button>
                                <div class="dt-responsive table-responsive text-nowrap">
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
                                @if(session('error'))
                                <div class="alert alert-danger alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                            </button>
                                            {{session('error')}}
                                        </div>
                                        </div>
                                @endif 
                                    <div id="row-select_nowrap" class="dataTables_nowrap dt-bootstrap4">
                                        @if(count($demografis) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Penguna</th>
                                                            <th>Foto Banner</th>
                                                            <th>Isi demografi</th>
                                                            <th colspan="2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $no=1;?>
                                                        @foreach($demografis as $index => $demografi)
                                                        <tr>
                                                                <td>{{$index + $demografis->firstItem()}}</td>
                                                                <td>{{$demografi->users->name}}</td>
                                                                <td><img src="{{$demografi->foto_banner}}" style="width:150px;heitgh:150px;"></td>
                                                                <td class="wrapper">{!!$demografi->isi_demografi!!}</td>
                                                                <td class="wrapper">{{$demografi->created_at}}</td>
                                                                <td>
                                                                    <a href="{{route('dashboard.admin.edit-demografi',$demografi->id)}}" class="btn btn-warning btn-round waves-effect waves-light btn-sm"><i class="fa fa-edit"></i></a>

                                                                    <a type="button" class="btn btn-danger btn-round waves-effect waves-light btn-sm text-white" data-toggle="modal" data-target="#hapusPengguna{{$demografi->id}}"><i class="fa fa-trash"></i></a>
                                                                    <!-- Modal -->
                                                                    <div class="modal fade" id="hapusPengguna{{$demografi->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-body">
                                                                                    <form action="{{route('dashboard.admin.demografi-delete',$demografi->id)}}" method="get" enctype="multipart/form-data">
                                                                                        {{csrf_field()}}
                                                                                        <h4 class="text-center"><b>Apakah Anda Yakin Ingin Menghapus Data dengan nama <br>{{$demografi->name}}??</b></h4>
                                                                                    </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Ya, Lanjutkan</button>
                                                                                </div>
                                                                                </form>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $demografis->total() }}</b></a>
                                                {{$demografis->appends(request()->query())->links()}}
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
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Demografi Desa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.admin.demografi-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Pengguna</label>
                        <input type="text" name="id_pengguna" class="form-control" value="{{Auth::user()->id}}" readonly>
                    </div>
                    <div class="form-group">
                    <label>Isi demografi</label>
                    <textarea id="summernote2" name="isi_demografi">{{old('isi_demografi')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Banner</label>
                        <input type="file" name="foto_banner" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="{{route('dashboard.admin.demografi-desa')}}" class="btn btn-secondary"><i class="fa fa-window-close"></i>Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                </div>
                </form>
        </div>
    </div>
</div>
<!--end modal-->
@endsection
@section('footer')
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
      $('#summernote').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
      $('#summernote2').summernote({
        tabsize: 2,
        height: 120,
        toolbar: [
          ['style', ['style']],
          ['font', ['bold', 'underline', 'clear']],
          ['color', ['color']],
          ['para', ['ul', 'ol', 'paragraph']],
          ['table', ['table']],
          ['view', ['fullscreen', 'codeview', 'help']]
        ]
      });
    </script>
    <script>
        @if(Session::has('sukses'))
            toastr.success('{{Session::get('sukses')}}', 'sukses')
        @endif
    </script>
@endsection