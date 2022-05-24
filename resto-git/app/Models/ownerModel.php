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


