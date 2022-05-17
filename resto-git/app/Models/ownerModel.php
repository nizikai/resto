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
    }

    // ini login owner
    public function cekLoginowner($tboxLogin)
    {
        $queryCekLoginK = "SELECT count(*) is_exist ".
                         "FROM laundry_service.karyawan ".
                         "WHERE ID_KARYAWAN = :loginEmail AND PASSWORD = :loginPassword ;";
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
}


