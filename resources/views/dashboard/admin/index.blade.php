@extends('layouts.admin')

@section('content')
<div class="pcoded-inner-content">
    <div class="main-body">
        <div class="page-wrapper">
            <div class="page-body">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card table-card">
                            <div class="card-header">
                                <h5>Dashbaord</h5>
                                <div class="card-header-right">
                                    <ul class="list-unstyled card-option">
                                        <li class="first-opt"><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                        <li><i class="feather icon-maximize full-card"></i></li>
                                        <li><i class="feather icon-minus minimize-card"></i>
                                        </li>
                                        <li><i class="feather icon-refresh-cw reload-card"></i>
                                        </li>
                                        <li><i class="feather icon-trash close-card"></i></li>
                                        <li><i
                                                class="feather icon-chevron-left open-card-option"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-block p-b-0">
                                <div class="container">
                                    <div class="table-responsive">
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
            </div>
        </div>
    </div>
</div>
@endsection