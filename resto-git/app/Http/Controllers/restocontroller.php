<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\restoModel;
use Illuminate\Support\Facades\Main;
use Exception;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Session;
// use illuminate\contract\Mailer;
use Illuminate\Support\Facades\Mail;
use App\Http\Controller\DB;
use App\Models\ownerModel;

class restocontroller extends Controller
{
    //
    function __construct()
    {
        $this->restoModel = new restoModel();
    }


    //INI UNTUK REDIRECT
    public function session_login(Request $req){
        $login = Session::get('login');
        if($login != '')
        {
           Session::put('login', $login);
           return view('pages/home');
        }
        else{
            return redirect('/login');
        }
    }

    //INI UNTUK LOGIN
    public function send_login(Request $request)
    {
        session_start();

        $loginMail = $request->input('loginEmail');
        $loginPass = $request->input('loginPassword');

        $tboxLogin = [
            'loginEmail' => $loginMail,
            'loginPassword' => $loginPass
        ];

        $sambungKeModel = new restoModel;
        $sambungowner = new ownerModel;
        $loginCountCheck = $sambungKeModel -> cekLogin($tboxLogin);

        if($loginCountCheck)
        {
            // $Id = $sambungKeModel -> get_id($loginMail); //nyambung ke model get id membawa var $loginMail

            //buat session yang isinya id customer yg login
            Session::put('staff', $loginMail);

            Session::flash('success', 'Anda berhasil login');
            // $cookieID = $request->input('loginEmail');
            // $cookiePass = $request->input('loginPassword');
            // setcookie($cookieID,$cookiePass);

            return redirect('/pesanan');
        }
        else
        {
            //buat logika if buat login id dan pass karyawan
            $loginCountCheckKaryawan = $sambungowner -> cekLoginowner($tboxLogin);
            if($loginCountCheckKaryawan)
            {
                Session::put('owner', $loginMail);

                return redirect('/owner');
            }

            Session::flash('loginError', 'Email atau password salah.');
            return redirect('/login');
        }
    }

    public function loginIndex()
    {
        return view('/login', [
            'title' => 'login',
            'active' => 'login'
        ]);
    }

    //INI UNTUK AMBIL MEJA
    public function send_editmeja()
    {
        $owner = new ownerModel;
        $editMeja = $owner -> get_editMeja();
        // dd($editMeja);
        return view('editmeja', ['editMeja' => $editMeja]);
    }

    //INI UNTUK INSERT MEJA DI PAGE EDITMEJA
    public function send_insertmeja(request $request)
    {
        $mejaBaru = $request->input('NewTable');
        $owner = new ownerModel;

        $tboxMejaBaru = [
            'mejaBaru'=>$mejaBaru
        ];

        $modelInsertMeja = $owner->post_insertMeja($tboxMejaBaru);

        if($modelInsertMeja==1){

            Session::flash('success', 'Meja baru berhasil ditambahkan');
            return redirect('/editmeja');

            Session::flash('error', 'Mohon maaf terjadi kesalahan. Mohon coba lagi.');
        }
    }

    //INI UNTUK DELETE MEJA DI PAGE EDITMEJA
    public function send_hapusMeja($NO_MEJA){
        $owner = new ownerModel;

        $arrayNoMeja = [
            'noMeja'=>$NO_MEJA
        ];
        $executeHapusMeja = $owner->get_hapusMeja($arrayNoMeja);

        // return view('/editmeja', ['executeHapusMeja' => $executeHapusMeja]);
        return redirect('/editmeja');
    }

    //INI UNTUK DISPLAY SEMUA MEJA DI PAGE PILIH MEJA
    public function send_pilihMeja(){

        $owner = new ownerModel;
        $pilihMeja = $owner -> get_editMeja();
        return view('pilihmeja', ['pilihMeja' => $pilihMeja]);
    }


    // ini untuk insert admin baru
    public function send_insertadmin(request $request)
    {
        $insertnama = $request->input('Nama');
        $insertemail = $request->input('Email');
        $insertpassword = $request->input('Password');

        $sambungpostinsert = new ownerModel();

        $tboxinsertadmin = [
            'insertNama'=>$insertnama,
            'insertEmail'=>$insertemail,
            'insertPassword' =>$insertpassword
        ];
        // $loggedInIdUpdate = Session::get('id');

        $checkinsert = $sambungpostinsert->post_insert($tboxinsertadmin);

        if($checkinsert==1){


            Session::flash('success', 'Anda berhasil menambahkan admin baru');
            return redirect('/tambahkaryawan');

            Session::flash('loginError', 'Mohon lengkapi Textbox yang kosong.');

        }
        // echo 'gagal';
        // return redirect('/updateprofile');
    }

    //update admin_karyawan

}
