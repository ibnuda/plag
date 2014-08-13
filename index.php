<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
    <script type="text/javascript" src="js/aja.js"></script>

</head>
<body>
<?php
session_start();
$_SESSION['ngapain'] = '';
include './panel.php';
/*
if (isset($_SESSION['username'])) {
    require_once '/plag/php/user/login.class.php';
    $login = new Login();
    if ($_SESSION['ngapain'] === "cocok") {
        //include_once 'php/pencocokan/direk.php';
        $login->redirek('/plag/php/pencocokan/direk.php');
    } else if ($_SESSION['ngapain'] === "rekap") {
        //include_once 'php/lihat/direk.php';
        $login->redirek('/plag/php/lihat/direk.php');
    } else if (!isset($_SESSION['ngapain'])) {
        include_once '/plag/php/sedikit.php';
    }
} else {
    include_once '/plag/php/sedikit.php';
}
 */
include_once './php/sedikit.php';
?>
</body>
</html>
