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
                            <h3>TAMBAH KARTU KELUARGA</h3>
                            </div>

                            <div class="card-block">
                                <form action="{{route('dashboard.pengelola.pisah-keluarga-store')}}" method="post">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik_nama">Pencarian Data Penduduk</label>  
                                        <div class="col-md-11">
                                            <input id="penduduk_search" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <input id="id_penduduk" name="id_penduduk" type="hidden" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik">NIK</label>  
                                        <div class="col-md-11">
                                            <input id="nikpenduduk" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama</label>  
                                        <div class="col-md-11">
                                            <input id="namapenduduk" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nomor Kartu Keluarga</label>  
                                        <div class="col-md-11">
                                            <input id="" name="no_kk" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-4" for="">Dusun</label>
                                            <div class="col-md-9">
                                            <select id="id_dusun" name="id_dusun" class="form-control">
                                                <option value="" selected disabled>Select</option>
                                                @foreach($dusun as $key => $dusuns)
                                                <option value="{{$key}}"> {{$dusuns}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->first('id_dusun'))
                                                <span class="text-danger font-size-14">{{ $errors->first('id_dusun') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="col-md-3" for="">RW</label>
                                            <div class="col-md-9">
                                            <select name="id_rw" id="id_rw" class="form-control"></select>
                                            @if($errors->first('id_rw'))
                                                <span class="text-danger font-size-14">{{ $errors->first('id_rw') }}</span>
                                            @endif
                                            </div>
                                        </div>
                                        <div class="col mr-3">
                                        <label class="col-md-3" for="">RT</label>
                                        <div class="col-md-9">
                                            <select name="id_rt" id="id_rt" class="form-control"></select>
                                            @if($errors->first('id_rt'))
                                                <span class="text-danger font-size-14">{{ $errors->first('id_rt') }}</span>
                                            @endif
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Kelas Sosial</label>
                                        <div class="col-md-11">
                                        <select name="id_kelas_sosial" class="form-control fill">
                                            <option value="0">--PILIH KELAS SOSIAL--</option>
                                            @foreach($kelasSosial as $sosial)
                                                <option value="{{$sosial->id}}" {{ old('id_kelas_sosial') == $sosial->id ? 'selected' : '' }}>{{$sosial->deskripsi}}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->first('id_kelas_sosial'))
                                            <span class="text-danger font-size-14">{{ $errors->first('id_kelas_sosial') }}</span>
                                        @endif
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-11" for="">Menerima PKH</label>
                                            <div class="col-md-9">
                                                <div class="form-check">
                                                    <label class="form-check-label" for="gridRadios2">
                                                        <input class="form-check-input" type="radio" name="is_pkh" id="gridRadios2" value="Y">
                                                        Ya
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <label class="form-check-label" for="gridRadios1">
                                                        <input class="form-check-input" type="radio" name="is_pkh" id="gridRadios1" value="N">
                                                        Tidak
                                                    </label>
                                                </div>
                                                @if($errors->first('is_pkh'))
                                                    <span class="text-danger font-size-14">{{ $errors->first('is_pkh') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                        <label for="">Raskin</label>
                                            <div class="form-check">
                                                <label class="form-check-label" for="raskin1">
                                                    <input class="form-check-input" type="radio" name="is_raskin" id="raskin1" value="Y">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="raskin2">
                                                    <input class="form-check-input" type="radio" name="is_raskin" id="raskin2" value="N">
                                                    Tidak
                                                </label>
                                            </div>
                                            @if($errors->first('is_raskin'))
                                                <span class="text-danger font-size-14">{{ $errors->first('is_raskin') }}</span>
                                            @endif
                                        </div>
                                        <div class="col">
                                            <label for="">Jamkesmas</label>
                                            <div class="form-check">
                                                <label class="form-check-label" for="Jamkesmas1">
                                                    <input class="form-check-input" type="radio" name="is_jamkesmas" id="Jamkesmas1" value="Y">
                                                    Ya
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label" for="Jamkesmas2">
                                                    <input class="form-check-input" type="radio" name="is_jamkesmas" id="Jamkesmas2" value="N">
                                                    Tidak
                                                </label>
                                            </div>
                                            @if($errors->first('is_jamkesmas'))
                                                <span class="text-danger font-size-14">{{ $errors->first('is_jamkesmas') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.pengelola.kesehatan.gizi-buruk')}}" type="submit" class="btn btn-warning btn-sm text-white">Batal</a>
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
                    url:"{{route('dashboard.pengelola.get-pisah-kk')}}",
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

        $('#id_dusun').change(function(){
        var dusunID = $(this).val();  
        if(dusunID){
            $.ajax({
            type:"GET",
            url:"{{url('get-rw-list')}}?id_dusun="+dusunID,
            success:function(res){        
            if(res){
                $("#id_rw").empty();
                $("#id_rw").append('<option>Select</option>');
                $.each(res,function(key,value){
                $("#id_rw").append('<option value="'+key+'">'+value+'</option>');
                });
            
            }else{
                $("#id_rw").empty();
            }
            }
            });
        }else{
            $("#id_rw").empty();
            $("#id_rt").empty();
        }   
        });
        $('#id_rw').on('change',function(){
        var rwID = $(this).val();  
        if(rwID){
            $.ajax({
            type:"GET",
            url:"{{url('get-rt-list')}}?id_rw="+rwID,
            success:function(res){        
            if(res){
                $("#id_rt").empty();
                $.each(res,function(key,value){
                $("#id_rt").append('<option value="'+key+'">'+value+'</option>');
                });
            
            }else{
                $("#id_rt").empty();
            }
            }
            });
        }else{
            $("#id_rt").empty();
        }
            
        });
</script>
@endsection