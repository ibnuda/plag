<?php
session_start();

if (isset( $_SESSION['username'])) {
    if (isset($_FILES['berkasUnggahan'])) {
        
        //$_SESSION['ngekek'] = $_FILES['berkasUnggahan'];//['tmp_name'];
        $lemper = $_FILES['berkasUnggahan'];
        //$berkas = $namaBerkas;
        $file = $lemper['tmp_name'];//$_SESSION['ngekek']['tmp_name'];
        $gede = $lemper['size'];//$_SESSION['ngekek']['size'];

        include_once '../koneksi/cumanredirek.class.php';
        $redire = new cumanRedirek();

        include_once '../koneksi/simpan.class.php';

        $simpan = new Simpan();
        $simpan->catatBerkasUser($_SESSION['username'], $file, $gede);
        //echo $gede . $file;
        /*
        include_once './flu.class.php';
        include_once '../koneksi/simpan.class.php';

        $berkas = $_FILES['berkasUnggahan'];
        $user = $_SESSION['username'];

        $unggah = new Flu();
        $simpan = new Simpan();

        // menentukan jumlah simpanan user.
        $jumlah = $simpan->cekJumlahSimpan($user);
        // mengunnggah berkas ke folder.
        $unggah->unggahBerkas($berkas, $user, $jumlah + 1);
        // menentukan ukuran berkas.
        $ukuranBerkas = $unggah->ambilUkuranBerkas($berkas);
        // menentukan nama berkas setelah terunggah.
        $namaBerkas = $unggah->ambilNamaberkasTersimpan($user, $berkas, $jumlah + 1);
        $simpan->catatBerkasUser($user, $berkas, $ukuranBerkas);
        // balik lagi
        */
        $redire->redirek('/plag/php/unggah/index.php');
    }
}
?>

