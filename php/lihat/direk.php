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
	
	<link href="/plag/css/bootstrap.min.css" rel="stylesheet">
	<link href="/plag/css/style.css" rel="stylesheet">

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/plag/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/plag/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/plag/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="/plag/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="/plag/js/jquery.min.js"></script>
	<script type="text/javascript" src="/plag/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/plag/js/scripts.js"></script>
    <script type="text/javascript" src="/plag/js/aja.js"></script>

</head>
<body>
<?php
    session_start();
    $_SESSION['ngapain'] = 'lihat';
    include '../../panel.php';
    if (isset( $_SESSION['username'])) {
        echo 'ini /plag/php/lihat/direk';
    }
?>
</body>
</html>

