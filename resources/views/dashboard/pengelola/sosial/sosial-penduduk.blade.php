@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

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
                            <h3>DATA PENERIMA BANTUAN SOSIAL</h3>
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
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($penduduk) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No KK</th>
                                                            <th>NIK Kepala Keluarga</th>
                                                            <th>Nama</th>
                                                            <th>Raskin</th>
                                                            <th>Jamkesmas</th>
                                                            <th>PKH</th>
                                                            <th>Status Ekonomi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($penduduk as $index => $penduduks)
                                                    <tr>
                                                        <td>{{$index + $penduduk->firstItem()}}</td>
                                                        <td>{{$penduduks->keluarga->no_kk}}</td>
                                                        <td>{{$penduduks->nik}}</td>
                                                        <td>{{$penduduks->nama}}</td>
                                                        <td>
                                                        @if($penduduks->keluarga->is_raskin == 'Y')
                                                            Dapat
                                                        @elseif($penduduks->keluarga->is_raskin == 'N')
                                                            -
                                                        @endif
                                                        </td>
                                                        <td> 
                                                        @if($penduduks->keluarga->is_jamkesmas == 'Y')
                                                            Dapat
                                                        @elseif($penduduks->keluarga->is_jamkesmas == 'N')
                                                            -
                                                        @endif
                                                        </td>
                                                        <td>
                                                        @if($penduduks->keluarga->is_pkh == 'Y')
                                                            Dapat
                                                        @elseif($penduduks->keluarga->is_pkh == 'N')
                                                            -
                                                        @endif
                                                        </td>
                                                        <td>{{$penduduks->keluarga->kelas_sosial->deskripsi}}</td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $penduduk->total() }}</b></a>
                                                {{$penduduk->appends(request()->query())->links()}}
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
<script>
    function show1(){
        document.getElementById('div1').style.display ='none';
    }
    function show2(){
        document.getElementById('div1').style.display = 'block';
    }
</script>
@endsection