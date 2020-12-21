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
                                        @if(count($provinsi) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Kode Provinsi BPS</th>
                                                            <th>Kode Provinsi Kemendagri</th>
                                                            <th>Nama Provinsi</th>
                                                            <th>Luas Wilayah</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($provinsi as $index => $province)
                                                    <tr>
                                                        <td>{{$index + $provinsi->firstItem()}}</td>
                                                        <td>{{$province->kode_provinsi_bps}}</td>
                                                        <td>{{$province->kode_provinsi_kemendagri}}</td>
                                                        <td>{{$province->nama_provinsi}}</td>
                                                        <td>{{$province->luas_wilayah}}</td>
                                                        <td>
                                                            <a href="{{route('dashboard.admin.edit-provinsi',$province->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $provinsi->total() }}</b></a>
                                                {{$provinsi->appends(request()->query())->links()}}
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
    </script>
    <script>
        @if(Session::has('sukses'))
            toastr.success('{{Session::get('sukses')}}', 'sukses')
        @endif
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