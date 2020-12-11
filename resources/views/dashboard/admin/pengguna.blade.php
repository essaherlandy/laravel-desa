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
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading pb-0">
                    <form action="{{route('dashboard.admin.pengguna')}}" method="GET">
                        <div class="col-lg-12 row justify-content-between">
                            <div class="input-group ">
                                <input type="text" name="search" class="form-control col-lg-10 col-sm-12 mb-2" placeholder="Cari data berdasarkan Nama, email, telepon..." value="@isset($_GET['search']){{$_GET['search']}}@endisset">
                                <span class="input-group-btn"><input class="btn btn-primary" type="submit" value="CARI"></span>
                            </div>
                        </div>
                    </form>
                </div>
                <hr class="mt-3">
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
                <div class="panel-body">
                <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahPengguna"><i class="fa fa-plus"></i> Tambah</a>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            @if(count($users) > 0)
                            <table class="table table-striped">
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
                                    <?php $no=1;?>
                                    @foreach($users as $index => $user)
                                    <tr>
                                        <td>{{$index + $users->firstItem()}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->role}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->nomor_telepon}}</td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPengguna{{$user->id}}"><i class="fa fa-edit"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editPengguna{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Edit Data Pengguna</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('dashboard.admin.update',$user->id)}}" method="POST" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <label>Nama User</label>
                                                                    <input name="name" type="text" class="form-control" value="{{$user->name}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Login Sebagai</label>
                                                                    <input name="role" type="text" class="form-control" value="{{$user->role}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email</label>
                                                                    <input name="email" type="text" class="form-control" value="{{$user->email}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Password</label>
                                                                    <input name="password" type="password" class="form-control" value="{{$user->password}}">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nomor Telepon</label>
                                                                    <input name="nomor_telepon" type="text" class="form-control" value="{{$user->nomor_telepon}}">
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
                                            <a type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusPengguna{{$user->id}}"><i class="fa fa-trash"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="hapusPengguna{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-body">
                                                            <form action="{{route('dashboard.admin.delete',$user->id)}}" method="get" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <h4 class="text-center"><b>Apakah Anda Yakin Ingin Menghapus Data dengan nama <br>{{$user->name}}??</b></h4>
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>  Ya, Lanjutkan</button>
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
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <h3 class="text-center"><i class="fa fa-warning"></i> Tidak Ada Data</h3>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    <!-- END MAIN CONTENT -->
</div>

<!-- Modal -->
<div class="modal fade" id="tambahPengguna" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <p class="text-white text-center"><strong>Mohon Diperhatikan!</strong></p>
                    </div>
                    <div class="alert alert-info" role="alert">
                        <p class="text-white text-center"><strong>FORMULIR INI KHUSUS UNTUK PEMBUATAN DATA USER</strong></p>
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input name="name" type="text" class="form-control" placeholder="Masukan nama sser">
                    </div>
                    <div class="form-group">
                        <label>Login Sebagai</label>
                        <select class="form-control" name="role" class="form-control">
                            <option>-PILIH STATUS LOGIN-</option>
                            <option value="admin">Administrator</option>
                            <option value="pengelola">Pengelola</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input name="email" type="text" class="form-control" placeholder="Masukan email">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="password" type="password" class="form-control" placeholder="Masukan password">
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input name="nomor_telepon" type="text" class="form-control" placeholder="Masukan no telepon">
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