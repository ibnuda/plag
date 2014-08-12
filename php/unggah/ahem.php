<?php
session_start();

if (isset( $_SESSION['username'])) {
    if (isset($_FILES['berkasUnggahan'])) {
        
        include_once './flu.class.php';
        include_once '../koneksi/simpan.class.php';
        include_once '../koneksi/cumanredirek.class.php';

        $berkas = $_FILES['berkasUnggahan'];
        $user = $_SESSION['username'];

        $unggah = new Flu();
        $simpan = new Simpan();
        $redire = new cumanRedirek();

        // menentukan jumlah simpanan user.
        $jumlah = $simpan->cekJumlahSimpan($user);
        // mengunnggah berkas ke folder.
        $unggah->unggahBerkas( $berkas, $user, $jumlah + 1);
        // menentukan ukuran berkas.
        $ukuranBerkas = $unggah->ambilUkuranBerkas($berkas);
        // menentukan nama berkas setelah terunggah.
        $namaBerkas = $unggah->ambilNamaberkasTersimpan($user, $berkas, $jumlah + 1);
        $simpan->catatBerkasUser($user, $namaBerkas, $ukuranBerkas);
        // balik lagi
        $redire->redirek('/plag/php/unggah/direk.php');
    }
}
?>

