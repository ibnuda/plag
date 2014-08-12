<?php
session_start();

if (isset( $_SESSION['username'])) {
    include_once './flu.class.php';
    include_once '../koneksi/simpan.class.php';
    include_once '../koneksi/cumanredirek.class.php';
    $unggah = new Flu();
    $simpan = new Simpan();
    $redire = new cumanRedirek();
    $jumlah = $simpan->cekJumlahSimpan($_SESSION['username']);
    // rencananya, ngambil nilai jumlah simpanan user dari database ke "$asdf"
    // lalu $asdf digunakan sebagai penomoran nama berkas unggahan.
    // bila berhasil unggah, simpan ke database.
    $unggah->unggahBerkas( $_FILES['berkasUnggahan'], $_SESSION['username'], $jumlah + 1);
    // $simpan->nambahBerkas('user', 'path_berkas');
    // path_berkas = akan disimpan secara penuh ke tabel "simpananluser".
    // $simpan->updateJumlahBerkasSimpanan('user', 'jumlahbaru');
    // jumlahbaru = $asdf + 1. :v
    $redire->redirek('/plag/php/unggah/direk.php');
}
?>

