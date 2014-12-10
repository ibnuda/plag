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
    <script language="javascript">

    //var idYangDicari = document.getElementById("yangdicari").value;
    function mulai(idYangDicari)
    {
        var xhr = new XMLHttpRequest();
        var teks = "teks=" + idYangDicari + ".txt";
        //xhr.open("GET", "/plag/php/pencocokan/cocok.php?" + teks, true);
        xhr.open("GET", "/plag/php/pencocokan/cocok2.php?" + teks, true);
        jeda = window.setInterval( function () {
            ganti();
        }, 200);
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4) {
                window.clearInterval(jeda);
                document.getElementById("tempatProgres").innerHTML = "selesai.";
                xhr.open("GET", "/plag/php/pencocokan/test.php");
            }
        }
        xhr.send();
    }

    function ganti()
    {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if(xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("tempatProgres").innerHTML = xhr.responseText;
            }
        }
        xhr.open("GET", "./updatehitung.php", true);
        xhr.send();
    }
    </script>

</head>
<body>
<?php
session_start();
$_SESSION['ngapain'] = 'unggah';
include '../../panel.php';
?>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
            <div class="row clearfix">
                <?php
                    if (isset( $_SESSION['username'])) {
                        if ($_SESSION['username'] !== "admin") {
                            include_once './unggah.class.php';
                            include_once './unggah.php';
                        } else {
                            echo '<div class="col-md-4 column"><br><br><br>Maaf, administrator tidak dapat mengunggah</div>';
                        }
                        
                        include_once '../lihat/lihatfolder.php';
                        //echo 'ini /plag/php/unggah/direk';
                    } else {
                        include '../../php/sedikit.php';
                    }

                ?>
            </div>
		</div>
	</div>
</div>
</body>
</html>

