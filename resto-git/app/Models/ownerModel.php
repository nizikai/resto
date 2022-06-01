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
    // buat hapus menu
    function get_hapusMenu( $ID_MENU) {
        $cmd = "UPDATE data_menu SET DEL_STATUS = '1' WHERE ID_MENU = :ID_MENU;";
        // dd($cmd);
        $result =DB::update($cmd, $ID_MENU);
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
        $queryDisplayEditMenu = "SELECT ID_MENU, NAMA_MENU, HARGA, f_drinkidgen() as `f_drink`, f_foodidgen() as `f_food`, f_snackidgen() as `f_snack` FROM data_menu WHERE ID_MENU = :idmenu;";
        $executequeryDisplayEditMenu= DB::select($queryDisplayEditMenu, $arrayIdMenu);
        return $executequeryDisplayEditMenu;
    }

    // buat Query Update di page Edit menu
    function post_update($tboxupdatemenu) {
        $cmd = "UPDATE data_menu SET NAMA_MENU = :insertmenu, HARGA = :insertharga WHERE ID_MENU = :insertvalue";
        $result = DB::update($cmd, $tboxupdatemenu);
        // dd($result);
        return $result;
    }

    // buat insert menu
    function post_insertmenu($tboxinsertmenu) {
        $cmd = "INSERT INTO data_menu( `ID_MENU`, `NAMA_MENU`, `HARGA`, `DESKRIPSI`, `DEL_STATUS`, `GAMBAR`) VALUES (:insertvaluemenu, :insertNamamenu, :insertharga, '-', '0', '-')";
        // $dataIdUpdate = [
        //     'insertmenu' => $tboxupdatemenu['insertmenu'],
        //     'insertharga' => $tboxupdatemenu['insertharga'],
        //     'insertidmenu' => $tboxupdatemenu['insertidmenu']
        // ]; //declare biar bisa dipake di query
        $result = DB::insert($cmd, $tboxinsertmenu);
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

    //laporan harian
    function get_laporanharian($hari){
        $querylaporanharian = "SELECT t.TANGGAL, m.NO_MEJA, t.TOTAL_HARGA FROM  meja m, transaksi t WHERE t.ID_MEJA = m.ID_MEJA AND t.TANGGAL = :hari ORDER BY t.TOTAL_HARGA ASC;";
        // dd($querylaporanharian);
        $executequerylaporanharian= DB::select($querylaporanharian, $hari);
        return $executequerylaporanharian;
    }

    //pemasukan harian
    function get_pemasukanharian($hari){
        $querypemasukanharian = "SELECT sum(t.TOTAL_HARGA) as `pemasukanHari`, count(t.TANGGAL) as `countMejaHarian` FROM  transaksi t WHERE t.TANGGAL = :hari;";
        // dd($querylaporanharian);
        $executequerypemasukanharian= DB::select($querypemasukanharian, $hari);
        return $executequerypemasukanharian;
    }

    //laporan bulanan
    function get_laporanbulanan($bulan){
        $querylaporanbulanan = "SELECT t.TANGGAL, sum(t.TOTAL_HARGA) AS `totalsumbulanan` FROM transaksi t WHERE SUBSTRING(TANGGAL,1,7) = :bulan  GROUP BY t.TANGGAL ORDER BY t.TANGGAL ASC ;";
        // dd($querylaporanharian);
        $executequerylaporanbulanan= DB::select($querylaporanbulanan, $bulan);
        return $executequerylaporanbulanan;
    }

    //pemasukan bulanan
    function get_pemasukanbulanan($bulan){
        $querypemasukanbulanan = "SELECT sum(t.TOTAL_HARGA) AS `pemasukanbulan`, count(TANGGAL) as `countMejaBulanan`FROM  transaksi t WHERE SUBSTRING(TANGGAL,1,7) = :bulan ORDER BY t.TOTAL_HARGA ASC;";
        // dd($querylaporanharian);
        $executequerypemasukanbulanan= DB::select($querypemasukanbulanan, $bulan);
        return $executequerypemasukanbulanan;
    }

    //untuk mengambil id baru di page tambah menu sebelum melakukan insert menu
    function get_autoId(){
        $queryautoid = "SELECT f_drinkidgen() as `fdrink`, f_foodidgen() as `ffood`, f_snackidgen() as `fsnack` ";
        $executequeryautoid= DB::select($queryautoid);
        return $executequeryautoid;
    }
}


