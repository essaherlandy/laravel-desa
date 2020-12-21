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
                    <h4>Edit Slider Beranda</h4>
                </div>
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
                            <form action="{{route('dashboard.admin.slider-beranda-update',$sliderBerandas->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <br>
                                <div class="form-group">
                                    <label>Konten Background</label>
                                    <br>
                                    <br>
                                    <img src="{{$sliderBerandas->konten_background}}" style="width:150px;heitgh:150px;">
                                    <br>
                                    <input type="file" name="konten_background" class="form-control" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label>Konten Logo</label>
                                    <br>
                                    <br>
                                    <img src="{{$sliderBerandas->slider_logo->konten_logo}}" style="width:150px;heitgh:150px;">
                                    <br>
                                    <input type="file" name="konten_logo" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Konten Text</label>
                                    <textarea type="text" name="konten_text" id="summernote" class="form-control">{{$sliderBerandas->konten_text}}</textarea>
                                </div>
                            </div>
                        <div class="modal-footer">
                        <a href="{{route('dashboard.admin.slider-beranda')}}" class="btn btn-secondary"><i class="fa fa-window-close"></i>Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Data</button>
                        </div>
                        </form>
                        </div>
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
    </script>
@endsection