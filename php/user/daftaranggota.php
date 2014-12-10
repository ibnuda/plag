<?php

//session_start();
include_once '../koneksi/simpan.class.php';
include_once '../user/login.class.php';
error_reporting(1);

$login = new Login();
/*
if (isset($_SESSION['username'])) {
    $login->redirek('/plag/');
}
 */
echo $_POST['nama'];
echo $_POST['word'];
echo $_POST['word-konf'];
if (isset($_POST['nama']) && isset($_POST['word']) && isset($_POST['word-konf'])) {

    if ($_POST['word'] !== $_POST['word-konf']) {
        $login->redirek('./daftar.php');
    }
    
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
