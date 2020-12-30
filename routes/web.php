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

Route::get('/', function () {
    return redirect()->route('index_ktp');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['user'])->group(function () {
    Route::get('/index')->name('beranda');
    Route::get('/ktp', 'KtpController@index')->name('index_ktp');
    Route::get('/ktp/show/{id}','KtpController@show')->name('show_ktp');
    Route::get('/ktp/tambah','KtpController@create')->name('tambah_ktp');
    Route::get('/ktp/kota/{id}','KtpController@kota')->name('kota');
    Route::post('/ktp/store','KtpController@store')->name('store_ktp');
    Route::get('/ktp/edit/{id}', 'KtpController@edit')->name('edit_ktp');
    Route::post('/ktp/update/{id}','KtpController@update')->name('update_ktp');
    Route::get('/ktp/hapus/{id}','KtpController@destroy')->name('destroy_ktp');
});
Route::middleware(['admin'])->group(function () {
Route::get('/admin', 'AdminController@index')->name('admin_index');
Route::get('/admin/cetak_nik_pdf', 'AdminController@cetak_nik');
Route::get('/admin/cetak_nama_pdf', 'AdminController@cetak_nama');
Route::get('/admin/cetak_gender_pdf', 'AdminController@cetak_gender');
});
