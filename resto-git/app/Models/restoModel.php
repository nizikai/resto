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

    //semua pesanan yang sedang berlangsung
    function get_semuaPesanan() {
        $querySemuaPesanan = "SELECT t.ID_TRANSAKSI as `ID_TRANSAKSI`, m.NO_MEJA as `NO_MEJA`, t.TOTAL_HARGA as `TOTAL_HARGA` FROM transaksi t, meja m WHERE m.ID_MEJA = t.ID_MEJA AND t.STATUS_TRANSAKSI=0 ORDER BY m.NO_MEJA ASC;";
        $executequerySemuaPesanan= DB::select($querySemuaPesanan);
        return $executequerySemuaPesanan;
    }

    //display semua menu yang sudah di pesan per meja dengan detailnya
    function get_display($NO_MEJA) {
        $queryDisplay = "SELECT dm.NAMA_MENU, dt.ID_MENU, SUM(dt.JUMLAH) as `TOTAL_JUMLAH`, (sum(dt.jumlah) * dm.HARGA) as `TOTAL_HARGA_MENU` FROM meja m, data_menu dm, detail_transaksi dt, transaksi t WHERE m.ID_MEJA = t.ID_MEJA AND dm.ID_MENU = dt.ID_MENU AND t.ID_TRANSAKSI = dt.ID_TRANSAKSI AND t.STATUS_TRANSAKSI = 0 AND m.NO_MEJA = :NO_MEJA AND dt.DEL_STATUS = 0 GROUP BY dt.ID_MENU;";
        $executequeryDisplay = DB::select($queryDisplay, $NO_MEJA);
        return $executequeryDisplay;
    }

    //berhubungan dengan get_display, menampilkan total harga per meja
    function get_displayExt($NO_MEJA) {
        $queryDisplayExt = "SELECT t.ID_TRANSAKSI, t.TANGGAL, m.NO_MEJA, t.TOTAL_HARGA FROM  meja m, transaksi t WHERE t.ID_MEJA = m.ID_MEJA AND t.STATUS_TRANSAKSI = 0 AND m.NO_MEJA = :NO_MEJA;";
        $executequeryDisplayExt = DB::select($queryDisplayExt, $NO_MEJA);
        return $executequeryDisplayExt;
    }

    // query update status transaksi
    function get_updatebayar($ID_TRANSAKSI) {
        $queryupdatebayar = "UPDATE transaksi SET STATUS_TRANSAKSI = '1' WHERE ID_TRANSAKSI = :ID_TRANSAKSI AND STATUS_TRANSAKSI = '0'";
        $executequeryupdatebayar = DB::select($queryupdatebayar, $ID_TRANSAKSI);
        return $executequeryupdatebayar;
    }

    //update menu yang di cancel jadi del = 1
    function get_updateHapusPesanan($ID_TRANSAKSI2, $ID_MENU2) {
        // dd($ID_TRANSAKSI2, $ID_MENU2);
        $dataUpdateHapusMenu = [
            'HAPUS_ID_TRANSAKSI'  => $ID_TRANSAKSI2,
            'HAPUS_ID_MENU'  => $ID_MENU2
        ];
        // dd($dataUpdateHapusMenu);


        $queryupdateHapusPesanan = "UPDATE detail_transaksi SET DEL_STATUS = 1 WHERE ID_TRANSAKSI = :HAPUS_ID_TRANSAKSI AND ID_MENU = :HAPUS_ID_MENU";
        // dd($queryupdateHapusPesanan);
        $executequeryupdateHapusPesanan = DB::update($queryupdateHapusPesanan, $dataUpdateHapusMenu);

        // dd($executequeryupdateHapusPesanan);
        return $executequeryupdateHapusPesanan;
    }

    //mengambil value meja dari page pilih meja untuk ditampilkan di page Menu
    function get_mejaMenu($NO_MEJA) {
        $queryMejaMenu = "SELECT NO_MEJA, ID_MEJA FROM meja WHERE NO_MEJA = :NO_MEJA AND DEL_STATUS = 0;";
        $executequeryqueryMejaMenu = DB::select($queryMejaMenu, $NO_MEJA);
        return $executequeryqueryMejaMenu;
    }

    // mendisplay pesanan

    function get_tampilkanpesanan($NO_MEJA) {
        $queryDisplay = "SELECT dm.NAMA_MENU, dt.ID_MENU, SUM(dt.JUMLAH) as `TOTAL_JUMLAH`, (sum(dt.jumlah) * dm.HARGA) as `TOTAL_HARGA_MENU` FROM meja m, data_menu dm, detail_transaksi dt, transaksi t WHERE m.ID_MEJA = t.ID_MEJA AND dm.ID_MENU = dt.ID_MENU AND t.ID_TRANSAKSI = dt.ID_TRANSAKSI AND t.STATUS_TRANSAKSI = 0 AND m.NO_MEJA = :NO_MEJA AND dt.DEL_STATUS = 0 GROUP BY dt.ID_MENU;";
        $executequeryDisplay = DB::select($queryDisplay, $NO_MEJA);
        return $executequeryDisplay;
    }

    // display total harga

    function get_displaytotal($NO_MEJA) {
        $queryDisplayExt = "SELECT t.ID_TRANSAKSI, t.TANGGAL, m.NO_MEJA, t.TOTAL_HARGA FROM  meja m, transaksi t WHERE t.ID_MEJA = m.ID_MEJA AND t.STATUS_TRANSAKSI = 0 AND m.NO_MEJA = :NO_MEJA;";
        $executequeryDisplayExt = DB::select($queryDisplayExt, $NO_MEJA);
        return $executequeryDisplayExt;
    }






}


