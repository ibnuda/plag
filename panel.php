<?php

session_start();
echo '
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span><span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/plag">Plagiasi</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">';
if (isset( $_SESSION['username'])) {
    echo '
        <ul class="nav navbar-nav">
        <li class="active">
        <a href="/plag/php/pencocokan/direk.php">Pencocokan</a>
        </li>
        <li>
        <a href="/plag/php/unggah/direk.php">Unggah</a>
        </li>
        <li>
        <a href="/plag/php/lihat/direk.php">Lihat Hasil</a>
        </li>
        </ul>';
}
echo '
<form class="navbar-form navbar-left" role="search">
<div class="form-group">
<input class="form-control" type="text" />
</div> <button type="submit" class="btn btn-default">Submit</button>
</form>
<ul class="nav navbar-nav navbar-right">';

if (!isset( $_SESSION['username'])) {
    echo '
        <li>
            <a href="/plag/php/user/login.php">Login</a>
        </li>
        <li>
            <a href="/plag/php/user/daftar.php">Daftar</a>
        </li>';
} else {
    echo '
        <li>
            <a href="/plag/php/user/logout.php">Logout</a>
        </li>';
}
echo '
    </ul>
</div>

</nav>
		</div>
	</div>
</div>';

?>
