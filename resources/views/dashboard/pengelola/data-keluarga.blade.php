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
                                <a href="{{route('dashboard.pengelola.keluarga-create')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-plus"></i> Tambah Data</a>
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($penduduks) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>No KK</th>
                                                            <th>Nama Kepala penduduk</th>
                                                            <th>Alamat</th>
                                                            <th>RT</th>
                                                            <th>RW</th>
                                                            <th>Dusun</th>
                                                            <th colspan="4">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                    <?php $no=1;?>
                                                    @foreach($penduduks as $index => $penduduk)
                                                    <tr>
                                                        <td>{{$index + $penduduks->firstItem()}}</td>
                                                        <td>{{$penduduk->keluarga->no_kk}}</td>
                                                        <td>{{$penduduk->keluarga->hubungan_keluarga->first()->nama_ayah}}</td>
                                                        <td>{{$penduduk->keluarga->alamat_jalan}}</td>
                                                        <td>{{$penduduk->rw->nomor_rw}}</td>
                                                        <td>{{$penduduk->rt->nomor_rt}}</td>
                                                        <td>{{$penduduk->dusun->nama_dusun}}</td>
                                                        <td>
                                                            <a href="{{route('dashboard.pengelola.edit-keluarga', $penduduk->id)}}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                            <a href="" class="btn btn-success btn-sm"><i class="fa fa-plus"></i></a>
                                                            <a href="" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                            <a href="" class="btn btn-primary btn-sm"><i class="fa fa-print"></i></a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $penduduks->total() }}</b></a>
                                                {{$penduduks->appends(request()->query())->links()}}
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
<!-- Modal -->
<div class="modal fade" id="tambahpenduduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengguna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('dashboard.admin.pengguna-store')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button>
                        <strong>DATA penduduk</strong>
                    </div>
                    <div class="form-group">
                        <label>Nomor Kartu penduduk</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Dusun</label>
                            <input type="text" class="form-control" placeholder="Dusun">
                        </div>
                        <div class="col-sm-4">
                        <label for="">RW</label>
                            <input type="text" class="form-control" placeholder="RW">
                        </div>
                        <div class="col">
                        <label for="">RT</label>
                            <input type="text" class="form-control" placeholder="RT">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kelas Sosial</label>
                        <select name="select" class="form-control fill">
                            <option value="0">--PILIH KELAS SOSIAL--</option>
                            <option value="Kaya">Kaya</option>
                            <option value="Sedang">Sedang</option>
                            <option value="Miskin">Miskin</option>
                            <option value="Sangat Miskin">Sangat Miskin</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Menerima PKH</label>
                            <div class="form-check">
                                <label class="form-check-label" for="gridRadios2">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="gridRadios1">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                        <label for="">Raskin</label>
                            <div class="form-check">
                                <label class="form-check-label" for="raskin1">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="raskin1" value="option2">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="raskin2">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="raskin2" value="option2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                        <div class="col">
                        <label for="">Jamkesmas</label>
                        <div class="form-check">
                                <label class="form-check-label" for="Jamkesmas1">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="Jamkesmas1" value="option2">
                                    Ya
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label" for="Jamkesmas2">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="Jamkesmas2" value="option2">
                                    Tidak
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button>
                        <strong>Data Kepala penduduk</strong>
                    </div>
                    <div class="form-group">
                        <label>Status Penduduk Sementara</label>
                        <div class="form-check">
                            <label class="form-check-label" for="Status1">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Status1" value="option2">
                                Ya
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="Status2">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Status2" value="option2">
                                Tidak
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>NIK*</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Tempat/Tgl Lahir</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <div class="form-check">
                            <label class="form-check-label" for="Kelamin1">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Kelamin1" value="option2" onclick="show1();">
                                Laki-Laki
                            </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label" for="Kelamin2">
                                <input class="form-check-input" type="radio" name="gridRadios" id="Kelamin2" value="option2" onclick="show2();">
                                Perempuan
                            </label>
                        </div>
                        <div id="div1" class="hide">
                            <hr><p>Okay Cool! Here are those two...</p>
                            <input type="checkbox" value="Yes" name="one">
                            One &nbsp;
                            <input type="checkbox" value="Yes" name="two">
                            Two
                        </div>
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