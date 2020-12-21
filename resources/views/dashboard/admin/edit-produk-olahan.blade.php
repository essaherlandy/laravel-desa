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
                    <h3 class="text-center">Edit Produk Olahan</h3>
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
                            <form action="{{route('dashboard.admin.produk-olahan-update',$produks->id)}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <br>
                                <div class="form-group">
                                    <label>Judul Produk</label>
                                    <input type="text" name="judul_produk" class="form-control" value="{{ $produks->judul_produk }}">
                                </div>
                                <div class="form-group">
                                    <label>Harga Produk</label>
                                    <input type="text" name="harga" id="harga" class="form-control" value="{{ formatted_price($produks->harga) }}">
                                </div>
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <br>
                                    <br>
                                    <img src="{{$produks->gambar}}" style="width:150px;heitgh:150px;">
                                    <br>
                                    <input type="file" name="gambar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea id="summernote" name="deskripsi">{{ $produks->deskripsi }}</textarea>
                                </div>
                                </div>
                                <div class="modal-footer">
                                <a href="{{route('dashboard.admin.produk-olahan')}}" class="btn btn-secondary"><i class="fa fa-window-close"></i>Batal</a>
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
      var harga = document.getElementById('harga');
            harga.addEventListener('keyup', function(e){
            harga.value = formatRupiah(this.value, 'Rp. ');
        });
        function formatRupiah(angka, prefix){
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split   		= number_string.split(','),
            sisa     		= split[0].length % 3,
            harga     		= split[0].substr(0, sisa),
            hargas     		= split[0].substr(sisa).match(/\d{3}/gi);
            if(hargas){
                separator = sisa ? '.' : '';
                harga += separator + hargas.join('.');
            }
            harga = split[1] != undefined ? harga + ',' + split[1] : harga;
            return prefix == undefined ? harga : (harga ? 'Rp' + harga : '');
        }
    </script>
@endsection