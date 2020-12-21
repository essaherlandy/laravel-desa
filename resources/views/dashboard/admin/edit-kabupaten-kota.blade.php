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
                                        <form action="{{route('dashboard.admin.kabupaten-kota-update',$kotas->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label>Kode Kab BPS</label>
                                                <input name="kode_kab_kota_bps" type="text" class="form-control" value="{{$kotas->kode_kab_kota_bps}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Kab Kemendagri</label>
                                                <input name="kode_kab_kota_kemendagri" type="text" class="form-control" value="{{$kotas->kode_kab_kota_kemendagri}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Kab Kota</label>
                                                <input name="nama_kab_kota" type="text" class="form-control" value="{{$kotas->nama_kab_kota}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Luas Wilayah</label>
                                                <input name="luas_wilayah" type="text" class="form-control" value="{{$kotas->luas_wilayah}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Provinsi</label>
                                                <select name="id_provinsi" class="form-control">
                                                    <option value="">--PILIH PPROVINSI--</option>
                                                        <option value="{{$kotas->provinsi->id}}" {{$kotas->provinsi->id ? 'selected' : ''}}>{{$kotas->provinsi->nama_provinsi}}</option>
                                                </select>
                                            </div>
                                        </div>
                                    <div class="modal-footer">
                                        <a href="{{route('dashboard.admin.provinsi')}}" class="btn btn-secondary btn-sm"><i class="fa fa-window-close"></i>Batal</a>
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