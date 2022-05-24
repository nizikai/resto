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

Route::get('/editkaryawan', function () {
    return view('editkaryawan');
});

Route::get('/editmeja', function () {
    return view('editmeja');
});

Route::get('/editkaryawan', function () {
    return view('editkaryawan');
});

Route::get('/editkaryawan', function () {
    return view('editkaryawan');
});

Route::get('/laporanbulanan', function () {
    return view('laporanbulanan');
});

Route::get('/laporanharian', function () {
    return view('laporanharian');
});

Route::get('/tambahkaryawan', function () {
    return view('tambahkaryawan');
});

// Route::get('/editmeja', function () {
//     return view('editmeja');
// });

Route::get('/bayar', function () {
    return view('bayar');
});

Route::get('/editpesanan', function () {
    return view('editpesanan');
});

Route::get('/pesanan', function () {
    return view('pesanan');
});

Route::get('/editmenu', function () {
    return view('editmenu');
});

Route::get('/tambahmenu', function () {
    return view('tambahmenu');
});

Route::get('/aturmenu', function () {
    return view('aturmenu');
});


//PAGE PILIH MEJA
Route::get('/pilihmeja', 'App\Http\Controllers\restoController@send_pilihMeja');

//PAGE EDIT MEJA
Route::get('/editmeja', 'App\Http\Controllers\restoController@send_editMeja');
Route::post('/editmeja', 'App\Http\Controllers\restoController@send_insertmeja');

//HAPUS MEJA BERDASARKAN TOMBOL YANG DI KLIK
Route::get('/hapusmeja/{NO_MEJA}', 'App\Http\Controllers\restoController@send_hapusMeja');

// ini untuk tambah karyawan
Route::post('/tambahkaryawan', 'App\Http\Controllers\restoController@send_insertadmin');

//BUAT LOGIN
Route::get('/login', 'App\Http\Controllers\restocontroller@loginIndex');
Route::post('/login', 'App\Http\Controllers\restocontroller@send_login');
