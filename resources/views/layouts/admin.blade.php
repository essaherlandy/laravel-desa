<!doctype html>
<html lang="en">

<head>
	<title>Dashboard</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="{{asset('temp')}}/assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="{{asset('temp')}}/assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{asset('temp')}}/assets/vendor/linearicons/style.css">
	<link rel="stylesheet" href="{{asset('temp')}}/assets/vendor/chartist/css/chartist-custom.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('temp')}}/assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
  <link rel="stylesheet" href="{{asset('temp')}}/assets/css/demo.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('temp')}}/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('temp')}}/assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<!-- NAVBAR -->
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-btn">
					<button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
				</div>
				<div id="navbar-menu">
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{asset('temp')}}/assets/img/user.png" class="img-circle" alt="Avatar"> <span>Samuel</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
							<ul class="dropdown-menu">
								<li><a href="/logout"><i class="lnr lnr-exit"></i> <span>Logout</span></a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<!-- END NAVBAR -->
		<!-- LEFT SIDEBAR -->
		<div id="sidebar-nav" class="sidebar">
			<div class="sidebar-scroll">
				<nav>
			@if(auth()->user()->role == 'admin')
			<ul class="nav">
              <li>
                <a href="{{url('admin/dashboard')}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{route('dashboard.admin.pengguna')}}"><i class="lnr lnr-user"></i> <span>Pengguna</span></a>
              </li>
              <li>
                  <a href="#subPages" data-toggle="collapse" aria-expanded="true"><i class="fa fa-globe"></i> <span>Pengelolaan Data Web</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                        <li><a class="nav-link" href="{{route('dashboard.admin.logo')}}">Logo</a></li>
                        <li><a class="nav-link" href="{{route('dashboard.admin.slider-beranda')}}">Slider Beranda</a></li>
                        <li><a class="nav-link" href="{{route('dashboard.admin.berita')}}">Berita</a></li>
                        <li><a class="nav-link" href="{{route('dashboard.admin.kegiatan')}}">Kegiatan</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Produk Olahan</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Sejarah Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Demografi Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Visi Misi Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Peta Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Regulasi</a></li>
                    </ul>
                  </div>
              </li>
              <li>
                  <a href="#subPages1" data-toggle="collapse" aria-expanded="true"><i class="fa fa-map"></i> <span>Pengelolaan Data Wilayah</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages1" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                        <li><a class="nav-link" href="bootstrap-alert.html">Pengelolaan Provinsi</a></li>
                        <li><a class="nav-link" href="bootstrap-badge.html">Pengelolaan Kabupaten Kota</a></li>
                        <li><a class="nav-link" href="bootstrap-breadcrumb.html">Pengelolaan Kecamatan</a></li>
                        <li><a class="nav-link" href="bootstrap-buttons.html">Pengelolaan Desa</a></li>
                        <li><a class="nav-link" href="bootstrap-card.html">Pengelolaan Dusun</a></li>
                        <li><a class="nav-link" href="bootstrap-carousel.html">Pengelolaan RW</a></li>
                        <li><a class="nav-link" href="bootstrap-collapse.html">Pengelolaan RT</a></li>
                    </ul>
                  </div>
              </li>
              <li>
                  <a href="#subPages2" data-toggle="collapse" aria-expanded="true"><i class="fa fa-th-large"></i> <span>Potensi Ekonomi Desa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages2" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                      <li><a class="nav-link" href="components-article.html">Pertanian</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Perkebunan</a></li>
                      <li><a class="nav-link" href="components-chat-box.html">Pertambakan</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Sumber Air</a></li>
                      <li><a class="nav-link" href="components-gallery.html">Sumber Energi</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Potensi Wisata</a></li>
                    </ul>
                  </div>
              </li>
              <li class="">
                <a class="nav-link" href="#"><i class="fa fa-star"></i> <span>Perangkat Desa</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="#"><i class="fa fa-envelope"></i> <span>Pesan</span></a>
              </li>
          </ul>
		  @endif
		  @if(auth()->user()->role == 'pengelola')
			<ul class="nav">
              <li>
                <a href="{{url('admin/dashboard')}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{route('dashboard.admin.pengguna')}}"><i class="lnr lnr-user"></i> <span>Pengguna</span></a>
              </li>
              <li>
                  <a href="#subPages" data-toggle="collapse" aria-expanded="true"><i class="fa fa-globe"></i> <span>Pengelolaan Data Web</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                        <li><a class="nav-link" href="">Logo</a></li>
                        <li><a class="nav-link" href="layout-transparent.html">Slider Beranda</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Berita</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Kegiatan</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Produk Olahan</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Sejarah Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Demografi Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Visi Misi Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Peta Desa</a></li>
                        <li><a class="nav-link" href="layout-top-navigation.html">Regulasi</a></li>
                    </ul>
                  </div>
              </li>
              <li>
                  <a href="#subPages1" data-toggle="collapse" aria-expanded="true"><i class="fa fa-map"></i> <span>Pengelolaan Data Wilayah</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages1" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                        <li><a class="nav-link" href="bootstrap-alert.html">Pengelolaan Provinsi</a></li>
                        <li><a class="nav-link" href="bootstrap-badge.html">Pengelolaan Kabupaten Kota</a></li>
                        <li><a class="nav-link" href="bootstrap-breadcrumb.html">Pengelolaan Kecamatan</a></li>
                        <li><a class="nav-link" href="bootstrap-buttons.html">Pengelolaan Desa</a></li>
                        <li><a class="nav-link" href="bootstrap-card.html">Pengelolaan Dusun</a></li>
                        <li><a class="nav-link" href="bootstrap-carousel.html">Pengelolaan RW</a></li>
                        <li><a class="nav-link" href="bootstrap-collapse.html">Pengelolaan RT</a></li>
                    </ul>
                  </div>
              </li>
              <li>
                  <a href="#subPages2" data-toggle="collapse" aria-expanded="true"><i class="fa fa-th-large"></i> <span>Potensi Ekonomi Desa</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>
                  <div id="subPages2" class="collapse" aria-expanded="true" style="">
                    <ul class="nav">
                      <li><a class="nav-link" href="components-article.html">Pertanian</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-avatar.html">Perkebunan</a></li>
                      <li><a class="nav-link" href="components-chat-box.html">Pertambakan</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-empty-state.html">Sumber Air</a></li>
                      <li><a class="nav-link" href="components-gallery.html">Sumber Energi</a></li>
                      <li><a class="nav-link beep beep-sidebar" href="components-hero.html">Potensi Wisata</a></li>
                    </ul>
                  </div>
              </li>
              <li class="">
                <a class="nav-link" href="#"><i class="fa fa-star"></i> <span>Perangkat Desa</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="#"><i class="fa fa-envelope"></i> <span>Pesan</span></a>
              </li>
          </ul>
          @endif
				</nav>
			</div>
		</div>
		<!-- END LEFT SIDEBAR -->
		<!-- MAIN -->
		@yield('content')
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">Shared by <i class="fa fa-love"></i><a>BootstrapThemes</a>
</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="{{asset('temp')}}/assets/vendor/jquery/jquery.min.js"></script>
	<script src="{{asset('temp')}}/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="{{asset('temp')}}/assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="{{asset('temp')}}/assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="{{asset('temp')}}/assets/vendor/chartist/js/chartist.min.js"></script>
  <script src="{{asset('temp')}}/assets/scripts/klorofil-common.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script>
    @if(Session::has('sukses'))
      toastr.success('{{Session::get('sukses')}}', 'Sukses')
    @endif
  </script>
  @yield('footer')
</body>

</html>
