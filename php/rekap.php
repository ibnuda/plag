<?php
require_once './config.php';
require_once './error_handler.php';
require_once './login.class.php';

session_start();
$_SESSION['ngapain'] = "rekap";
$login = new Login();

$login->redirek('../index.php');
