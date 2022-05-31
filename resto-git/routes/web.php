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
    return view('login');
});

Route::get('/pesananditerima', function () {
    return view('pesananditerima');
});

Route::get('/pembayaranselesai', function () {
    return view('pembayaranselesai');
});

Route::get('/konfirmasipesanan', function () {
    return view('konfirmasipesanan');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/menu', function () {
    return view('menu');
});

Route::get('/owner', function () {
    return view('owner');
});

Route::get('/editmeja', function () {
    return view('editmeja');
});

Route::get('/laporanbulanan', function () {
    return view('laporanbulanan');
});

Route::get('/tambahkaryawan', function () {
    return view('tambahkaryawan');
});

Route::get('/bayar', function () {
    return view('bayar');
});

Route::get('/editpesanan', function () {
    return view('editpesanan');
});

Route::get('/pesanan', function () {
    return view('pesanan');
});

Route::get('/hitunghari', function () {
    return view('hitunghari');
});

Route::get('/hitungbulan', function () {
    return view('hitungbulan');
});

// Route::get('/tambahmenu', function () {
//     return view('tambahmenu');
// });

//QUERY LAPORAN HARIAN
Route::get('/laporanharian/{hari}', 'App\Http\Controllers\restoController@send_laporanharian');

//QUERY LAPORAN BULANAN
Route::get('/laporanbulan/{bulan}', 'App\Http\Controllers\restoController@send_laporanbulanan');


//INPUT MENU BERDASARKAN MEJA
Route::get('/menu/{NO_MEJA}', 'App\Http\Controllers\restoController@send_menu');

//PAGE PILIH MEJA
Route::get('/pilihmeja', 'App\Http\Controllers\restoController@send_pilihMeja');

//PAGE TAMBAH MENU
Route::get('/tambahmenu', 'App\Http\Controllers\restoController@send_autoid');

//PAGE ATUR MENU
Route::get('/aturmenu', 'App\Http\Controllers\restoController@send_aturMenu');

//PAGE EDIT MENU BERDASARKAN APA YANG DI KLIK DI ATUR MENU
Route::get('/editmenu/{ID_MENU}', 'App\Http\Controllers\restoController@send_displayEditMenu');
Route::post('/updatemenu/{ID_MENU}', 'App\Http\Controllers\restoController@send_updatemenu');
Route::get('/hapusmenu/{ID_MENU}', 'App\Http\Controllers\restoController@send_hapusMenu');


//PAGE EDIT MEJA
Route::get('/editmeja', 'App\Http\Controllers\restoController@send_editMeja');
Route::post('/editmeja', 'App\Http\Controllers\restoController@send_insertmeja');

//HAPUS MEJA BERDASARKAN TOMBOL YANG DI KLIK
Route::get('/hapusmeja/{NO_MEJA}', 'App\Http\Controllers\restoController@send_hapusMeja');

//ini untuk edit karyawan
Route::get('/editkaryawan', 'App\Http\Controllers\restoController@send_semuaKaryawan');
//ini untuk hapus karyawan di page editkaryawan
Route::get('/hapuskaryawan/{ID_ADMIN}', 'App\Http\Controllers\restoController@send_hapusKaryawan');

// ini untuk tambah karyawan
Route::post('/tambahkaryawan', 'App\Http\Controllers\restoController@send_insertadmin');

//BUAT LOGIN
Route::get('/login', 'App\Http\Controllers\restocontroller@loginIndex');
Route::post('/login', 'App\Http\Controllers\restocontroller@send_login');
