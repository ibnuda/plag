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

    $hasil = $simpan->daftarBaru($nama, $word);
    if ($hasil === "oke") {
    	$login->redirek('/plag');
    } else {
    	$login->redirek('/plag/php/user/daftar.php');
    }
    
    $login->redirek('/plag/');
}
