@extends('layouts.admin')

@section('styles')
<style>
    .modal-backdrop{
        position: inherit !important;
    }
    .modal { 
        overflow-y: auto 
    }
</style>
@endsection

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading pb-0">
                    <form action="{{route('dashboard.admin.pengguna')}}" method="GET">
                        <div class="col-lg-12 row justify-content-between">
                            <div class="input-group ">
                                <input type="text" name="search" class="form-control col-lg-10 col-sm-12 mb-2" placeholder="Cari data berdasarkan Nama, email, telepon..." value="@isset($_GET['search']){{$_GET['search']}}@endisset">
                                <span class="input-group-btn"><input class="btn btn-primary" type="submit" value="CARI"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="mt-3">
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible show fade">
                        <div class="alert-body">
                            <button class="close" data-dismiss="alert">
                            <span>×</span>
                            </button>
                            {{session('success')}}
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
                <div class="panel-body">
                <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahPengguna"><i class="fa fa-plus"></i> Tambah</a>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            @if(count($kegiatans) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Pelaksana</th>
                                        <th>Gambar</th>
                                        <th>Deskripsi Kegiatan</th>
                                        <th>Nilai Kegiatan</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                    @foreach($kegiatans as $index => $kegiatan)
                                    <tr>
                                        <td>{{$index + $kegiatans->firstItem()}}</td>
                                        <td>{{$kegiatan->pelaksana}}</td>
                                        <td><img src="{{$kegiatan->gambar}}" style="width:150px;heitgh:150px;"></td>
                                        <td>{{$kegiatan->deskripsi}}</td>
                                        <td>{{formatted_price($kegiatan->nilai_kegiatan)}}</td>
                                        <td>
                                            <a href="{{route('dashboard.admin.edit-kegiatan',$kegiatan->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <!--end modal-->
                                            <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPengguna{{$kegiatan->id}}"><i class="fa fa-trash"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusPengguna{{$kegiatan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form action="{{route('dashboard.admin.kegiatan-delete',$kegiatan->id)}}" method="get" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <h4 class="text-center"><b>Apakah Anda Yakin Ingin Menghapus Data ini??</b></h4>
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
                            <a>Total Keseluruhan: <b>{{ $kegiatans->total() }}</b></a>
                            {{$kegiatans->appends(request()->query())->links()}}
                        </div>
                    </div>
                    @else
                    <br>
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Data</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->
</div>

<!-- Modal -->
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.admin.kegiatan-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Pelaksana</label>
                        <input type="text" name="pelaksana" class="form-control" value="{{ old('pelaksana') }}">
                    </div>
                    <div class="form-group">
                        <label>Gambar</label>
                        <input type="file" name="gambar" class="form-control">
                    </div>
                    <div class="form-group">
                    <label>Deskripsi</label>
                    <textarea id="summernote" name="deskripsi">{{ old('deskripsi') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Nilai Kegiatan</label>
                        <input type="text" name="nilai_kegiatan" id="nilai_kegiatan" class="form-control" value="{{ old('nilai_kegiatan') }}">
                    </div>
                </div>
            <div class="modal-footer">
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
    </script>
    <script>
        $('#summernotes').summernote({
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
        var nilai_kegiatan = document.getElementById('nilai_kegiatan');
                nilai_kegiatan.addEventListener('keyup', function(e){
                nilai_kegiatan.value = formatRupiah(this.value, 'Rp. ');
            });
            function formatRupiah(angka, prefix){
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split   		= number_string.split(','),
                sisa     		= split[0].length % 3,
                nilai_kegiatan     		= split[0].substr(0, sisa),
                nilai_kegiatans     		= split[0].substr(sisa).match(/\d{3}/gi);
                if(nilai_kegiatans){
                    separator = sisa ? '.' : '';
                    nilai_kegiatan += separator + nilai_kegiatans.join('.');
                }
                nilai_kegiatan = split[1] != undefined ? nilai_kegiatan + ',' + split[1] : nilai_kegiatan;
                return prefix == undefined ? nilai_kegiatan : (nilai_kegiatan ? 'Rp' + nilai_kegiatan : '');
            }
    </script>
    
@endsection