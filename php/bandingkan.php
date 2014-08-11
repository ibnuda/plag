<?php
include_once './config.php';
include_once './kePHP.class.php';
session_start();
$_SESSION['ngapain'] = "bandingkan";
$login = new Login();

$login->redirek('./okefix.php');
