<!DOCTYPE html>
<html lang="zxx">
  <head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>World Time</title>
    <!-- plugin css for this page -->
    <link
      rel="stylesheet"
      href="{{asset('app')}}/assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link rel="stylesheet" href="{{asset('app')}}/assets/vendors/aos/dist/aos.css/aos.css" />
    <!-- End plugin css for this page -->
    <link rel="shortcut icon" href="{{asset('app')}}/assets/images/favicon.png" />
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('app')}}/assets/css/style.css">
    <!-- endinject -->
  </head>

  <body>
    <div class="container-scroller">
      <div class="main-panel">
        <!-- partial:../partials/_navbar.html -->
        <header id="header">
          <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light">
              <div class="navbar-top">
                <div class="d-flex justify-content-between align-items-center">
                </div>
              </div>
              <div class="navbar-bottom">
                <div class="d-flex justify-content-between align-items-center">
                  <div>
                    <button
                      class="navbar-toggler" type="button" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse justify-content-center collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav d-lg-flex justify-content-between align-items-center">
                        <li>
                          <button class="navbar-close">
                            <i class="mdi mdi-close"></i>
                          </button>
                        </li>
                        <li class="nav-item active">
                          <a class="nav-link" href="../index.html">Beranda</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Profile Desa
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Sejarah Desa</a>
                                <a class="dropdown-item" href="#">Demografi</a>
                                <a class="dropdown-item" href="#">Visi dan Misi</a>
                            </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./business.html">Berita</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./sports.html">Peta Desa</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Lembaga Desa
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Pemerintah Desa</a>
                                <a class="dropdown-item" href="#">Lembaga Kemasyarakatan Desa </a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Statistik Desa
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_pekerjaan">Pekerjaan</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_pendidikan">Pendidikan</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_status_kawin">Status Kawin</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_goldar">Golongan Darah</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_agama">Agama</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_kelas_sosial">Kelas Sosial</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_raskin">Raskin</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_jamkesmas">Jamkesmas</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_pkh">Program Keluarga Harapan</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_kk">Kepala Keluarga</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_gizi_buruk">Gizi Buruk</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_kehamilan">Kehamilan</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_buruh_migran">Buruh Migran</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_bsm">Bantuan Siswa Miskin</a>
                                <a class="dropdown-item" href="https://desapatala.com/web/c_statistik_piramida">Piramida Penduduk</a>
                            </div>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="./travel.html">Proyek</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Bumdes
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Struktur Organisasi</a>
                                <a class="dropdown-item" href="#">Unit Usaha</a>
                                <a class="dropdown-item" href="#">Produk Olahan</a>
                            </div>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <ul class="social-media">
                    <li>
                        <a href="{{route('login')}}" class="btn btn-primary btn-sm float-right"><i class="mdi mdi-exit-to-app"></i> Login</a>
                    </li>
                  </ul>
                </div>
              </div>
            </nav>
          </div>
        </header>

        <!-- partial -->
        <!--<div class="flash-news-banner">
          <div class="container">
            <div class="d-lg-flex align-items-center justify-content-between">
              <div class="d-flex align-items-center">
                <span class="badge badge-dark mr-3">Flash news</span>
                <p class="mb-0">
                  Lorem Ipsum has been the industry's standard dummy text ever
                  since the 1500s.
                </p>
              </div>
              <div class="d-flex">
                <span class="mr-3 text-danger">Wed, March 4, 2020</span>
                <span class="text-danger">30°C,London</span>
              </div>
            </div>
          </div>
        </div>-->

        @yield('content')
        
        <!-- main-panel ends -->
        <!-- container-scroller ends -->

        <!-- partial:../partials/_footer.html -->
        <footer>
          <div class="footer-top">
            <div class="container">
              <div class="row">
                <div class="col-sm-5">
                  <img src="../assets/images/logo.svg" class="footer-logo" alt="" />
                  <h5 class="font-weight-normal mt-4 mb-5">
                    Newspaper is your news, entertainment, music fashion website. We
                    provide you with the latest breaking news and videos straight from
                    the entertainment industry.
                  </h5>
                  <ul class="social-media mb-3">
                    <li>
                      <a href="#">
                        <i class="mdi mdi-facebook"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-youtube"></i>
                      </a>
                    </li>
                    <li>
                      <a href="#">
                        <i class="mdi mdi-twitter"></i>
                      </a>
                    </li>
                  </ul>
                </div>
                <div class="col-sm-4">
                  <h3 class="font-weight-bold mb-3">RECENT POSTS</h3>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="{{asset('app')}}/assets/images/dashboard/home_1.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="footer-border-bottom pb-2 pt-2">
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="../assets/images/dashboard/home_2.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <div>
                        <div class="row">
                          <div class="col-3">
                            <img
                              src="../assets/images/dashboard/home_3.jpg"
                              alt="thumb"
                              class="img-fluid"
                            />
                          </div>
                          <div class="col-9">
                            <h5 class="font-weight-600 mb-3">
                              Cotton import from USA to soar was American traders
                              predict
                            </h5>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-3">
                  <h3 class="font-weight-bold mb-3">CATEGORIES</h3>
                  <div class="footer-border-bottom pb-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Magazine</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Business</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Sports</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="footer-border-bottom pb-2 pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Arts</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                  <div class="pt-2">
                    <div class="d-flex justify-content-between align-items-center">
                      <h5 class="mb-0 font-weight-600">Politics</h5>
                      <div class="count">1</div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="footer-bottom">
            <div class="container">
              <div class="row">
                <div class="col-sm-12">
                  <div class="d-sm-flex justify-content-between align-items-center">
                    <div class="fs-14 font-weight-600">
                      © 2020 @ <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white"> BootstrapDash</a>. All rights reserved.
                    </div>
                    <div class="fs-14 font-weight-600">
                      Handcrafted by <a href="https://www.bootstrapdash.com/" target="_blank" class="text-white">BootstrapDash</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </footer>

        <!-- partial -->
      </div>
    </div>
    <!-- inject:js -->
    <script src="{{asset('app')}}/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->

    <script src="{{asset('app')}}/assets/vendors/aos/dist/aos.js/aos.js"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('app')}}/assets/js/demo.js"></script>
    <script src="{{asset('app')}}/assets/js/jquery.easeScroll.js"></script>
    <!-- End custom js for this page-->
  </body>
</html>