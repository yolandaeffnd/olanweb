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
    return view('auth.login');
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
Route::get('/pembayaran/index/pdf/{id_pembayaran}', 'PembayaranController@bukti_pdf');
Route::resource('penempatan2','PenempatanController');
Route::resource('halaqahsantri','HalaqahSantriController');
Route::resource('pertemuan','PertemuanController');
Route::resource('pembelajaran','PembelajaranController');
Route::resource('pimpinan','PimpinanController');
Route::get('/beranda','PimpinanController@beranda')->name('beranda');
Route::get('/blok','PimpinanController@blok');
Route::resource('agenda','AgendaController');
Route::resource('user','UserController');
Route::get('/sandi','UserController@updatePassword')->name('sandi');
Route::put('/sandiPassword','UserController@sandiPassword');
Route::get('/laporan/registrasi', 'LaporanController@registrasi');
Route::get('/laporan/registrasi_view', 'LaporanController@registrasi_view');
Route::get('/laporan/registrasi_view/pdf', 'LaporanController@registrasi_pdf');
Route::get('/laporan/santri_view', 'LaporanController@santri_view');
Route::get('/laporan/santri_view/pdf', 'LaporanController@santri_pdf');
Route::get('/laporan/pembayaran_view', 'LaporanController@pembayaran_view');
Route::get('/laporan/pembayaran_view/pdf', 'LaporanController@pembayaran_pdf');
Route::get('/laporan/halaqahsantri_view', 'LaporanController@halaqahsantri_view');
Route::get('/laporan/halaqahsantri_view/pdf', 'LaporanController@halaqahsantri_pdf');
Route::get('/laporan/dftunggu_view', 'LaporanController@dftunggu_view');
Route::get('/laporan/dftunggu_view/pdf', 'LaporanController@dftunggu_pdf');
Route::get('/laporan/pembelajaran_view', 'LaporanController@pembelajaran_view');
Route::get('/laporan/pembelajaran_view/pdf', 'LaporanController@pembelajaran_pdf');
