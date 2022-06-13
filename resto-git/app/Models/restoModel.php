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
        $querySemuaPesanan = "SELECT m.NO_MEJA as `NO_MEJA`, sum(t.TOTAL_HARGA) as `TOTAL_HARGA` FROM transaksi t, meja m WHERE m.ID_MEJA = t.ID_MEJA AND t.STATUS_TRANSAKSI=0 AND t.DEL_STATUS = 0 GROUP BY m.NO_MEJA ORDER BY m.NO_MEJA ASC;";
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
        $queryDisplayExt = "SELECT m.NO_MEJA, sum(t.TOTAL_HARGA) as `TOTAL_HARGA`FROM  meja m, transaksi t WHERE t.ID_MEJA = m.ID_MEJA AND t.STATUS_TRANSAKSI = 0 AND m.NO_MEJA = :NO_MEJA GROUP BY m.NO_MEJA;";
        $executequeryDisplayExt = DB::select($queryDisplayExt, $NO_MEJA);
        return $executequeryDisplayExt;
    }

    //menampilkan semua menu yang baru saja di insert
    function get_displayKonfirmasi($ID_MEJA) {
        $queryDisplayKonfirmasi = "CALL konfirmasi(:ID_MEJA);";
        $executequeryDisplayKonfirmasi = DB::select($queryDisplayKonfirmasi, $ID_MEJA);
        return $executequeryDisplayKonfirmasi;
    }

    //menampilkan total harga semua menu yang baru saja di insert
    function get_displayKonfirmasiExt($ID_MEJA) {
        $queryDisplayKonfirmasiExt = "CALL konfirmasiTotal(:ID_MEJA);";
        $executequeryDisplayKonfirmasiExt = DB::select($queryDisplayKonfirmasiExt, $ID_MEJA);
        return $executequeryDisplayKonfirmasiExt;
    }

    // query update status transaksi
    function get_updatebayar($NO_MEJA) {
        $queryupdatebayar = "UPDATE transaksi t JOIN meja m ON m.ID_MEJA = t.ID_MEJA SET t.STATUS_TRANSAKSI = '1' WHERE m.NO_MEJA = :NO_MEJA AND t.STATUS_TRANSAKSI = '0'";
        $executequeryupdatebayar = DB::select($queryupdatebayar, $NO_MEJA);
        return $executequeryupdatebayar;
    }

    //update menu yang di cancel jadi del = 1
    function get_updateHapusPesanan($NO_MEJA2, $ID_MENU2) {
        // dd($ID_TRANSAKSI2, $ID_MENU2);
        $dataUpdateHapusMenu = [
            'HAPUS_NO_MEJA'  => $NO_MEJA2,
            'HAPUS_ID_MENU'  => $ID_MENU2
        ];
        // dd($dataUpdateHapusMenu);

        $queryupdateHapusPesanan = "UPDATE detail_transaksi dt JOIN transaksi t on dt.ID_TRANSAKSI = t.ID_TRANSAKSI JOIN meja m ON t.ID_MEJA = m.ID_MEJA JOIN data_menu dm on dm.ID_MENU = dt.ID_MENU SET dt.DEL_STATUS = 1 WHERE t.STATUS_TRANSAKSI = 0 AND t.DEL_STATUS = 0 AND m.NO_MEJA = :HAPUS_NO_MEJA AND dt.ID_MENU = :HAPUS_ID_MENU;";
        // dd($queryupdateHapusPesanan);
        $executequeryupdateHapusPesanan = DB::update($queryupdateHapusPesanan, $dataUpdateHapusMenu);

        // dd($executequeryupdateHapusPesanan);
        return $executequeryupdateHapusPesanan;
    }

    //mengambil value meja dari page pilih meja untuk ditampilkan di page Menu
    function get_mejaMenu($ID_MEJA) {
        $queryMejaMenu = "SELECT NO_MEJA, ID_MEJA FROM meja WHERE ID_MEJA = :ID_MEJA AND DEL_STATUS = 0;";
        $executequeryqueryMejaMenu = DB::select($queryMejaMenu, $ID_MEJA);
        return $executequeryqueryMejaMenu;
    }

    // melakukan insert transaksi baru saat pilih meja
    function get_inserttransaksibaru($ID_MEJA) {
        $queryinserttransaksi = "insert into transaksi (ID_MEJA, TANGGAL, STATUS_TRANSAKSI, DEL_STATUS) VALUES(:ID_MEJA, date_format(now(),'%Y%m%d'), 0, 0);";
        $executequeryinserttransaksi = DB::insert($queryinserttransaksi, $ID_MEJA);
        return $executequeryinserttransaksi;
    }

    // query search menu dari search bar
    function get_searchMenu($searchBar){
        $querySearchMenu = "SELECT ID_MENU, NAMA_MENU, HARGA FROM data_menu WHERE NAMA_MENU LIKE '%".$searchBar[0]."%' AND DEL_STATUS = 0 ORDER BY NAMA_MENU;";
        $executequerySearchMenu = DB::select($querySearchMenu);
        return $executequerySearchMenu;
    }

    // query hapus transaksi
    function get_hapustransaksi($ID_MEJA){
        $queryhapustransaksi = "CALL hapus_transaksi(:ID_MEJA)";
        $executequeryhapustransaksi = DB::select($queryhapustransaksi, $ID_MEJA);
        return $executequeryhapustransaksi;
    }

    // query insert transaksi
    function post_insertdetail($tboxinsertdetail){
        $queryinserttransaksi = "CALL insert_transaksi(:menuIdMeja, :menuCatatan, :menuJumlah, :menuIdMenu)";
        $executequeryinserttransaksi = DB::select($queryinserttransaksi, $tboxinsertdetail);
        return $executequeryinserttransaksi;
    }










}


