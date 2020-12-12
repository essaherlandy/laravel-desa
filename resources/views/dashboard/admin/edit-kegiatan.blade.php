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
                    <div class="row mt-3">
                        <div class="col-md-12">
                        <form action="{{route('dashboard.admin.kegiatan-update',$kegiatans->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Pelaksana</label>
                                    <input type="text" name="pelaksana" class="form-control" value="{{$kegiatans->pelaksana}}">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <br>
                                    <img src="{{$kegiatans->gambar}}" style="width:250px;heitgh:250px;">
                                    <br>
                                    <input type="file" name="gambar" class="form-control" value="{{$kegiatans->gambar}}" required> 
                                </div>
                                <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="summernote" name="deskripsi">{{$kegiatans->deskripsi}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Nilai Kegiatan</label>
                                    <input type="text" name="nilai_kegiatan" id="nilai_kegiatan" class="form-control" value="{{($kegiatans->nilai_kegiatan)}}">
                                </div>
                                <div class="modal-footer">
                                    <a href="{{route('dashboard.admin.kegiatan')}}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Simpan Data</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->
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