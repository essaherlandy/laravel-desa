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
                    <h4>Logo Desa dan Logo Kabupaten</h4>
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
                
                    <div class="row mt-3">
                        <div class="col-md-12">
                            @if(count($logos) > 0)
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Konten Logo Desa</th>
                                        <th>Konten Logo Kabupaten</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no=1;?>
                                    @foreach($logos as $index => $logo)
                                    <tr>
                                        <td>{{$index + $logos->firstItem()}}</td>
                                        <td><img src="{{$logo->konten_logo_desa}}" style="width:150px;heitgh:150px;"></td>
                                        <td><img src="{{$logo->konten_logo_kabupaten}}" style="width:150px;heitgh:150px;"></td>
                                        <td>
                                            <a type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editPengguna{{$logo->id}}"><i class="fa fa-edit"></i></a>
                                            <!-- Modal -->
                                            <div class="modal fade" id="editPengguna{{$logo->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Edit Logo</h3>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{route('dashboard.admin.logo-update',$logo->id)}}" method="POST" enctype="multipart/form-data">
                                                                {{csrf_field()}}
                                                                <div class="form-group">
                                                                    <label>Logo Desa</label>
                                                                    <br>
                                                                    <br>
                                                                    <img src="{{$logo->konten_logo_desa}}" style="width:150px;heitgh:150px;">
                                                                    <br>
                                                                    <input type="file" name="konten_logo_desa" class="form-control">
                                                                </div>
                                                                <br>
                                                                <div class="form-group">
                                                                    <label>Logo Kabupaten</label>
                                                                    <br>
                                                                    <br>
                                                                    <img src="{{$logo->konten_logo_kabupaten}}" style="width:150px;heitgh:150px;">
                                                                    <br>
                                                                    <input type="file" name="konten_logo_kabupaten" class="form-control">
                                                                </div>
                                                            </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-primary">Simpan Data</button>
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
                            <a>Total Keseluruhan: <b>{{ $logos->total() }}</b></a>
                            {{$logos->appends(request()->query())->links()}}
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
@endsection