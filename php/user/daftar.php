<?php

//echo '<h1> Belum Dibuat </h1>';

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
                            <form role="form" name="formDaftar" method="post" action="./daftaranggota.php">
                                <div class="form-group">
                                    <label for="username">Nama Pengguna</label>
                                    <input name="nama" class="form-control" id="username" type="text" />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input name="word" class="form-control" id="password" type="password" />
                                </div>
                                <div class="form-group">
                                    <label for="password-konf">Konfirmasi Password</label>
                                    <input name="word-konf" class="form-control" id="password-konf" type="password" />
                                </div>
                                <button type="submit" class="btn btn-default">Daftar</button>
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


