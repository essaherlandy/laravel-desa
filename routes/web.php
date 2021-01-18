<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','HomeController@index')->name('welcome');

Route::get('/login','AuthController@index')->name('login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout','AuthController@logout');

/* Detail Berita dan Detail Kegiatan */
Route::get('/detail-kegiatan/{slug}','HomeController@detailKegiatan')->name('detail-kegiatan');

Route::group(['middleware' => ['auth']],function(){
    Route::get('/dashboard','DashboardController@index')->name('dashboard');
});

Route::namespace('Admin')->group(function(){
    Route::group(['middleware' => ['auth','checkRole:admin']],function(){
        /* Pengelolaan Data Web */
        /* Pengguna */
        Route::get('/pengguna','UserController@pengguna')->name('dashboard.admin.pengguna');
        Route::post('/pengguna-store','UserController@store')->name('dashboard.admin.pengguna-store');
        Route::get('/edit-pengguna/{id}','UserController@edit')->name('dashboard.admin.edit-pengguna');
        Route::post('/update-pengguna/{id}','UserController@update')->name('dashboard.admin.update');
        Route::get('/pengguna/delete/{id}', 'UserController@delete')->name('dashboard.admin.delete');

        /* Pengelolaan Data Web */

        /* Logo */
        Route::get('/logo','WebController@logo')->name('dashboard.admin.logo');
        Route::post('/update-logo/{id}','WebController@logoUpdate')->name('dashboard.admin.logo-update');
        
        /* Slider Beranda*/
        Route::get('/slider-beranda','WebController@sliderBeranda')->name('dashboard.admin.slider-beranda');
        Route::post('/slider-beranda-store','WebController@sliderStore')->name('dashboard.admin.slider-beranda-store');
        Route::get('/edit-slider-beranda/{id}','WebController@edit')->name('dashboard.admin.edit-slider-beranda');
        Route::post('/update-slider-beranda/{id}','WebController@sliderUpdate')->name('dashboard.admin.slider-beranda-update');
        Route::get('/slider-beranda/delete/{id}', 'WebController@sliderDelete')->name('dashboard.admin.slider-beranda-delete');
        
        /* Berita*/
        Route::get('/berita','BeritaController@index')->name('dashboard.admin.berita');
        Route::post('/berita-store','BeritaController@store')->name('dashboard.admin.berita-store');
        Route::get('/edit-berita/{id}','BeritaController@edit')->name('dashboard.admin.edit-berita');
        Route::post('/update-berita/{id}','BeritaController@update')->name('dashboard.admin.berita-update');
        Route::get('/berita/delete/{id}', 'BeritaController@delete')->name('dashboard.admin.berita-delete');
        
        /* Kegiatan*/
        Route::get('/kegiatan','KegiatanController@index')->name('dashboard.admin.kegiatan');
        Route::post('/kegiatan-store','KegiatanController@store')->name('dashboard.admin.kegiatan-store');
        Route::get('/edit-kegiatan/{id}','KegiatanController@edit')->name('dashboard.admin.edit-kegiatan');
        Route::post('/update-kegiatan/{id}','KegiatanController@update')->name('dashboard.admin.kegiatan-update');
        Route::get('/kegiatan/delete/{id}', 'KegiatanController@delete')->name('dashboard.admin.kegiatan-delete');
        
        /* Produk Olahan*/
        Route::get('/produk-olahan','ProdukController@index')->name('dashboard.admin.produk-olahan');
        Route::post('/produk-olahan-store','ProdukController@store')->name('dashboard.admin.produk-olahan-store');
        Route::get('/edit-produk-olahan/{id}','ProdukController@edit')->name('dashboard.admin.edit-produk-olahan');
        Route::post('/update-produk-olahan/{id}','ProdukController@update')->name('dashboard.admin.produk-olahan-update');
        Route::get('/produk-olahan/delete/{id}', 'ProdukController@delete')->name('dashboard.admin.produk-olahan-delete');

        /* Sejarah Desa*/
        Route::get('/sejarah-desa','WebController@sejarah')->name('dashboard.admin.sejarah-desa');
        Route::post('/sejarah-desa-store','WebController@sejarahStore')->name('dashboard.admin.sejarah-desa-store');
        Route::get('/edit-sejarah-desa/{id}','WebController@editSejarah')->name('dashboard.admin.edit-sejarah-desa');
        Route::post('/update-sejarah-desa/{id}','WebController@updateSejarah')->name('dashboard.admin.sejarah-desa-update');
        Route::get('/sejarah-desa/delete/{id}', 'WebController@deleteSejarah')->name('dashboard.admin.sejarah-desa-delete');

        /* Demografi Desa*/
        Route::get('/demografi-desa','DemografiController@index')->name('dashboard.admin.demografi-desa');
        Route::post('/demografi-store','DemografiController@store')->name('dashboard.admin.demografi-store');
        Route::get('/edit-demografi/{id}','DemografiController@edit')->name('dashboard.admin.edit-demografi');
        Route::post('/update-demografi/{id}','DemografiController@update')->name('dashboard.admin.demografi-update');
        Route::get('/demografi-desa/delete/{id}', 'DemografiController@delete')->name('dashboard.admin.demografi-delete');

        /* Demografi Desa*/
        Route::get('/visiMisi','WebController@visiMisi')->name('dashboard.admin.visi-misi');
        Route::post('/visiMisi-store','WebController@visiMisistore')->name('dashboard.admin.visi-misi-store');
        Route::get('/edit-visiMisi/{id}','WebController@visiMisiedit')->name('dashboard.admin.edit-visi-misi');
        Route::post('/update-visiMisi/{id}','WebController@visiMisiupdate')->name('dashboard.admin.visi-misi-update');
        Route::get('/visiMisi/delete/{id}', 'WebController@visiMisidelete')->name('dashboard.admin.visi-misi-delete');
        /* Pengelolaan Data Web End */
    
        /* Pengelolaan Data Wilayah */

        /* Provinsi */
        Route::get('provinsi','WilayahController@provinsi')->name('dashboard.admin.provinsi');
        Route::get('/edit-provinsi/{id}','WilayahController@provinsiEdit')->name('dashboard.admin.edit-provinsi');
        Route::post('/update-provinsi/{id}','WilayahController@provinsiUpdate')->name('dashboard.admin.provinsi-update');
        
        /* Kota/Kabupaten */
        Route::get('kabupaten-kota','WilayahController@kota')->name('dashboard.admin.kabupaten-kota');
        Route::get('/edit-kabupaten-kota/{id}','WilayahController@kabEdit')->name('dashboard.admin.edit-kabupaten-kota');
        Route::post('/update-kabupaten-kota/{id}','WilayahController@kabUpdate')->name('dashboard.admin.kabupaten-kota-update');
        
        /* Kecamatan */
        Route::get('kecamatan','WilayahController@kecamatan')->name('dashboard.admin.kecamatan');
        Route::get('/edit-kecamatan/{id}','WilayahController@kecEdit')->name('dashboard.admin.edit-kecamatan');
        Route::post('/update-kecamatan/{id}','WilayahController@kecUpdate')->name('dashboard.admin.kecamatan-update');
        /* Desa */
        Route::get('desa','WilayahController@desa')->name('dashboard.admin.desa');
        Route::get('/edit-desa/{id}','WilayahController@desaEdit')->name('dashboard.admin.edit-desa');
        Route::post('/update-desa/{id}','WilayahController@desaUpdate')->name('dashboard.admin.desa-update');
        /* Dusun */
        Route::get('dusun','WilayahController@dusun')->name('dashboard.admin.dusun');
        Route::post('/dusun-store','WilayahController@dusunStore')->name('dashboard.admin.dusun-store');
        Route::get('/edit-dusun/{id}','WilayahController@dusunEdit')->name('dashboard.admin.edit-dusun');
        Route::post('/update-dusun/{id}','WilayahController@dusunUpdate')->name('dashboard.admin.dusun-update');

        /* rw */
        Route::get('rw','WilayahController@rw')->name('dashboard.admin.rw');
        Route::post('/rw-store','WilayahController@rwStore')->name('dashboard.admin.rw-store');
        Route::get('/edit-rw/{id}','WilayahController@rwEdit')->name('dashboard.admin.edit-rw');
        Route::post('/update-rw/{id}','WilayahController@rwUpdate')->name('dashboard.admin.rw-update');
        /* Pengelolaan Data Wilayah End */
    });

});

Route::namespace('Pengelola')->group(function(){
    Route::group(['middleware' => ['auth','checkRole:pengelola']],function(){
        // Route::get('/dashboard','DashboardController@index');
    /* Kependudukan */
        /* Pustaka Kependudukan */

        /* Pendidikan */
        Route::get('/pendidikan','PustakapendudukController@pendidikan')->name('dashboard.pengelola.pendidikan');
        Route::post('/pendidikan-store','PustakapendudukController@pendidikanStore')->name('dashboard.pengelola.pendidikan-store');
        Route::post('/update-pendidikan/{id}','PustakapendudukController@pendidikanUpdate')->name('dashboard.pengelola.pendidikan-update');
        Route::get('/pendidikan/delete/{id}','PustakapendudukController@pendidikanDelete')->name('dashboard.pengelola.pendidikan-delete');
        /* Pekerjaan Umum */
        Route::get('/pekerjaan','PustakapendudukController@pekerjaan')->name('dashboard.pengelola.pekerjaan');
        Route::post('/pekerjaan-store','PustakapendudukController@pekerjaanStore')->name('dashboard.pengelola.pekerjaan-store');
        Route::post('/update-pekerjaan/{id}','PustakapendudukController@pekerjaanUpdate')->name('dashboard.pengelola.pekerjaan-update');
        Route::get('/pekerjaan/delete/{id}','PustakapendudukController@pekerjaanDelete')->name('dashboard.pengelola.pekerjaan-delete');

        /* Pekerjaan Penduduk */
        Route::get('/pekerjaan-penduduk','PustakapendudukController@pekerjaanPenduduk')->name('dashboard.pengelola.pekerjaan-penduduk');
        Route::post('/pekerjaan-penduduk-store','PustakapendudukController@pekerjaanpendStore')->name('dashboard.pengelola.pekerjaan-penduduk-store');
        Route::post('/update-pekerjaan-penduduk/{id}','PustakapendudukController@pekerjaanpendUpdate')->name('dashboard.pengelola.pekerjaan-penduduk-update');
        Route::get('/pekerjaan-penduduk/delete/{id}','PustakapendudukController@pekerjaanpendDelete')->name('dashboard.pengelola.pekerjaan-penduduk-delete');

        /* Golongan Darah */
        Route::get('/golongan-darah','PustakapendudukController@golonganDarah')->name('dashboard.pengelola.golongan-darah');
        Route::post('/golongan-darah-store','PustakapendudukController@goldarStore')->name('dashboard.pengelola.golongan-darah-store');
        Route::post('/update-golongan-darah/{id}','PustakapendudukController@goldarUpdate')->name('dashboard.pengelola.golongan-darah-update');
        Route::get('/golongan-darah/delete/{id}','PustakapendudukController@goldarDelete')->name('dashboard.pengelola.golongan-darah-delete');

        /* Agama */
        Route::get('/agama','PustakapendudukController@agama')->name('dashboard.pengelola.agama');
        Route::post('/agama-store','PustakapendudukController@agamaStore')->name('dashboard.pengelola.agama-store');
        Route::post('/update-agama/{id}','PustakapendudukController@agamaUpdate')->name('dashboard.pengelola.agama-update');
        Route::get('/agama/delete/{id}','PustakapendudukController@agamaDelete')->name('dashboard.pengelola.agama-delete');

        /* Kewarganegaraan */
        Route::get('/kewarganegaraan','PustakapendudukController@kewarganegaraan')->name('dashboard.pengelola.kewarganegaraan');
        Route::post('/kewarganegaraan-store','PustakapendudukController@kewarganegaraanStore')->name('dashboard.pengelola.kewarganegaraan-store');
        Route::post('/update-kewarganegaraan/{id}','PustakapendudukController@kewarganegaraanUpdate')->name('dashboard.pengelola.kewarganegaraan-update');
        Route::get('/kewarganegaraan/delete/{id}','PustakapendudukController@kewarganegaraanDelete')->name('dashboard.pengelola.kewarganegaraan-delete');

        /* Kompetensi */
        Route::get('/kompetensi','PustakapendudukController@kompetensi')->name('dashboard.pengelola.kompetensi');
        Route::post('/kompetensi-store','PustakapendudukController@kompetensiStore')->name('dashboard.pengelola.kompetensi-store');
        Route::post('/update-kompetensi/{id}','PustakapendudukController@kompetensiUpdate')->name('dashboard.pengelola.kompetensi-update');
        Route::get('/kompetensi/delete/{id}','PustakapendudukController@kompetensiDelete')->name('dashboard.pengelola.kompetensi-delete');

        /* Status Keluarga */
        Route::get('/status-keluarga','PustakapendudukController@statusKeluarga')->name('dashboard.pengelola.status-keluarga');
        Route::post('/status-keluarga-store','PustakapendudukController@statkelStore')->name('dashboard.pengelola.status-keluarga-store');
        Route::post('/update-status-keluarga/{id}','PustakapendudukController@statkelUpdate')->name('dashboard.pengelola.status-keluarga-update');
        Route::get('/status-keluarga/delete/{id}','PustakapendudukController@statkelDelete')->name('dashboard.pengelola.status-keluarga-delete');

        /* Status Penduduk */
        Route::get('/status-penduduk','PustakapendudukController@statusPenduduk')->name('dashboard.pengelola.status-penduduk');
        Route::post('/status-penduduk-store','PustakapendudukController@statpendStore')->name('dashboard.pengelola.status-penduduk-store');
        Route::post('/update-status-penduduk/{id}','PustakapendudukController@statpendUpdate')->name('dashboard.pengelola.status-penduduk-update');
        Route::get('/status-penduduk/delete/{id}','PustakapendudukController@statpendDelete')->name('dashboard.pengelola.status-penduduk-delete');

        /* Pustaka Lainnya */
        /* Difabilitas */
        Route::get('/difabilitas','PustakalainnyaController@difabilitas')->name('dashboard.pengelola.pustakalainnya.difabilitas');
        Route::post('/difabilitas-store','PustakalainnyaController@difabilitasStore')->name('dashboard.pengelola.pustakalainnya.difabilitas-store');
        Route::post('/update-difabilitas/{id}','PustakalainnyaController@difabilitasUpdate')->name('dashboard.pengelola.pustakalainnya.difabilitas-update');
        Route::get('/difabilitas/delete/{id}','PustakalainnyaController@difabilitasDelete')->name('dashboard.pengelola.pustakalainnya.difabilitas-delete');

        /* Kode Surat */
        Route::get('/kode-surat','PustakalainnyaController@kodeSurat')->name('dashboard.pengelola.pustakalainnya.kode-surat');
        Route::post('/kode-surat-store','PustakalainnyaController@kdsuratStore')->name('dashboard.pengelola.pustakalainnya.kode-surat-store');
        Route::post('/update-kode-surat/{id}','PustakalainnyaController@kdsuratUpdate')->name('dashboard.pengelola.pustakalainnya.kode-surat-update');
        Route::get('/kode-surat/delete/{id}','PustakalainnyaController@kdsuratDelete')->name('dashboard.pengelola.pustakalainnya.kode-surat-delete');
        
        /* Kontrasepsi */
        Route::get('/kontrasepsi','PustakalainnyaController@kontrasepsi')->name('dashboard.pengelola.pustakalainnya.kontrasepsi');
        Route::post('/kontrasepsi-store','PustakalainnyaController@kontrasepsiStore')->name('dashboard.pengelola.pustakalainnya.kontrasepsi-store');
        Route::post('/update-kontrasepsi/{id}','PustakalainnyaController@kontrasepsiUpdate')->name('dashboard.pengelola.pustakalainnya.kontrasepsi-update');
        Route::get('/kontrasepsi/delete/{id}','PustakalainnyaController@kontrasepsiDelete')->name('dashboard.pengelola.pustakalainnya.kontrasepsi-delete');

        /* Status Tinggal */
        Route::get('/status-tinggal','PustakalainnyaController@statusTinggal')->name('dashboard.pengelola.pustakalainnya.status-tinggal');
        Route::post('/status-tinggal-store','PustakalainnyaController@tinggalStore')->name('dashboard.pengelola.pustakalainnya.status-tinggal-store');
        Route::post('/update-status-tinggal/{id}','PustakalainnyaController@tinggalUpdate')->name('dashboard.pengelola.pustakalainnya.status-tinggal-update');
        Route::get('/status-tinggal/delete/{id}','PustakalainnyaController@tinggalDelete')->name('dashboard.pengelola.pustakalainnya.status-tinggal-delete');

        /* Alasan Pindah */
        Route::get('/alasan-pindah','PustakalainnyaController@alasanPindah')->name('dashboard.pengelola.pustakalainnya.alasan-pindah');
        Route::post('/alasan-pindah-store','PustakalainnyaController@alasanStore')->name('dashboard.pengelola.pustakalainnya.alasan-pindah-store');
        Route::post('/update-alasan-pindah/{id}','PustakalainnyaController@alasanUpdate')->name('dashboard.pengelola.pustakalainnya.alasan-pindah-update');
        Route::get('/alasan-pindah/delete/{id}','PustakalainnyaController@alasanDelete')->name('dashboard.pengelola.pustakalainnya.alasan-pindah-delete');
        
        /* Jabatan */
        Route::get('/jabatan','PustakalainnyaController@jabatan')->name('dashboard.pengelola.pustakalainnya.jabatan');
        Route::post('/jabatan-store','PustakalainnyaController@jabatanStore')->name('dashboard.pengelola.pustakalainnya.jabatan-store');
        Route::post('/update-jabatan/{id}','PustakalainnyaController@jabatanUpdate')->name('dashboard.pengelola.pustakalainnya.jabatan-update');
        Route::get('/jabatan/delete/{id}','PustakalainnyaController@jabatanDelete')->name('dashboard.pengelola.pustakalainnya.jabatan-delete');

        /* Jenis Pindah */
        Route::get('/jenis-pindah','PustakalainnyaController@jenisPindah')->name('dashboard.pengelola.pustakalainnya.jenis-pindah');
        Route::post('/jenis-pindah-store','PustakalainnyaController@jenisStore')->name('dashboard.pengelola.pustakalainnya.jenis-pindah-store');
        Route::post('/update-jenis-pindah/{id}','PustakalainnyaController@jenisUpdate')->name('dashboard.pengelola.pustakalainnya.jenis-pindah-update');
        Route::get('/jenis-pindah/delete/{id}','PustakalainnyaController@jenisDelete')->name('dashboard.pengelola.pustakalainnya.jenis-pindah-delete');

        /* Klarifikasi Pindah */
        Route::get('/klarifikasi-pindah','PustakalainnyaController@klarifikasi')->name('dashboard.pengelola.pustakalainnya.klarifikasi-pindah');
        Route::post('/klarifikasi-pindah-store','PustakalainnyaController@klarifikasiStore')->name('dashboard.pengelola.pustakalainnya.klarifikasi-pindah-store');
        Route::post('/update-klarifikasi-pindah/{id}','PustakalainnyaController@klarifikasiUpdate')->name('dashboard.pengelola.pustakalainnya.klarifikasi-pindah-update');
        Route::get('/klarifikasi-pindah/delete/{id}','PustakalainnyaController@klarifikasiDelete')->name('dashboard.pengelola.pustakalainnya.klarifikasi-pindah-delete');
            
        /* Keluarga */
        Route::get('/data-keluarga','KependudukanController@keluarga')->name('dashboard.pengelola.data-keluarga');
        Route::get('/keluarga-create','KependudukanController@keluargaCreate')->name('dashboard.pengelola.keluarga-create');
        Route::post('/keluarga-store','KependudukanController@keluargaStore')->name('dashboard.pengelola.keluarga-store');
        Route::get('/edit-keluarga/{id}','KependudukanController@keluargaEdit')->name('dashboard.pengelola.edit-keluarga');
        Route::post('/update-keluarga/{id}','KependudukanController@keluargaUpdate')->name('dashboard.pengelola.update-keluarga');
        Route::get('/keluarga/delete/{id}', 'KependudukanController@keluargaDelete')->name('dashboard.pengelola.keluarga-delete');
        Route::get('get-rw-list','KependudukanController@getRWList');
        Route::get('get-rt-list','KependudukanController@getRTList');
        
        /* Keluarga */
        Route::get('/pisah-keluarga','KependudukanController@pisahKeluarga')->name('dashboard.pengelola.pisah-keluarga');
        Route::post('/pisah-keluarga-store','KependudukanController@pisahStore')->name('dashboard.pengelola.pisah-keluarga-store');
        Route::get('/edit-pisah-keluarga/{id}','UserController@pisahEdit')->name('dashboard.pengelola.edit-pisah-keluarga');
        Route::post('/update-pisah-keluarga/{id}','KependudukanController@pisahUpdate')->name('dashboard.pengelola.pisah-keluarga-update');
        Route::get('/pisah-keluarga/delete/{id}', 'KependudukanController@pisahDelete')->name('dashboard.pengelola.pisah-keluarga-delete');
    
        /*Gizi Buruk*/
        Route::get('gizi-buruk','KesehatanController@Gizi')->name('dashboard.pengelola.kesehatan.gizi-buruk');
        Route::get('gizi-buruk-create','KesehatanController@giziCreate')->name('dashboard.pengelola.kesehatan.gizi-buruk-create');
        Route::post('get-gizi-buruk','KesehatanController@getGizi')->name('dashboard.pengelola.kesehatan.get-gizi-buruk');
        Route::post('gizi-buruk-store','KesehatanController@giziStore')->name('dashboard.pengelola.kesehatan.gizi-buruk-store');
        Route::post('/update-gizi-buruk/{id}','KesehatanController@giziUpdate')->name('dashboard.pengelola.kesehatan.gizi-buruk-update');
        Route::get('/gizi-buruk/delete/{id}', 'KesehatanController@giziDelete')->name('dashboard.pengelola.kesehatan.gizi-buruk-delete');

        /*Kondidi Kehamilan*/
        Route::get('kehamilan','KesehatanController@kehamilan')->name('dashboard.pengelola.kesehatan.kehamilan');
        Route::get('kehamilan-create','KesehatanController@kehamilanCreate')->name('dashboard.pengelola.kesehatan.kehamilan-create');
        Route::post('get-kehamilan','KesehatanController@getKehamilan')->name('dashboard.pengelola.kesehatan.get-kehamilan');
        Route::post('kehamilan-store','KesehatanController@kehamilanStore')->name('dashboard.pengelola.kesehatan.kehamilan-store');
        Route::post('/update-kehamilan/{id}','KesehatanController@kehamilanUpdate')->name('dashboard.pengelola.kesehatan.kehamilan-update');
        Route::get('/kehamilan/delete/{id}', 'KesehatanController@kehamilanDelete')->name('dashboard.pengelola.kesehatan.kehamilan-delete');
    
        /*Peristiwa Kelahiran*/
        Route::get('kelahiran','PeristiwaController@kelahiran')->name('dashboard.pengelola.peristiwa.kelahiran');
        Route::get('kelahiran-create','PeristiwaController@kelahiranCreate')->name('dashboard.pengelola.peristiwa.kelahiran-create');
        Route::post('get-kelahiran','PeristiwaController@getKelahiran')->name('dashboard.pengelola.peristiwa.get-kelahiran');
        Route::post('kelahiran-store','PeristiwaController@kelahiranStore')->name('dashboard.pengelola.peristiwa.kelahiran-store');
        Route::get('/edit-kelahiran/{id}','PeristiwaController@kelahiranEdit')->name('dashboard.pengelola.peristiwa.edit-kelahiran');
        Route::post('/update-kelahiran/{id}','PeristiwaController@kelahiranUpdate')->name('dashboard.pengelola.peristiwa.update-kelahiran');
        Route::get('/kelahiran/delete/{id}', 'PeristiwaController@kelahiranDelete')->name('dashboard.pengelola.peristiwa.kelahiran-delete');

        /*Peristiwa Kematian*/
        Route::get('kematian','PeristiwaController@kematian')->name('dashboard.pengelola.peristiwa.kematian');
        Route::get('kematian-create','PeristiwaController@kematianCreate')->name('dashboard.pengelola.peristiwa.kematian-create');
        Route::post('get-kematian','PeristiwaController@getKematian')->name('dashboard.pengelola.peristiwa.get-kematian');
        Route::post('kematian-store','PeristiwaController@kematianStore')->name('dashboard.pengelola.peristiwa.kematian-store');
        Route::get('/edit-kematian/{id}','PeristiwaController@kematianEdit')->name('dashboard.pengelola.peristiwa.edit-kematian');
        Route::post('/update-kematian/{id}','PeristiwaController@kematianUpdate')->name('dashboard.pengelola.peristiwa.kematian-update');
        Route::get('/kematian/delete/{id}', 'PeristiwaController@kematianDelete')->name('dashboard.pengelola.peristiwa.kematian-delete');

        /*Peristiwa Kematian*/
        Route::get('data-perangkat','PerangkatDesaController@perangkat')->name('dashboard.pengelola.perangkat.data-perangkat');
        Route::get('perangkat-create','PerangkatDesaController@perangkatCreate')->name('dashboard.pengelola.perangkat.perangkat-create');
        Route::post('get-perangkat','PerangkatDesaController@getPerangkat')->name('dashboard.pengelola.perangkat.get-perangkat');
        Route::post('perangkat-store','PerangkatDesaController@perangkatStore')->name('dashboard.pengelola.perangkat.perangkat-store');
        Route::get('/edit-perangkat/{id}','PerangkatDesaController@perangkatEdit')->name('dashboard.pengelola.perangkat.edit-perangkat');
        Route::post('/update-perangkat/{id}','PerangkatDesaController@perangkatUpdate')->name('dashboard.pengelola.perangkat.perangkat-update');
        Route::get('/perangkat/delete/{id}', 'PerangkatDesaController@perangkatDelete')->name('dashboard.pengelola.perangkat.perangkat-delete');

         /*Peristiwa Pindah Masuk*/
         Route::get('pindah-masuk','PeristiwaController@masuk')->name('dashboard.pengelola.peristiwa.pindah-masuk');
         Route::get('pindah-masuk-create','PeristiwaController@masukCreate')->name('dashboard.pengelola.peristiwa.pindah-masuk-create');
         Route::post('pindah-masuk-store','PeristiwaController@masukStore')->name('dashboard.pengelola.peristiwa.pindah-masuk-store');
         Route::post('/update-pindah-masuk/{id}','PeristiwaController@masukUpdate')->name('dashboard.pengelola.peristiwa.pindah-masuk-update');
         Route::get('/pindah-masuk/delete/{id}', 'PeristiwaController@masukDelete')->name('dashboard.pengelola.peristiwa.pindah-masuk-delete');
    
         /*Peristiwa Pindah keluar*/
         Route::get('pindah-keluar','PeristiwaController@keluar')->name('dashboard.pengelola.peristiwa.pindah-keluar');
         Route::get('pindah-keluar-create','PeristiwaController@keluarCreate')->name('dashboard.pengelola.peristiwa.pindah-keluar-create');
         Route::post('get-pindah-keluar','PeristiwaController@getKeluar')->name('dashboard.pengelola.peristiwa.get-pindah-keluar');
         Route::post('pindah-keluar-store','PeristiwaController@keluarStore')->name('dashboard.pengelola.peristiwa.pindah-keluar-store');
         Route::post('/update-pindah-keluar/{id}','PeristiwaController@keluarUpdate')->name('dashboard.pengelola.peristiwa.pindah-keluar-update');
         Route::get('/pindah-keluar/delete/{id}', 'PeristiwaController@keluarDelete')->name('dashboard.pengelola.peristiwa.pindah-keluar-delete');
        
    });

});