<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\restocontroller;

class restoModel extends Model
{
    //login staff
    public function cekLogin($tboxLogin){
        $queryCekLogin = "SELECT count(*) is_exist ".
                        "FROM SAD_NICO.admin_karyawan ".
                        "WHERE EMAIL = :loginEmail AND PASSWORD = :loginPassword AND STAFF = '1' ;";
        $executeQueryCekLogin = DB::select($queryCekLogin, $tboxLogin);
        // dd($executeQueryCekLogin);

        if($executeQueryCekLogin[0]->is_exist == 1){
            return true;
        }
        return false;

        if(isset($executeQueryCekLogin) && count($executeQueryCekLogin) > 0){
            return $executeQueryCekLogin;
        }
        return null;
    }

    function get_semuaPesanan() {
        $querySemuaPesanan = "SELECT t.ID_TRANSAKSI as `ID_TRANSAKSI`, m.NO_MEJA as `NO_MEJA`, t.TOTAL_HARGA as `TOTAL_HARGA` FROM transaksi t, meja m WHERE m.ID_MEJA = t.ID_MEJA AND t.STATUS_TRANSAKSI=0 ORDER BY m.NO_MEJA ASC;";
        $executequerySemuaPesanan= DB::select($querySemuaPesanan);
        return $executequerySemuaPesanan;
    }

    //NICO: ganti query ini
    //display semua menu ongoing di page edit pesanan
    function get_displayEdit($NO_MEJA) {
        $queryDisplayEdit = "sldkfjlsdkjf;";
        $executequeryDisplayEdit= DB::select($queryDisplayEdit, $NO_MEJA);
        return $executequeryDisplayEdit;
    }

    //NICO: lanjut bayar





}


