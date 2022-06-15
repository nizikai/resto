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

Route::get('/nota', function () {
    return view('nota');
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


Route::get('/edit', function () {
    return view('editpesanan');
});



Route::get('/hitunghari', function () {
    return view('hitunghari');
});

Route::get('/hitungbulan', function () {
    return view('hitungbulan');
});

Route::get('/pesanandihapus', function () {
    return view('pesanandihapus');
});

Route::get('/getmeja', function () {
    return view('getmeja');
});


// Route::get('/tambahmenu', function () {
//     return view('tambahmenu');
// });

//QUERY LAPORAN HARIAN
Route::get('/laporanharian/{hari}', 'App\Http\Controllers\restoController@send_laporanharian');

//QUERY LAPORAN BULANAN
Route::get('/laporanbulan/{bulan}', 'App\Http\Controllers\restoController@send_laporanbulanan');


//INPUT MENU BERDASARKAN MEJA
Route::get('/menu/{NO_MEJA}', 'App\Http\Controllers\restoController@send_mejaMenu');

//INPUT MENU BERDASARKAN MEJA
Route::get('/getmeja/{NO_MEJA}', 'App\Http\Controllers\restoController@send_getMejaMenu');

//SEARCH MENU DI PAGE MENU
// Route::get('/menu/{ID_MEJA}/', 'App\Http\Controllers\restoController@send_searchMenu');

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
Route::post('/insertmenu', 'App\Http\Controllers\restoController@send_insertmenu');


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

//BUAT PAGE PESANAN
Route::get('/pesanan', 'App\Http\Controllers\restocontroller@send_semuaPesanan');

//BUAT EDIT PESANAN
Route::get('/edit/{ID_MEJA}', 'App\Http\Controllers\restocontroller@send_displayEdit');

//BUAT BAYAR
Route::get('/bayar/{ID_MEJA}', 'App\Http\Controllers\restocontroller@send_displayBayar');

//UPDATE BAYAR > TRANSAKSI SELESAI
Route::post('/paymentprocess/update/table/go/{ID_TRANSAKSI}', 'App\Http\Controllers\restocontroller@send_updatebayar');

//UNTUK UPDATE PESANAN YANG DI DELETE DI PAGE EDIT PESANAN
Route::get('/hapuspesanan/{NO_MEJA2}/{ID_MENU2}', 'App\Http\Controllers\restocontroller@send_updateHapusPesanan');

// Route::get('/konfirmasi/{ID_MEJA}', 'App\Http\Controllers\restocontroller@send_displayBayar');

Route::get('/konfirmasipesanan/{ID_MEJA}', 'App\Http\Controllers\restocontroller@send_tampilkanpesanan');

// untuk hapus transaksi
Route::post('/hapustransaksi/{ID_MEJA}', 'App\Http\Controllers\restoController@send_hapustransaksi');

// masukkan pesanan
Route::post('/insertpesanan/{ID_MEJA}', 'App\Http\Controllers\restoController@send_insertdetailtrans');

// update transaksi berdasarkan apa yang baru saja di input oleh user
Route::post('/konfirmasitransaksi/{ID_MEJA}', 'App\Http\Controllers\restoController@send_konfirmasitransaksi');

//untuk print nota
Route::get('/print/nota', 'App\Http\Controllers\restocontroller@send_printNota');


