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
                            <h3>EDIT DATA KELAHIRAN</h3>
                            </div>

                            <div class="card-block">
                                <form action="{{route('dashboard.pengelola.peristiwa.update-kelahiran',$kelahirans->id)}}" method="post">
                                    {{csrf_field()}}
                                    <h4>Data Bayi</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama Bayi</label>  
                                        <div class="col-md-9">
                                            <input name="nama_bayi" type="text" class="form-control" value="{{ $kelahirans->nama_bayi }}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Jenis Kelamin</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status1">
                                                <input class="form-check-input" type="radio" name="id_jenis_kelamin" id="Status1" value="2" {{ $kelahirans->id_jenis_kelamin == '2' ? 'checked' : '' }}>
                                                Laki-Laki
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status2">
                                                <input class="form-check-input" type="radio" name="id_jenis_kelamin" id="Status2" value="3" {{ $kelahirans->id_jenis_kelamin == '3' ? 'checked' : '' }}>
                                                Perempuan
                                            </label>
                                        </div>
                                        @if($errors->first('is_resti'))
                                            <span class="text-danger font-size-14">{{ $errors->first('is_resti') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                    <label class="col-md-3 control-label" for="tgl_hpl">Tanggal Kelahiran</label>  
                                        <div class="input-group mb-2 col-md-6">
                                            <div class="input-group-prepend">
                                            <div class="input-group-text"><i class="fa fa-table"></i></div>
                                            </div>
                                            <input name="tgl_kelahiran" type="text" class="datepicker form-control" value="{{$kelahirans->tgl_kelahiran}}">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="inputPassword4">Berat Bayi</label>
                                        <div class="input-group mb-3">
                                            <input name="berat_bayi" type="number" class="form-control" placeholder="Berat Bayi" aria-label="Berat" aria-describedby="basic-addon2" value="{{$kelahirans->berat_bayi}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Kg</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-9">
                                        <label for="inputPassword4">Panjang Bayi</label>
                                        <div class="input-group mb-3">
                                            <input name="panjang_bayi" type="number" class="form-control" placeholder="Panjang Bayi" aria-label="Panjang" aria-describedby="basic-addon2" value="{{$kelahirans->panjang_bayi}}">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">cm</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Apakah Bayi Kembar?</label>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status1">
                                                <input class="form-check-input" type="radio" name="is_kembar" id="Status1" value="Y" {{ $kelahirans->is_kembar == 'Y' ? 'checked' : '' }}>
                                                Ya
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <label class="form-check-label" for="Status2">
                                                <input class="form-check-input" type="radio" name="is_kembar" id="Status2" value="N" {{ $kelahirans->is_kembar == 'N' ? 'checked' : '' }}>
                                                Tidak
                                            </label>
                                        </div>
                                        @if($errors->first('is_resti'))
                                            <span class="text-danger font-size-14">{{ $errors->first('is_resti') }}</span>
                                        @endif
                                    </div>
                                    <h4 class="mt-3">Data Orang Tua</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nik_nama">Pencarian Kepala Keluarga</label>  
                                        <div class="col-md-9">
                                            <input id="id_penduduk" name="id_keluarga" type="hidden" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>    
                                            <input id="penduduk_search" type="text" class="form-control input-md ui-autocomplete-input" autocomplete="off">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <input id="id_penduduk" type="hidden" class="form-control input-md ui-autocomplete-input" autocomplete="off" readonly>    
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
                                        <label class="col-md-3 control-label" for="nama">Nama Ayah</label>  
                                        <div class="col-md-9">
                                            <input name="nama_ayah" type="text" class="form-control" value="{{$kelahirans->nama_ayah}}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama Ibu</label>  
                                        <div class="col-md-9">
                                            <input name="nama_ibu" type="text" class="form-control" value="{{$kelahirans->nama_ibu}}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <h4 class="mt-3">Data Kelahiran</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Lokasi Lahir</label>  
                                        <div class="col-md-9">
                                            <select name="lokasi_lahir" class="form-control">
                                                <option>--PILIH--</option>
                                                <option value="Rumah Bersalin" {{ ( $kelahirans->lokasi_lahir == 'Rumah Bersalin') ? 'selected' : '' }}>Rumah Bersalin</option>
                                                <option value="Bukan Rumah Bersalin" {{ ( $kelahirans->lokasi_lahir == 'Bukan Rumah Bersalin') ? 'selected' : '' }}>Bukan Rumah Bersalin</option>
                                                <option>Lainnya</option>
                                            </select>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Tempat Lahir</label>  
                                        <div class="col-md-9">
                                            <input name="tempat_lahir" type="text" class="form-control" value="{{$kelahirans->tempat_lahir}}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Nama Penolong Kelahiran</label>  
                                        <div class="col-md-9">
                                            <input name="penolong" type="text" class="form-control" value="{{$kelahirans->penolong}}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <h4 class="mt-3">Data Pelapor</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="nama">Pelapor Kelahiran</label>  
                                        <div class="col-md-9">
                                            <input name="nama_pelapor" type="text" class="form-control" value="{{$kelahirans->nama_pelapor}}">
                                            <span class="help-block"></span>  
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Hubungan Pelapor dengan Ayah</label>  
                                        <div class="col-md-9">
                                            <select name="id_pelapor" class="form-control">
                                                <option>--PILIH--</option>
                                                @foreach($pelapor as $pel)
                                                    <option value="{{$pel->id}}" <?=($pel->id == $kelahirans->id_pelapor ? 'selected' : null)?>>{{$pel->deskripsi}}</option>
                                                @endforeach
                                            </select>  
                                        </div>
                                    </div>
                                    <h4 class="mt-3">Pencetak Surat Kelahiran</h4>
                                    <hr>
                                    <div class="form-group">
                                        <label class="ml-3 control-label" for="nama">Pamong Surat Kelahiran</label>  
                                        <div class="col-md-9">
                                            <select name="id_surat" class="form-control">
                                                <option>--PILIH--</option>
                                                <option value="{{$penduduks->id}}" <?=($penduduks->id == $kelahirans->id_surat ? 'selected' : null)?>>{{$penduduks->nama}} - Kepala Desa</option>
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