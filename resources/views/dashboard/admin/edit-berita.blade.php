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
                            <form action="{{route('dashboard.admin.berita-update',$beritas->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label>Pengguna</label>
                                    <input type="text" name="id_pengguna" class="form-control" value="{{$beritas->users->id}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <br>
                                    <img src="{{$beritas->gambar}}" style="width:250px;heitgh:250px;">
                                    <br>
                                    <input type="file" name="gambar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Judul beritas</label>
                                    <input type="text" name="judul_berita" class="form-control" value="{{$beritas->judul_berita}}">
                                </div>
                                <div class="form-group">
                                <label>Isi beritas</label>
                                <textarea id="summernote2" name="isi_berita">{{$beritas->isi_berita}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{route('dashboard.admin.berita')}}" class="btn btn-secondary"><i class="fa fa-window-close"></i>Batal</a>
                                <button type="submit" class="btn btn-primary">Simpan Data</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->
</div>

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
@endsection