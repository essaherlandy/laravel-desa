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
                            <h3>Tambah Data Perpindahan Masuk Penduduk</h3>
                            </div>

                            <div class="card-block">
                                <form action="{{route('dashboard.pengelola.peristiwa.kelahiran-store')}}" method="post">
                                    {{csrf_field()}}
                                    <h4>Data Keluarga</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nomor Kartu Keluarga</label>  
                                        <div class="col-md-11">
                                            <input name="nama_bayi" type="text" class="form-control" placeholder="Nomor Kartu Keluarga">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama Kepala Keluarga</label>  
                                        <div class="col-md-11">
                                            <input name="nama_bayi" type="text" class="form-control" placeholder="Nama Kepala Keluarga">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status1">
                                                <input class="form-check-input" type="radio" name="is_kembar" id="Status1" value="2">
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status2">
                                                <input class="form-check-input" type="radio" name="is_kembar" id="Status2" value="3">
                                                Perempuan
                                            </label>
                                        </div>
                                        @if($errors->first('is_resti'))
                                            <span class="text-danger font-size-14">{{ $errors->first('is_resti') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Tempat Lahir</label>  
                                        <div class="col-md-11">
                                            <input name="nama_bayi" type="text" class="form-control" placeholder="Tempat Lahir">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Lahir</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_kelahiran" type="text" class="datepicker form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <h4 class="mt-3">Data Daerah Tujuan</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Alamat</label>  
                                        <div class="col-md-11">
                                            <input name="nama_ayah" type="text" class="form-control" placeholder="Alamat">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Desa</label>  
                                        <div class="col-md-11">
                                            <select name="lokasi_lahir" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($desa as $des)
                                                <option value="{{$des->id}}" {{ old('id_pel') == $des->id ? 'selected' : '' }}>{{$des->nama_desa}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-4 control-label" for="">Dusun</label>
                                            <div class="col-md-9">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                    @foreach($dusun as $key => $dusuns)
                                                    <option value="{{$key}}"> {{$dusuns}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @if($errors->first('id_dusun'))
                                                <span class="text-danger font-size-14">{{ $errors->first('id_dusun') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                        <label class="col-md-3" for="">RW</label>
                                        <select name="id_rw" id="id_rw" class="form-control"></select>
                                        @if($errors->first('id_rw'))
                                            <span class="text-danger font-size-14">{{ $errors->first('id_rw') }}</span>
                                        @endif
                                        </div>
                                        <div class="col">
                                        <label class="col-md-3" for="">RT</label>
                                        <div class="col-md-9">
                                            <select name="id_rt" id="id_rt" class="form-control"></select>
                                        </div>
                                            @if($errors->first('id_rt'))
                                                <span class="text-danger font-size-14">{{ $errors->first('id_rt') }}</span>
                                            @endif
                                            
                                        </div>
                                    </div>
                                    <h4 class="mt-3">Data Pindahan</h4>
                                    <hr>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Pindah</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_kelahiran" type="text" class="datepickerpindah form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Jenis Pindah</label>  
                                        <div class="col-md-11">
                                            <select name="lokasi_lahir" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($jenisPindah as $jenis)
                                                <option value="{{$jenis->id}}" {{ old('id_pel') == $jenis->id ? 'selected' : '' }}>{{$jenis->deskripsi}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Klasifikasi Pindah</label>  
                                        <div class="col-md-11">
                                            <select name="lokasi_lahir" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($klasifikasiPindah as $klasifikasi)
                                                <option value="{{$klasifikasi->id}}" {{ old('id_pel') == $klasifikasi->id ? 'selected' : '' }}>{{$klasifikasi->deskripsi}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Alasan Pindah</label>  
                                        <div class="col-md-11">
                                            <select name="lokasi_lahir" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($alasanPindah as $alasan)
                                                <option value="{{$alasan->id}}" {{ old('id_pel') == $alasan->id ? 'selected' : '' }}>{{$alasan->deskripsi}}</option>
                                                @endforeach
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

<script>
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
    $(function(){
        $(".datepickerpindah").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
<script type="text/javascript">
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