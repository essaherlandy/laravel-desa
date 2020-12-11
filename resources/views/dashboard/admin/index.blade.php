@extends('layouts.admin')

@section('content')
<div class="main">
    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="container-fluid">
            <!-- OVERVIEW -->
            <div class="panel panel-headline">
                <div class="panel-heading">
                    <h3 class="panel-title">Halaman Administrasi</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            <h4 class="alert-heading text-center"><strong>{{session('success')}}</strong></h4>
                            <div class="alert alert-primary text-center" role="alert">
                                Hallo, <a class="alert-link">{{Auth::user()->name}}
                                <p class="mb-0 text-center">Selamat Datang di Halaman Admin</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT -->
</div>
@endsection