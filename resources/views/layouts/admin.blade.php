<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- /Added by HTTrack -->

<head>
    <title>Admin Desa</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('adminity')}}/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">  

    <link rel="stylesheet" href="{{asset('adminity')}}/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('adminity')}}/css/feather.css">

    <link rel="stylesheet" type="text/css" href="{{asset('adminity')}}/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="{{asset('adminity')}}/css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="{{asset('adminity')}}/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('adminity')}}/css/widget.css">
    
    
    @yield('styles')
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a href="index.html">
                            <img class="img-fluid" src="{{asset('adminity')}}/logodesa/logo_desa.png"
                                alt="Theme-Logo" />
                        </a>
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu icon-toggle-right"></i>
                        </a>
                        <a class="mobile-options waves-effect waves-light">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <a href="#!"
                                    onclick="if (!window.__cfRLUnblockHandlers) return false; javascript:toggleFullScreen()"
                                    class="waves-effect waves-light" data-cf-modified-d2d1d6e2f87cbebdf4013b26-="">
                                    <i class="full-screen feather icon-maximize"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <span>{{Auth::user()->name}}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="/logout">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    @if(auth()->user()->role == 'admin')
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="{{url('dashboard')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="{{route('dashboard.admin.pengguna')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-user"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pengguna</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-globe"></i></span>
                                            <span class="pcoded-mtext">Pengelolaan Data Web</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.admin.logo')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Logo</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.slider-beranda')}}" class="
                                                    waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Slider Beranda</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.berita')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Berita</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.kegiatan')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kegiatan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.produk-olahan')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Produk Olahan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.sejarah-desa')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Sejarah Desa</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.demografi-desa')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Demografi Desa</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.visi-misi')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Visi dan Misi Desa</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.produk-olahan')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Peta Desa</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.produk-olahan')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Regulasi</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="fa fa-compass"></i></span>
                                            <span class="pcoded-mtext">Pengelolaan Wilayah</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.admin.provinsi')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan Provinsi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.kabupaten-kota')}}" class="
                                                    waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan Kabupaten/Kota</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.kecamatan')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan Kecamatan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.desa')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan Desa</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.dusun')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan Dusun</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.rw')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan RW</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.demografi-desa')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pengelolaan RT</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-layers"></i>
                                            </span>
                                            <span class="pcoded-mtext">Potensi Ekonimi Desa</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="widget-statistic.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pertanian</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="widget-data.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Perkebunan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="widget-chart.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pertambakan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="widget-chart.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Sumber Air</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="widget-chart.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Sumber Energi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="widget-chart.html" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Potensi Wisata</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="foo-table.html" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-star"></i>
                                            </span>
                                            <span class="pcoded-mtext">Perangkat Desa</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="foo-table.html" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pesan</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    @endif
                    @if(auth()->user()->role == 'pengelola')
                    <nav class="pcoded-navbar">
                        <div class="nav-list">
                            <div class="pcoded-inner-navbar main-menu">
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="{{url('dashboard')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="feather icon-home"></i>
                                            </span>
                                            <span class="pcoded-mtext">Dashboard</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pustaka Kependudukan</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pendidikan')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pendidikan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pekerjaan')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pekerjaan Umum</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pekerjaan-penduduk')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pekerjaan Penduduk</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.golongan-darah')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Golongan Darah</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.agama')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Agama</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.kewarganegaraan')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kewarganegaraan</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.kompetensi')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kompetensi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.status-keluarga')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Status Keluarga</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.status-penduduk')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Status Penduduk</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-list"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pustaka Lainnya</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.difabilitas')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Difabilitas</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.kode-surat')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kode Surat</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.kontrasepsi')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kontrasepsi</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.status-tinggal')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Status Tinggal</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.alasan-pindah')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Alasan Pindah</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.jenis-pindah')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Jenis Pindah</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.klarifikasi-pindah')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Klasifikasi Pindah</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pustakalainnya.jabatan')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Jabatan</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                                            <span class="pcoded-mtext">Kependudukan</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.data-keluarga')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Data KK dan Penduduk</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.pisah-keluarga')}}" class="
                                                    waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Pisah Kartu Keluarga</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.berita')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Cetak Kartu Keluarga</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon"><i class="fa fa-desktop"></i></span>
                                            <span class="pcoded-mtext">Sosial Penduduk</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.admin.logo')}}"
                                                    class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Penerima Bantuan Sosial</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.admin.slider-beranda')}}" class="
                                                    waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Bantuan Siswa Miskin</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-medkit"></i>
                                            </span>
                                            <span class="pcoded-mtext">Kesehatan Penduduk</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.kesehatan.gizi-buruk')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Data Gizi Buruk</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.kesehatan.kehamilan')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Data Kehamilan</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="pcoded-hasmenu">
                                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-newspaper"></i>
                                            </span>
                                            <span class="pcoded-mtext">Peristiwa</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.peristiwa.kelahiran')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Kelahiran</span>
                                                </a>
                                            </li>
                                            <li class="">
                                                <a href="{{route('dashboard.pengelola.peristiwa.kematian')}}" class="waves-effect waves-dark">
                                                    <span class="pcoded-mtext">Meninggal</span>
                                                </a>
                                            </li>
                                            <li class="pcoded-hasmenu pcoded-trigger" dropdown-icon="style1" subitem-icon="style1">
                                                <a href="javascript:void(0)" class="waves-effect waves-dark">
                                                <span class="pcoded-mtext">Pindah Penduduk</span>
                                                </a>
                                                <ul class="pcoded-submenu" style="display: block;">
                                                    <li class="">
                                                        <a href="{{route('dashboard.pengelola.peristiwa.pindah-masuk')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Pindah Masuk</span>
                                                        </a>
                                                    </li>
                                                    <li class="">
                                                        <a href="{{route('dashboard.pengelola.peristiwa.pindah-keluar')}}" class="waves-effect waves-dark">
                                                        <span class="pcoded-mtext">Pindah Keluar</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="{{route('dashboard.pengelola.perangkat.data-perangkat')}}" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-user"></i>
                                            </span>
                                            <span class="pcoded-mtext">Kelola Perangkat Desa</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="foo-table.html" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-envelope"></i>
                                            </span>
                                            <span class="pcoded-mtext">Surat Menyurat</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class=" ">
                                        <a href="foo-table.html" class="waves-effect waves-dark">
                                            <span class="pcoded-micon">
                                                <i class="fa fa-search"></i>
                                            </span>
                                            <span class="pcoded-mtext">Pencarian Pintar</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    @endif
                    <div class="pcoded-content">
                        <div class="page-header card">
                            <div class="row align-items-end">
                            </div>
                        </div>

                        @yield('content')
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>


    <script data-cfasync="false" src="{{asset('adminity')}}/js/email-decode.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{asset('adminity')}}/js/popper.min.js"></script>
    
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{asset('adminity')}}/js/bootstrap.min.js"></script>

    <script src="{{asset('adminity')}}/js/waves.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{asset('adminity')}}/js/jquery.slimscroll.js">
    </script>

    <script src="{{asset('adminity')}}/js/jquery.flot.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="{{asset('adminity')}}/js/jquery.flot.categories.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript">
    </script>
    <script src="{{asset('adminity')}}/js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="{{asset('adminity')}}/js/jquery.flot.tooltip.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript">
    </script>

    <script src="{{asset('adminity')}}/js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="{{asset('adminity')}}/js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="{{asset('adminity')}}/js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="{{asset('adminity')}}/js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

    <script src="{{asset('adminity')}}/js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>
    <script src="{{asset('adminity')}}/js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript">
    </script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{asset('adminity')}}/js/custom-dashboard.min.js">
    </script>
    <script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="{{asset('adminity')}}/js/script.min.js"></script>
    <script src="{{asset('adminity')}}/js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49"
        defer=""></script>
    
    @yield('footer')
</body>

</html>