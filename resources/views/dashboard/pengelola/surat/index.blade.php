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
                            <h3>DATA SURAT</h3>
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
                                <a href="{{route('dashboard.pengelola.surat.surat-create')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($surats) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nomor Surat</th>
                                                            <th>Judul Surat</th>
                                                            <th>Tgl Awal Berlaku</th>
                                                            <th>Tgl Akhir Berlaku</th>
                                                            <th>Keperluan</th>
                                                            <th>Kategori Surat</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($surats as $index => $surat)
                                                    <tr>
                                                        <td>{{$index + $surats->firstItem()}}</td>
                                                        <td>{{$surat->nomor_surat}}</td>
                                                        <td>{{$surat->judul_surat}}</td>
                                                        <td>{{\Carbon\Carbon::parse($surat->tanggal_awal)->format('d-m-Y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($surat->tanggal_akhir)->format('d-m-Y')}}</td>
                                                        <td>{{$surat->keterangan}}</td>
                                                        <td>{{$surat->kode->deskripsi}}</td>
                                                        <td>
                                                        <a href="{{url('edit-pindah-surat', $surat->id)}}" class="btn btn-warning btn-sm mb-1"><i class="fa fa-edit"></i></a>   
                                                        <a href="{{route('dashboard.pengelola.surat.cetak-pdf', $surat->id)}}" class="btn btn-primary btn-sm mb-1" target="_blank"><i class="fa fa-print"></i></a>   
                                                        <a class="btn btn-danger btn-sm text-white mb-3"
                                                            data-toggle="modal" data-target="#hapussurat{{$surat->id}}"> <i class="fa fa-trash"></i></a>
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="hapussurat{{$surat->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel">Hapus Data Peristiwa surat</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <form action="{{route('dashboard.pengelola.surat.surat-delete',$surat->id)}}" method="GET" enctype="multipart/form-data">
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
                                                <a>Total Keseluruhan: <b>{{ $surats->total() }}</b></a>
                                                {{$surats->appends(request()->query())->links()}}
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