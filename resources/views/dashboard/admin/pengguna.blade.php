@extends('layouts.admin')

@section('styles')
<style>
    .modal-backdrop {
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
                                <form action="{{route('dashboard.admin.pengguna')}}" method="GET">
                                    <div class="input-group ">
                                        <input type="text" name="search" class="form-control"
                                            placeholder="Cari data berdasarkan Nama, email, telepon..."
                                            value="@isset($_GET['search']){{$_GET['search']}}@endisset">
                                        <input class="btn btn-primary btn-sm" type="submit" value="CARI"></span>
                                    </div>
                                </form>
                            </div>

                            <div class="card-block">
                                <button class="btn waves-effect waves-light hor-grd btn-grd-primary btn-sm mb-3"
                                    data-toggle="modal" data-target="#tambahPengguna"> <i class="fa fa-plus"></i>
                                    Tambah</button>
                                <div class="dt-responsive table-responsive">
                                    <div id="row-select_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                        @if(count($users) > 0)
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12">
                                                <table id="row-select"
                                                    class="table table-striped table-bordered nowrap dataTable"
                                                    role="grid" aria-describedby="row-select_info">
                                                    <thead>
                                                        <tr>
                                                            <th>No</th>
                                                            <th>Nama</th>
                                                            <th>Sebagai</th>
                                                            <th>Email</th>
                                                            <th>Nomor Telepon</th>
                                                            <th colspan="2">Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tbody>
                                                        <?php $no=1;?>
                                                        @foreach($users as $index => $user)
                                                        <tr>
                                                            <td>{{$index + $users->firstItem()}}</td>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->role}}</td>
                                                            <td>{{$user->email}}</td>
                                                            <td>{{$user->nomor_telepon}}</td>
                                                            <td>
                                                                <a href="{{route('dashboard.admin.edit-pengguna',$user->id)}}"
                                                                    class="btn btn-warning btn-round waves-effect waves-light btn-sm"><i
                                                                        class="fa fa-edit"></i></a>

                                                                <!--end modal-->
                                                                <a type="button"
                                                                    class="btn btn-danger btn-round waves-effect waves-light btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#hapusPengguna{{$user->id}}"><i
                                                                        class="fa fa-trash"></i></a>
                                                                <!-- Modal -->
                                                                <div class="modal fade" id="hapusPengguna{{$user->id}}"
                                                                    tabindex="-1" role="dialog"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{route('dashboard.admin.delete',$user->id)}}"
                                                                                    method="get"
                                                                                    enctype="multipart/form-data">
                                                                                    {{csrf_field()}}
                                                                                    <p class="text-center"><b>Apakah
                                                                                            Anda Yakin Ingin
                                                                                            Menghapus Data dengan nama
                                                                                            <br>{{$user->name}}??</b>
                                                                                    </p>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary btn-sm"
                                                                                    data-dismiss="modal">Batal</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-danger btn-sm"><i
                                                                                        class="fa fa-trash"></i> Ya,
                                                                                    Lanjutkan</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                <a>Total Keseluruhan: <b>{{ $users->total() }}</b></a>
                                                {{$users->appends(request()->query())->links()}}
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
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
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
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button>
                        <strong>Mohon Diperhatikan!</strong>
                    </div>
                    <div class="alert alert-primary">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="icofont icofont-close-line-circled"></i>
                        </button>
                        <strong>FORMULIR INI KHUSUS UNTUK PEMBUATAN DATA
                            USER!</strong>
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama user"
                            value="{{ old('name') }}">
                    </div>
                    <div class="form-group">
                        <label>Login Sebagai</label>
                        <select class="form-control" name="role" class="form-control">
                            <option>-PILIH STATUS LOGIN-</option>
                            <option value="admin" {{ old('role')=='admin' ? 'selected' : '' }}>Administrator
                            </option>
                            <option value="pengelola" {{ old('role')=='pengelola' ? 'selected' : '' }}>Pengelola
                            </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Masukan email"
                            value="{{ old('email') }}">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Masukan password"
                            value="{{ old('password') }}">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="nomor_telepon" type="text" class="form-control" placeholder="Masukan no telepon"
                            value="{{ old('nomor_telepon') }}">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!--end modal-->
@endsection