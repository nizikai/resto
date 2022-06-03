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

    //INI UNTUK DISPLAY SEMUA KARYAWAN
    public function send_semuaKaryawan()
    {
        $owner = new ownerModel;
        $semuaKaryawan = $owner -> get_semuaKaryawan();
        // dd($editMeja);
        return view('editkaryawan', ['semuaKaryawan' => $semuaKaryawan]);
    }

    //INI UNTUK HAPUS SEMUA KARYAWAN
    public function send_hapusKaryawan($ID_ADMIN)
    {
        $arrayHapusKaryawan = [
            'idAdmin'=>$ID_ADMIN
        ];

        $owner = new ownerModel;
        $hapusKaryawan = $owner -> get_hapusKaryawan($arrayHapusKaryawan);
        // dd($editMeja);
        return redirect('editkaryawan');
    }

    //ngedisplay semua menu di aturmenu
    public function send_aturMenu()
    {
        $owner = new ownerModel;
        $aturMenu = $owner -> get_semuaMenu();
        // dd($editMeja);
        return view('aturmenu', ['aturMenu' => $aturMenu]);
    }

    //mengambil id menu buat menu baru
    public function send_autoId()
    {
        $owner = new ownerModel;
        $idbaru = $owner -> get_autoId();
        // dd($editMeja);
        return view('tambahmenu', ['idbaru' => $idbaru]);
    }

    //display detail menu berdasarkan apa yang di klik di atur menu
    public function send_displayEditMenu($ID_MENU){
        $owner = new ownerModel;

        $arrayIdMenu = [
            'idmenu'=>$ID_MENU
        ];
        $executeDisplayEditMenu = $owner->get_displayEditMenu($arrayIdMenu);

        return view('editmenu', ['executeDisplayEditMenu' => $executeDisplayEditMenu]);

    }

    // untuk update menu di page edit menu
    public function send_updatemenu(request $request)
    {
        $insertnama = $request->input('menubaru');
        $insertharga = $request->input('hargabaru');
        // $insertid = $request->input('idmenu'); // id bawaan
        $insertvalue = $request->input('radio');

        $sambungpostupdate = new ownerModel();

        $tboxupdatemenu = [
            'insertmenu'=>$insertnama,
            'insertharga'=>$insertharga,
            // 'insertidmenu'=>$insertid,
            'insertvalue'=>$insertvalue
        ];

        // dd($tboxupdatemenu);

        // $arrayIdMenu = [
        //     'idmenu'=>$ID_MENU
        // ];
        // $loggedInIdUpdate = Session::get('id');

        $checkupdate = $sambungpostupdate->post_update($tboxupdatemenu);
        return redirect('/aturmenu');

    }

    //ini untuk hapus menu
    public function send_hapusMenu(request $request, $ID_MENU){
        // $insertid = $request->input('idmenu');
        $owner = new ownerModel;

        // $tboxhapusmenu = [
        //     'insertidmenu'=>$insertid
        // ];
        $executeHapusMenu = $owner->get_hapusMenu((array)$ID_MENU);

        // return view('/editmeja', ['executeHapusMeja' => $executeHapusMeja]);
        return redirect('/aturmenu');
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
            return redirect('/editkaryawan');

            Session::flash('loginError', 'Mohon lengkapi Textbox yang kosong.');

        }
        // echo 'gagal';
        // return redirect('/updateprofile');
    }
    //menu cart
    public function send_insertcart(request $request)
    {
        $insertnamamenu = $request->input('NamaMenu');
        $insertjumlah = $request->input('Jumlah');
        $insertcatatan = $request->input('Catatan');

        // $sambungpostinsert = new ownerModel();

        $tboxinsertcart = [
            'NamaMenu'=>$insertnamamenu,
            'Jumlah'=>$insertjumlah,
            'Catatan' =>$insertcatatan
        ];

        // public function checkout($sku){
        //     $email=Session::get('login');s

            // $bid ="select fGENBeliID() as `bid`";
            // $beli_id = DB::select($bid);

            // $rid ="select ID_TRANSAKSI from reseller where ID_MEJA='".$meja."';";
            // $reseller_id = DB::select($rid);

        //     $tanggal = date("Y-m-d");


    }

    // tambah menu
    public function send_insertmenu(request $request)
    {
        $insertmenubaru = $request->input('menubaru');
        $inserthargabaru = $request->input('hargabaru');
        $insertvaluemenu = $request->input('radiomenubaru');

        $sambunginsertmenu = new ownerModel();

        $tboxinsertmenu = [
            'insertNamamenu'=>$insertmenubaru,
            'insertharga'=>$inserthargabaru,
            'insertvaluemenu'=>$insertvaluemenu

        ];

        $checkinsertmenu = $sambunginsertmenu->post_insertmenu($tboxinsertmenu);

        if($checkinsertmenu==1){


            Session::flash('success', 'Anda berhasil menambahkan menu baru');
            return redirect('/aturmenu');

            Session::flash('loginError', 'Mohon lengkapi Textbox yang kosong.');

        }

    }

    //buka page laporan harian dari hitung hari
    public function send_laporanharian($hari)
    {
        $owner = new ownerModel;
        $lapHarian = $owner -> get_laporanharian((array)$hari);
        $pemasukanHarian = $owner -> get_pemasukanharian((array)$hari);

        // return view('laporanharian', ['lapHarian' => $lapHarian]);
        return view('laporanharian', compact(['lapHarian', 'pemasukanHarian']));

    }

    //Buka page laporan bulanan
    public function send_laporanbulanan($bulan)
    {
        $owner = new ownerModel;
        $lapBulanan = $owner -> get_laporanbulanan((array)$bulan);
        $pemasukanBulanan = $owner -> get_pemasukanbulanan((array)$bulan);

        return view('laporanbulanan', compact(['lapBulanan', 'pemasukanBulanan']));
    }

    public function send_semuaPesanan()
    {
        $resto = new restoModel;
        $pesananOngoing = $resto -> get_semuaPesanan();

        return view('pesanan', ['pesananOngoing' => $pesananOngoing]);

        // $pemasukanBulanan = $owner -> get_pemasukanbulanan((array)$bulan);
        // return view('laporanbulanan', compact(['lapBulanan', 'pemasukanBulanan']));
    }

    //display semua menu di page edit pesanan
    public function send_displayEdit($NO_MEJA)
    {
        $resto = new restoModel;
        $displayEdit = $resto -> get_display((array)$NO_MEJA);
        return view('edit', ['displayEdit' => $displayEdit]);

        // $pemasukanBulanan = $owner -> get_pemasukanbulanan((array)$bulan);
        // return view('laporanbulanan', compact(['lapBulanan', 'pemasukanBulanan']));
    }

    //display semua menu di page bayar
    public function send_displayBayar($NO_MEJA)
    {
        $resto = new restoModel;
        $displayBayar = $resto -> get_display((array)$NO_MEJA);
        return view('bayar', ['displayBayar' => $displayBayar]);
    }

    //display semua menu di page konfirmasi pesanan
    public function send_displayKonfirmasi($NO_MEJA)
    {
        $resto = new restoModel;
        $displayKonfirmasi = $resto -> get_display((array)$NO_MEJA);
        return view('pesananditerima', ['displayKonfirmasi' => $displayKonfirmasi]);
    }












}
