<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('santri','SantriController');
Route::resource('guru','GuruController');
Route::resource('tempat','TempatController');
Route::resource('periode','PeriodeController');
Route::resource('periode2','Periode2Controller');
Route::resource('hari','HariController');
Route::resource('tipe','TipeController');
Route::resource('shift','ShiftController');
Route::resource('jadwal','JadwalController');
Route::resource('hari','HariController');
Route::resource('registrasi','RegistrasiController');
Route::resource('halaqah','HalaqahController');
Route::resource('beasiswa','BeasiswaController');
Route::resource('pembayaran','PembayaranController');
Route::post('/get_fields/{id_santri}', 'PembayaranController@getAllFields');
Route::resource('penempatan2','PenempatanController');
Route::resource('halaqahsantri','HalaqahSantriController');
Route::resource('pertemuan','PertemuanController');
Route::resource('pembelajaran','PembelajaranController');
Route::resource('pimpinan','PimpinanController');
Route::resource('agenda','AgendaController');
Route::get('/laporan/registrasi', 'LaporanController@registrasi');
