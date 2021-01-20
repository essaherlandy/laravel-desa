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
                                <form action="{{route('dashboard.admin.perangkat.perangkat-store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Jabatan Perangkat Desa</label>  
                                        <div class="col-md-9">
                                            <select name="id_jabatan" id="id_jabatan" class="form-control input-md" required>
                                                <option value="" selected="selected">--Pilih--</option>
                                                @foreach($jabatan as $jb)
                                                <option value="{{$jb->id}}" {{ old('id_jabatan') == $jb->id ? 'selected' : '' }}>{{$jb->deskripsi}}</option>
                                                @endforeach
                                            </select> 
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Status Perangkat Desa</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status1">
                                                <input class="form-check-input" type="radio" name="is_active" id="Status1" value="Y">
                                                Aktif
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status2">
                                                <input class="form-check-input" type="radio" name="is_active" id="Status2" value="N">
                                                Tidak Aktif
                                            </label>
                                        </div>
                                        @if($errors->first('is_resti'))
                                            <span class="text-danger font-size-14">{{ $errors->first('is_resti') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" for="nik_nama">Pencarian Data Perangkat Desa</label>  
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
                                        <label class="col-md-3 control-label" for="nama">NIP</label>  
                                        <div class="col-md-9">
                                            <input name="nip" type="text" class="form-control input-md ui-autocomplete-input" placeholder="NIP">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">NIAP</label>  
                                        <div class="col-md-9">
                                            <input name="niap" type="text" class="form-control input-md ui-autocomplete-input" placeholder="NIAP">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Golongan</label>  
                                        <div class="col-md-9">
                                            <select name="id_pangkat_gol" id="id_pangkat_gol" class="form-control input-md" required>
                                                <option value="" selected="selected">--Pilih--</option>
                                                @foreach($pangkatGolongan as $pangkat)
                                                <option value="{{$pangkat->id}}" {{ old('id_pangkat_gol') == $pangkat->id ? 'selected' : '' }}>{{$pangkat->deskripsi}}</option>
                                                @endforeach
                                            </select> 
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">No. SK Angkat</label>  
                                        <div class="col-md-9">
                                            <input name="no_sk_angkat" type="text" class="form-control input-md ui-autocomplete-input" placeholder="No. SK Angkat">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Angkat</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_angkat" type="text" class="datepicker form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">No. SK Berhenti</label>  
                                        <div class="col-md-9">
                                            <input name="no_sk_berhenti" type="text" class="form-control input-md ui-autocomplete-input" placeholder="No. SK Berhenti">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Berhenti</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_berhenti" type="text" class="datepicker form-control" autocomplete="off">
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
                    url:"{{route('dashboard.admin.perangkat.get-perangkat')}}",
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