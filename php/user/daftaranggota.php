<?php

//session_start();
include_once '../koneksi/simpan.class.php';
include_once '../user/login.class.php';

$login = new Login();
/*
if (isset($_SESSION['username'])) {
    $login->redirek('/plag/');
}
 */
if (isset($_POST['nama']) && isset($_POST['word'])) {
    // code...
//} else {
    $simpan = new Simpan();
    $nama = $_POST['nama'];
    $word = $_POST['word'];

    $simpan->daftarBaru($nama, $word);
    $login->redirek('/plag/');
}
