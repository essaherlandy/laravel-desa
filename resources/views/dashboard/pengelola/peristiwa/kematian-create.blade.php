@extends('layouts.admin')

@section('styles')
     <!-- CSS -->
<link rel="stylesheet" type="text/css" href="{{asset('jqueryui')}}/dist/jquery-ui.min.css">
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
                            <h3>TAMBAH DATA KEMATIAN</h3>
                            </div>

                            <div class="card-block">
                                <form action="{{route('dashboard.pengelola.peristiwa.kematian-store')}}" method="post">
                                    {{csrf_field()}}
                                    <h4 class="mt-3">Data Kematian Penduduk</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik_nama">Pencarian Data Kematian</label>  
                                        <div class="col-md-9">
                                            <input id="penduduk_search" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <input id="id_penduduk" name="id_penduduk" type="hidden" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik">NIK</label>  
                                        <div class="col-md-9">
                                            <input id="nikpenduduk" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama</label>  
                                        <div class="col-md-9">
                                            <input id="namapenduduk" name="nama" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Kematian</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_meninggal" type="text" class="datepicker form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Penyebab Kematian</label>  
                                        <div class="col-md-9">
                                            <input name="sebab" type="text" class="form-control" placeholder="Penyebab Kematian">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Penentu Kematian</label>  
                                        <div class="col-md-9">
                                            <input name="penentu_kematian" type="text" class="form-control" placeholder="Penentu Kematian">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Tempat Kematian</label>  
                                        <div class="col-md-9">
                                            <input name="tempat_kematian" type="text" class="form-control" placeholder="Tempat Kematian">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <br>
                                    <h4 class="mt-3">Data Pelapor Kematian</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama Pelapor</label>  
                                        <div class="col-md-9">
                                            <input name="nama_pelapor" type="text" class="form-control" placeholder="Nama Pelapor">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Hubungan Pelapor</label>  
                                        <div class="col-md-9">
                                            <select name="id_pelapor" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($pelapor as $pel)
                                                    <option value="{{$pel->id}}" {{ old('id_pel') == $pel->id ? 'selected' : '' }}>{{$pel->deskripsi}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Pamong Surat Kematian</label>  
                                        <div class="col-md-9">
                                            <select name="id_surat" class="form-control">
                                                <option>--PILIH--</option>
                                                <option value="{{$penduduks->id}}" {{ old('id_penduduk') == $penduduks->id ? 'selected' : '' }}>{{$penduduks->nama}} - Kepala Desa</option>
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.pengelola.kesehatan.kehamilan')}}" type="submit" class="btn btn-warning btn-sm text-white">Batal</a>
                                        <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                    </div>
                                </form>
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
<!-- Script -->
<script type="text/javascript">
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).ready(function(){
            $( "#penduduk_search" ).autocomplete({
                source: function( request, response ) {
                    console.log(request.term)
                $.ajax({
                    url:"{{route('dashboard.pengelola.peristiwa.get-kelahiran')}}",
                    type: 'post',
                    dataType: "json",
                    data: {
                        _token: CSRF_TOKEN,
                        cari: request.term
                    },
                    success: function( data ) {
                    response( data );
                    }
                });
                },
                select: function (event, ui) {
                $('#penduduk_search').val(ui.item.label);
                $('#id_penduduk').val(ui.item.value);
                $('#nikpenduduk').val(ui.item.nik);
                $('#namapenduduk').val(ui.item.nama);
                return false;
                }
            });
        });
        $(function(){
            $(".datepicker").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
</script>
@endsection