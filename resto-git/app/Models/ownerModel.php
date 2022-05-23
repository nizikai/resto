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
        $querysemuameja = "SELECT NO_MEJA FROM SAD_NICO.meja;";
        $executequerysemuameja= DB::select($querysemuameja);
        return $executequerysemuameja;
    }

    //buat insert meja baru di page edit meja
    function post_insertMeja($tboxMejaBaru) {
        //TINGGAL GANTI QUERY INSERT MEJA BARU. NICO.
        $cmd = "INSERT INTO customer( `ID_MEMBERSHIP`, `NAMA_CUSTOMER`, `ALAMAT`, `PHONE`, `EMAIL`, `PASSWORD`, `DELETE_CUSTOMER`) VALUES ('REGU', :nama,'-', '-', :email, :password_customer,'0')";

        $result =DB::insert($cmd, $tboxMejaBaru);
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

        $queryupdate = "INSERT INTO admin_karyawan( `NAMA`, `PASSWORD`, `OWNER`, `EMAIL`, `STAFF`, `DEL_STATUS`) VALUES (':insertEmail', '','0', 'TBOXEMAIL', '1', '0')";
        // $dataIdUpdate = [
        //     'insertEmail' => $tboxinsertadmin['insertEmail'],
        //     'insertPassword' => $tboxinsertadmin['insertPassword']
        // ]; //declare biar bisa dipake di query
        $executequeryupdate = DB::insert($queryupdate, $tboxinsertadmin);
        // dd($executequeryupdate);
        return $executequeryupdate;
    }
}


