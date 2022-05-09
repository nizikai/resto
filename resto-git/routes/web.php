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

Route::get('/login', function () {
    return view('login');
});

Route::get('/admin', function () {
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

Route::get('/editmeja', function () {
    return view('editmeja');
});

Route::get('/bayar', function () {
    return view('bayar');
});
