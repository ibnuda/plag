<?php
require_once '../conf/config.php';
require_once '../conf/error_handler.php';
require_once './login.class.php';

$login = new Login();

if (isset( $_POST['nama']) && isset( $_POST['word'])) {
    $nama = $_POST['nama'];
    $word = $_POST['word'];
    $nama = $login->sehatNama($nama);
    $word = $login->sehatNama($word);
    if ($login->cekLogin($nama, $word)){
        //session_register($nama);
        //session_register($word);
        session_start();
        $_SESSION['username'] = $nama;
        $_SESSION['password'] = $word;
        setcookie($nama, $word, time() + 120);
    } else {
        echo "plis.";
        echo "<script> alert('plis', 2000)</script>";
    }
    //$login->redirek('../../index.php');
    $login->redirek('/plag');
    //include_once './form.php';
    echo 'fak';
    die();
}
?>
