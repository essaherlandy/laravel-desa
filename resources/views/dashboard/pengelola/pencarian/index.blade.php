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
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Jenis Kelamin</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadioJK1">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadioJK1" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosJK2">
                                                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="gridRadiosJK2" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Tempat Lahir</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosTL1">
                                                    <input class="form-check-input" type="radio" name="tempat_lahir" id="gridRadiosTL1" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosTL2">
                                                    <input class="form-check-input" type="radio" name="tempat_lahir" id="gridRadiosTL2" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Golongan Darah</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadios2">
                                                    <input class="form-check-input" type="radio" name="golongandarah" id="gridRadios2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadios1">
                                                    <input class="form-check-input" type="radio" name="golongandarah" id="gridRadios1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Kewarganegaraan</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosK2">
                                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="gridRadiosK2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosK1">
                                                    <input class="form-check-input" type="radio" name="kewarganegaraan" id="gridRadiosK1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Pendidikan</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                            <label class="form-check-label mr-4" for="gridRadiosPD2">
                                                    <input class="form-check-input" type="radio" name="pendidikan" id="gridRadiosPD2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosPD1">
                                                    <input class="form-check-input" type="radio" name="pendidikan" id="gridRadiosPD1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Agama</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosAgama2">
                                                    <input class="form-check-input" type="radio" name="agama" id="gridRadiosAgama2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosAgama1">
                                                    <input class="form-check-input" type="radio" name="agama" id="gridRadiosAgama1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Pekerjaan</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosPekerjaan2">
                                                    <input class="form-check-input" type="radio" name="pekerjaan" id="gridRadiosPekerjaan2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosPekerjaan1">
                                                    <input class="form-check-input" type="radio" name="pekerjaan" id="gridRadiosPekerjaan1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Status Perkawinan</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosStatusK2">
                                                    <input class="form-check-input" type="radio" name="statu_kawin" id="gridRadiosStatusK2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosStatusK1">
                                                    <input class="form-check-input" type="radio" name="statu_kawin" id="gridRadiosStatusK1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Status Penduduk</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosStatusPend2">
                                                    <input class="form-check-input" type="radio" name="status_penduduk" id="gridRadiosStatusPend2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosStatusPend1">
                                                    <input class="form-check-input" type="radio" name="status_penduduk" id="gridRadiosStatusPend1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Status Tinggal</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosStatusT2">
                                                    <input class="form-check-input" type="radio" name="status_tinggal" id="gridRadiosStatusT2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosStatusT1">
                                                    <input class="form-check-input" type="radio" name="status_tinggal" id="gridRadiosStatusT1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Penyandang Difabilitas</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosDifabilitas2">
                                                    <input class="form-check-input" type="radio" name="difabilitas" id="gridRadiosDifabilitas2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosDifabilitas1">
                                                    <input class="form-check-input" type="radio" name="difabilitas" id="gridRadiosDifabilitas1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Kelas Sosial</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosSosial2">
                                                    <input class="form-check-input" type="radio" name="kelas_sosial" id="gridRadiosSosial2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosSosial1">
                                                    <input class="form-check-input" type="radio" name="kelas_sosial" id="gridRadiosSosial1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-9" for="">Penerima Bantuan Siswa Miskin</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosSiswa2">
                                                    <input class="form-check-input" type="radio" name="siswa_miskin" id="gridRadiosSiswa2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosSiswa1">
                                                    <input class="form-check-input" type="radio" name="siswa_miskin" id="gridRadiosSiswa1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Penerima Raskin</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                            <label class="form-check-label mr-4" for="gridRadiosRaskin2">
                                                    <input class="form-check-input" type="radio" name="raskin" id="gridRadiosRaskin2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosRaskin1">
                                                    <input class="form-check-input" type="radio" name="raskin" id="gridRadiosRaskin1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-5" for="">Penerima Jamkesmas</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosJamkesmas2">
                                                    <input class="form-check-input" type="radio" name="jamkesmas" id="gridRadiosJamkesmas2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosJamkesmas1">
                                                    <input class="form-check-input" type="radio" name="jamkesmas" id="gridRadiosJamkesmas1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col">
                                            <label class="col-md-9" for="">Penerima Program Keluarga Harapan</label>
                                            <div class="col-md-11">
                                                <select id="id_dusun" name="id_dusun" class="form-control">
                                                    <option value="" selected disabled>Select</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-4 mt-5">
                                            <div class="col-md-9">
                                                <label class="form-check-label mr-4" for="gridRadiosKeluarga2">
                                                    <input class="form-check-input" type="radio" name="keluarga_harapan" id="gridRadiosKeluarga2" value="DAN">
                                                    DAN
                                                </label>
                                                <label class="form-check-label" for="gridRadiosKeluarga1">
                                                    <input class="form-check-input" type="radio" name="keluarga_harapan" id="gridRadiosKeluarga1" value="ATAU">
                                                    ATAU
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.pengelola.kesehatan.kehamilan')}}" type="submit" class="btn btn-warning btn-sm text-white">Batal</a>
                                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search" aria-hidden="true"></i>Cari</button>
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