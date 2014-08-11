<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script type="txt/javascript" src="./js/aja.js"></script>
</head>
<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h1 class="text-center text-danger">
				Plagiasi Skripsi
			</h1>
		</div>
	</div>
</div>
<?php
session_start();
if (isset($_SESSION['username'])) {
    include_once 'php/form.php';
} else {
    include_once 'php/login.php';
}
?>
</body>
</html>
