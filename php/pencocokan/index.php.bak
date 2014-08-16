<?php
require_once '/plag/php/user/login.class.php';
session_start();
$login = new Login();
if (!isset( $_SESSION['username'])) {
    $login->redirek('/plag');
} else {
    $_SESSION['ngapain'] = "cocok";
    $login->redirek('/plag');
}
