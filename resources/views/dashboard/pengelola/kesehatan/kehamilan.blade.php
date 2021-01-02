@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
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
                            <h3>DATA KONDISI KEHAMILAN</h3>
                            </div>

                            <div class="card-block">
                                <div class="dt-responsive table-responsive">
                                @if(session('sukses'))
                                    <div class="alert alert-success alert-dismissible show fade">
                                        <div class="alert-body">
                                            <button class="close" data-dismiss="alert">
                                            <span>×</span>
                                            </button>
                                            {{session('sukses')}}
                                        </div>
                                    </div>
                                @endif
                                <a href="{{route('dashboard.pengelola.kesehatan.kehamilan-create')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($kehamilans) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Resiko Tinggi</th>
                                                            <th>Keterangan</th>
                                                            <th>Tanggal Perkiraan Lahiran</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($kehamilans as $index => $kehamilan)
                                                    <tr>
                                                        <td>{{$index + $kehamilans->firstItem()}}</td>
                                                        <td>{{$kehamilan->penduduk[0]->nama}}</td>
                                                        <td>{{$kehamilan->is_resti}}</td>
                                                        <td>{{$kehamilan->keterangan}}</td>
                                                        <td>{{\Carbon\Carbon::parse($kehamilan->tgl_hpl)->format('d-m-Y')}}</td>
                                                        <td>
                                                        <a class="btn btn-warning btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#editkehamilans{{$kehamilan->id}}"> <i class="fa fa-edit"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="editkehamilans{{$kehamilan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data kehamilan Pindah</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.kesehatan.kehamilan-update',$kehamilan->id)}}" method="POST" enctype="multipart/form-data">
                                                                                {{csrf_field()}}
                                                                                <input id="id_penduduk" name="id_penduduk" type="hidden" class="form-control input-md ui-autocomplete-input" value="{{$kehamilan->id_penduduk}}" readonly>    
                                                                                <div class="form-group">
                                                                                    <label>NIK</label>
                                                                                    <input type="text" class="form-control" value="{{ $kehamilan->penduduk[0]->nik }}" readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Nama</label>
                                                                                    <input type="text" class="form-control" value="{{ $kehamilan->penduduk[0]->nama }}" readonly>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Resiko Tinggi</label>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label" for="Status1">
                                                                                            <input class="form-check-input" type="radio" name="is_resti" id="Status1" value="Y">
                                                                                            Ya
                                                                                        </label>
                                                                                    </div>
                                                                                    <div class="form-check">
                                                                                        <label class="form-check-label" for="Status2">
                                                                                            <input class="form-check-input" type="radio" name="is_resti" id="Status2" value="N">
                                                                                            Tidak
                                                                                        </label>
                                                                                    </div>
                                                                                    @if($errors->first('is_resti'))
                                                                                        <span class="text-danger font-size-14">{{ $errors->first('is_resti') }}</span>
                                                                                    @endif
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Keterangan</label>
                                                                                    <input name="keterangan" type="text" class="form-control" value="{{ $kehamilan->keterangan }}">
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <label>Perkiraan Tanggal Lahiran</label>
                                                                                    <input name="tgl_hpl" type="text" class="datepicker form-control" value="{{ $kehamilan->tgl_hpl}}">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn btn-primary btn-sm">Simpan Data</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end modal-->
                                                            <a class="btn btn-danger btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#hapuskehamilan{{$kehamilan->id}}"> <i class="fa fa-trash"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="hapuskehamilan{{$kehamilan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Kondidi Kehamilan</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.kesehatan.kehamilan-delete',$kehamilan->id)}}" method="GET" enctype="multipart/form-data">
                                                                                {{csrf_field()}}
                                                                                <div class="text-center">
                                                                                    <h4><strong>Apakah anda yakin ingin menghapus item ini??</strong></h4>
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-times"></i>Batal</button>
                                                                            <button type="submit" class="btn btn-danger btn-sm" onClick="return confirm('Apakah anda yakin ingin menghapus item ini?')"><i class="fa fa-trash"></i>Ya, Hapus Data</button>
                                                                        </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end modal-->
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $kehamilans->total() }}</b></a>
                                                {{$kehamilans->appends(request()->query())->links()}}
                                            </div>
                                        </div>
                                        @else
                                        <br>
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                            <button type="button" class="close" data-dismiss="alert"
                                                aria-label="Close"><span aria-hidden="true">×</span></button>
                                            <h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Data</h3>
                                        </div>
                                        @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>

<script>
    $(function(){
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
        });
    });
</script>
@endsection