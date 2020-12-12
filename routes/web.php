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

Route::namespace('Admin')->group(function(){
    Route::middleware('checkRole:admin')->prefix('admin/dashboard')->group(function(){
        Route::get('/', function(){
            return view('dashboard.admin.index');
        });
        /* Pengguna */
        Route::get('/pengguna','UserController@pengguna')->name('dashboard.admin.pengguna');
        Route::post('/pengguna-store','UserController@store')->name('dashboard.admin.pengguna-store');
        Route::post('/update-pengguna/{id}','UserController@update')->name('dashboard.admin.update');
        Route::get('/pengguna/delete/{id}', 'UserController@delete')->name('dashboard.admin.delete');

        /* Pengelolaan Data Web */
        Route::get('/logo','WebController@logo')->name('dashboard.admin.logo');
        Route::post('/update-logo/{id}','WebController@logoUpdate')->name('dashboard.admin.logo-update');
        Route::get('/slider-beranda','WebController@sliderBeranda')->name('dashboard.admin.slider-beranda');
        Route::post('/slider-beranda-store','WebController@sliderStore')->name('dashboard.admin.slider-beranda-store');
        Route::post('/update-slider-beranda/{id}','WebController@sliderUpdate')->name('dashboard.admin.slider-beranda-update');
        Route::get('/slider-beranda/delete/{id}', 'WebController@sliderDelete')->name('dashboard.admin.slider-beranda-delete');
        Route::get('/berita','BeritaController@index')->name('dashboard.admin.berita');
        Route::post('/berita-store','BeritaController@store')->name('dashboard.admin.berita-store');
        Route::post('/update-berita/{id}','BeritaController@update')->name('dashboard.admin.berita-update');
        Route::get('/berita/delete/{id}', 'BeritaController@delete')->name('dashboard.admin.berita-delete');
        Route::get('/kegiatan','KegiatanController@index')->name('dashboard.admin.kegiatan');
        Route::post('/kegiatan-store','KegiatanController@store')->name('dashboard.admin.kegiatan-store');
        Route::get('/edit-kegiatan/{id}','KegiatanController@edit')->name('dashboard.admin.edit-kegiatan');
        Route::post('/update-kegiatan/{id}','KegiatanController@update')->name('dashboard.admin.kegiatan-update');
        Route::get('/kegiatan/delete/{id}', 'KegiatanController@delete')->name('dashboard.admin.kegiatan-delete');
    });
});