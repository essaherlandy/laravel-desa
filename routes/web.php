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

Route::namespace('Admin')->group(function(){
    Route::middleware('checkRole:admin')->prefix('admin/dashboard')->group(function(){
        Route::get('/', function(){
            return view('dashboard.admin.index');
        });

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
        /* Pengelolaan Data Wilayah End */
    });

});