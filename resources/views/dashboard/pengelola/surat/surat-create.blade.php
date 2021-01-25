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
                                <form action="{{route('dashboard.pengelola.surat.surat-store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Kategori Surat</label>  
                                        <div class="col-md-9">
                                            <select name="kode_surat" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($kodeSurat as $kode)
                                                    <option value="{{$kode->id}}" {{ old('id_kagetori_surat') == $kode->id ? 'selected' : '' }}>{{$kode->deskripsi}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nomor Surat</label>  
                                        <div class="col-md-9">
                                            <input name="nomor_surat" type="text" class="form-control" placeholder="Judul Surat">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Judul Surat</label>  
                                        <div class="col-md-9">
                                            <input name="judul_surat" type="text" class="form-control" placeholder="Judul Surat">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Surat</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tanggal_surat" type="text" class="datepicker form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik_nama">Pencarian Kepala Keluarga</label>  
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
                                            <input id="namapenduduk" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Awal Berlaku</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tanggal_awal" type="text" class="tanggalberlaku form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Akhir Berlaku</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tanggal_akhir" type="text" class="tanggalakhirberlaku form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Pamong Surat Kelahiran</label>  
                                        <div class="col-md-9">
                                            <input type="hidden" name="id_perangkat" class="form-control" value="{{$perangkatDesa->id}}" readonly> 
                                            <input type="text" class="form-control" value="{{$perangkatDesa->penduduk->nama}} - {{$jabatan->deskripsi}}" readonly> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Keperluan</label>  
                                        <div class="input-group mb-2 col-md-9">
                                            <textarea name="keterangan" type="text" class="form-control" autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Kata Penutup</label>  
                                        <div class="input-group mb-2 col-md-9">
                                            <textarea name="kata_penutup" type="text" class="form-control" autocomplete="off"></textarea>
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
                    url:"{{route('dashboard.pengelola.surat.get-surat')}}",
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
        $(function(){
            $(".tanggalberlaku").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
        $(function(){
            $(".tanggalakhirberlaku").datepicker({
                format: 'yyyy-mm-dd',
                autoclose: true,
                todayHighlight: true,
            });
        });
</script>
@endsection