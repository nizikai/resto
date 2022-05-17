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
        $sambungowner = new ownerModel();
        $loginCountCheck = $sambungKeModel -> cekLogin($tboxLogin);

        if($loginCountCheck)
        {
            $Id = $sambungKeModel -> get_id($loginMail); //nyambung ke model get id membawa var $loginMail

            //buat session yang isinya id customer yg login
            Session::put('login', $loginMail);

            Session::flash('success', 'Anda berhasil login');
            // $cookieID = $request->input('loginEmail');
            // $cookiePass = $request->input('loginPassword');
            // setcookie($cookieID,$cookiePass);

            return redirect('/');
        }
        else
        {
            //buat logika if buat login id dan pass karyawan
            $loginCountCheckKaryawan = $sambungowner -> cekLoginowner($tboxLogin);
            if($loginCountCheckKaryawan)
            {
                Session::put('login', $loginMail);

                return redirect('/');
            }

            Session::flash('loginError', 'Email atau password salah.');
            return redirect('/login');
        }
    }

    public function loginIndex()
    {
        return view('pages/login', [
            'title' => 'login',
            'active' => 'login'

        ]);
    }

    //INI UNTUK AMBIL MEJA
    public function send_editmeja()
    {
        $owner = new ownerModel;
        $editMeja = $owner -> get_editMeja();
        return view('editmeja', ['editMeja' => $editMeja]);
    }

}
