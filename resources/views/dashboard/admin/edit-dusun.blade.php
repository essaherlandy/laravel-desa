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
                                        <form action="{{route('dashboard.admin.dusun-update',$dusun->id)}}" method="POST" enctype="multipart/form-data">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label>Kode Dusun BPS</label>
                                                <input name="kode_dusun_bps" type="text" class="form-control" value="{{$dusun->kode_dusun_bps}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Kode Dusun Kemendagri</label>
                                                <input name="kode_dusun_kemendagri" type="text" class="form-control" value="{{$dusun->kode_dusun_kemendagri}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Nama Dusun</label>
                                                <input name="nama_dusun" type="text" class="form-control" value="{{$dusun->nama_dusun}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Luas Wilayah</label>
                                                <input name="luas_wilayah" type="text" class="form-control" value="{{$dusun->luas_wilayah}}">
                                            </div>
                                            <div class="form-group">
                                                <label>Desa</label>
                                                <select name="id_desa" class="form-control">
                                                    <option value="">--PILIH PPROVINSI--</option>
                                                    @foreach($desa as $d)
                                                        <option value="{{$d->id}}" <?=($d->id == $dusun->id_desa ? 'selected' : null)?>>{{$d->nama_desa}}</option>
                                                    @endforeach
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