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
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
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
                                <h5>Formulir Edit Provinsi</h5>
                            </div>

                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
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
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <form action="{{route('dashboard.admin.kecamatan-update',$villages->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label>Kode Desa BPS</label>
                                                <input name="kode_desa_bps" type="text" class="form-control" value="{{$villages->kode_desa_bps}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Desa Kemendagri</label>
                                                <input name="kode_desa_kemendagri" type="text" class="form-control" value="{{$villages->kode_desa_kemendagri}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Desa</label>
                                                <input name="nama_desa" type="text" class="form-control" value="{{$villages->nama_desa}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Luas Wilayah</label>
                                                <input name="luas_wilayah" type="text" class="form-control" value="{{$villages->luas_wilayah}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Kecamatan</label>
                                                <select name="id_kecamatan" class="form-control">
                                                    <option value="">--PILIH PPROVINSI--</option>
                                                        <option value="{{$villages->kecamatan->id}}" {{$villages->kecamatan->id ? 'selected' : ''}}>{{$villages->kecamatan->nama_kecamatan}}</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Alamat</label>
                                                <textarea name="alamat_desa" type="text" class="form-control">{{$villages->alamat_desa}}</textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input name="kode_pos" type="text" class="form-control" value="{{$villages->kode_pos}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Pencarian Data Kepala Desa</label>
                                                <select name="id_penduduk" class="form-control" id="cari" style="width:100%; width:20px; background-color:white;">
                                                    <option value="">--PILIH PPROVINSI--</option>
                                                        <option value="{{$villages->kecamatan->id}}" {{$villages->kecamatan->id ? 'selected' : ''}}>{{$villages->kecamatan->nama_kecamatan}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.admin.desa')}}" class="btn btn-secondary btn-sm"><i class="fa fa-window-close"></i>Batal</a>
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-save"></i>Simpan Data</button>
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
    </div>
</div>
</div>
<div id="styleSelector">
</div>
</div>
@endsection

@section('footer')
<script>
    $(document).ready(function(){
        $('#cari').select2({
        placeholder: 'Pilih Nama Kepala Desa',
        allowClear: true
        });
    });
</script>
@endsection