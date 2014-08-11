<?php

session_start();
if (!isset($_SESSION['username'])) {
    // code...
}

?>
<html>
<head>
    <link rel="stylesheet" href="/plag/css/bootstrap.css">
</head>
<body>
<div id="message-wrapper" class="login-form-center" style="top:auto;margin-top:50px;height:auto;padding-bottom:80px;">
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-4 column">
                    </div>
                        <div class="col-md-4 column">
                            <form role="form" name="formLogin" method="post" action="./ceklogin.php">
                                <div class="form-group">
                                    <label for="username">Nama</label><input name="nama" class="form-control" id="username" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Pass</label><input name="word" class="form-control" id="password" type="password" />
                                </div>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div>
                    <div class="col-md-4 column">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

