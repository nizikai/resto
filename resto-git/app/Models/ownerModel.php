<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\restocontroller;

class ownerModel extends Model
{
    //buat query select buat edit meja
    function get_editMeja() {
        $querysemuameja = "SELECT NO_MEJA FROM SAD_NICO.meja WHERE DEL_STATUS = '0';";
        $executequerysemuameja= DB::select($querysemuameja);
        return $executequerysemuameja;
    }

    //buat insert meja baru di page edit meja
    function post_insertMeja($tboxMejaBaru) {
        $cmd = "INSERT INTO meja(`NO_MEJA`, `DEL_STATUS`) VALUES (:mejaBaru,'0');";

        $result =DB::insert($cmd, $tboxMejaBaru);
        return $result;
    }

    //buat hapus meja di page edit meja
    function get_hapusMeja($arrayNoMeja) {
        $cmd = "UPDATE meja SET DEL_STATUS = '1' WHERE NO_MEJA = :noMeja;";
        $result =DB::update($cmd, $arrayNoMeja);
        return $result;
    }

    //buat select semua karyawan di page edit karyawan
    function get_semuaKaryawan() {
        $querySemuaKaryawan = "SELECT ID_ADMIN, NAMA, `PASSWORD`, EMAIL FROM admin_karyawan WHERE STAFF = 1 AND DEL_STATUS = 0 ORDER BY NAMA ASC;";
        $executequerySemuaKaryawan= DB::select($querySemuaKaryawan);
        return $executequerySemuaKaryawan;
    }

    //buat hapus karyawan
    function get_hapusKaryawan($arrayHapusKaryawan) {
        $cmd = "UPDATE admin_karyawan SET DEL_STATUS = '1' WHERE ID_ADMIN = :idAdmin;";
        $result =DB::update($cmd, $arrayHapusKaryawan);
        return $result;
    }

    //buat query select buat atur menu
    function get_semuaMenu() {
        $querySemuaMenu = "SELECT ID_MENU, NAMA_MENU, HARGA FROM data_menu WHERE DEL_STATUS = 0 ORDER BY NAMA_MENU ASC;";
        $executequerySemuaMenu= DB::select($querySemuaMenu);
        return $executequerySemuaMenu;
    }

    //buat query display detail menu di page edit menu
    function get_displayEditMenu($arrayIdMenu) {
        $queryDisplayEditMenu = "SELECT ID_MENU, NAMA_MENU, HARGA, f_drinkidgen() as `Drink`, f_foodidgen() as `Food`, f_snackidgen() as `Snack` FROM data_menu WHERE ID_MENU = :idmenu;";
        $executequeryDisplayEditMenu= DB::select($queryDisplayEditMenu, $arrayIdMenu);
        return $executequeryDisplayEditMenu;
    }

    // buat Query Update di page Edit menu
    function post_update($tboxupdatemenu) {
        $cmd = "UPDATE data_menu SET NAMA_MENU = :insertmenu, HARGA = :insertharga WHERE ID_MENU = :insertidmenu";
        // $dataIdUpdate = [
        //     'insertmenu' => $tboxupdatemenu['insertmenu'],
        //     'insertharga' => $tboxupdatemenu['insertharga'],
        //     'insertidmenu' => $tboxupdatemenu['insertidmenu']
        // ]; //declare biar bisa dipake di query
        $result = DB::update($cmd, $tboxupdatemenu);
        // dd($result);
        return $result;
    }



    // ini login owner
    public function cekLoginowner($tboxLogin)
    {
        $queryCekLoginK = "SELECT count(*) is_exist ".
                         "FROM SAD_NICO.admin_karyawan ".
                         "WHERE EMAIL = :loginEmail AND PASSWORD = :loginPassword AND OWNER = '1' ;";
        $executeQueryCekLoginK = DB::select($queryCekLoginK, $tboxLogin);
        // dd($executeQueryCekLogin);

        if($executeQueryCekLoginK[0]->is_exist == 1){
            return true;
        }
        return false;

        if(isset($executeQueryCekLoginK) && count($executeQueryCekLoginK) > 0){
            return $executeQueryCekLoginK;
        }
        return null;
    }

    // ini tambah admin
    function post_insert($tboxinsertadmin) {

        $queryinsert = "INSERT INTO admin_karyawan( `NAMA`, `PASSWORD`, `OWNER`, `EMAIL`, `STAFF`, `DEL_STATUS`) VALUES (:insertNama, :insertPassword,'0', :insertEmail, '1', '0')";
        // $dataIdUpdate = [
        //     'insertEmail' => $tboxinsertadmin['insertEmail'],
        //     'insertPassword' => $tboxinsertadmin['insertPassword']
        // ]; //declare biar bisa dipake di query
        $executequeryinsert = DB::insert($queryinsert, $tboxinsertadmin);
        // dd($executequeryupdate);
        return $executequeryinsert;
    }
}


