<!--html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <script type="txt/javascript" src="./js/aja.js"></script>
</head>
<body-->
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <!--nav class="navbar navbar-default navbar-fixed-top" role="navigation">
                    <div class="navbar-header">
                         <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">Brand</a>
                    </div>
                    
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li class="active">
                                <a href="#">Link</a>
                            </li>
                            <li>
                                <a href="#">Link</a>
                            </li>
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">One more separated link</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <form class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input class="form-control" type="text" />
                            </div> <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#">Link</a>
                            </li>
                            <li class="dropdown">
                                 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown<strong class="caret"></strong></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Action</a>
                                    </li>
                                    <li>
                                        <a href="#">Another action</a>
                                    </li>
                                    <li>
                                        <a href="#">Something else here</a>
                                    </li>
                                    <li class="divider">
                                    </li>
                                    <li>
                                        <a href="#">Separated link</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    
                </nav-->
                <div class="row clearfix">
                    <div class="col-md-4 column">
                        <form action="./php/bandingkan.php">
                            <button type="submit" class="btn center-block">Banding</button> 
                        </form>
                    </div>
                    <div class="col-md-4 column">
                        <form action="./php/rekap.php">
                            <button type="submit" class="btn center-block">Rekap</button> 
                        </form>
                    </div>
                    <div class="col-md-4 column">
                        <form action="./php/logout.php">
                            <button type="submit" class="btn center-block">Logout</button> 
                        </form>
                    </div>
                </div>
            </div>
            <!--div class="col-md-12 column">
                <div id="progress" class="progress">
                </div>
                <div class="row clearfix">
                    <div class="col-md-8 column">
                        <div class="row clearfix">
                            <form role="form" name="formUnggahBanding" method="post" action="">
                                <div class="form-group">
                                    <p id="list" class="help-block">
                                        Pilih berkas yang akan dicocokkan dalam bentuk plaintext / .txt.
                                    </p>
                                    <label for="exampleInputFile">Berkas</label><input id="exampleInputFile" type="file" />
                                    <button type="submit" class="btn" onclick="wah()">cetak</button> 
                                    <script type="text/javascript">
                                    var isi = "";
                                    var arrayKalimat = new Array();
                                    document.getElementById('exampleInputFile').addEventListener('change', bacaBerkas, false);
                                    var namaBerkas = document.getElementById('exampleInputFile').value;

                                    function bacaBerkas (evt) {
                                        var files = evt.target.files;
                                        var file = files[0];           
                                        var reader = new FileReader();
                                        var isi = "";
                                        reader.onload = function() {
                                            isi = this.result;
                                            ngahaha(isi);
                                        };
                                        reader.readAsText(file);
                                    }

                                    function ngahaha(isi){
                                        var arrayKalimat = isi.match(/\(?[0-9A-Z][^\.\?\!]+[\.!\?]\)?/g);
                                        document.getElementById("are").innerHTML = "";
                                        for ( var i = 0, len = arrayKalimat.length; i < len; i++){
                                            //document.getElementById("list").innerHTML =  'menghitung ' + (i + 1) + ' dari ' + arrayKalimat.length + ' kalimat';
                                            lelele(arrayKalimat[i]);
                                            document.getElementById('list').innerHTML += namaBerkas;
                                            document.getElementById("progress").innerHTML = 
                                                '<div class="progress-bar" role="progressbar" aria-valuenow="' + 
                                                ((i+1) * 100 / len) + '" aria-valuemin="0" aria-valuemax="100" style="width: ' +
                                                ((i+1) * 100 / len) + '%;"> ' + ((i+1) * 100 / len) + '% </div>';
                                        }
                                    }
                                    </script>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-4 column">
                        <div class="row clearfix">
                            <div class="col-md-6 column">
                                <div class="row clearfix"></div>
                            </div>
                            <div class="col-md-6 column">
                                <div class="row clearfix">
                                    <form role="form" name="formLogout" method="post" action="./php/logout.php">
                                        <button type="submit" class="btn btn-default">Logout</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <table class="table" id="initabel">
                        <thead> 
                            <tr> <th> Kalimat (30 karakter pertama).  </th> <th> ID Skripsi </th> <th> Judul Skripsi </th> </tr>
                        </thead>
                        <tbody id="are">
                        </tbody>
                    </table>
                </div>
            </div-->
        </div>
    </div>
<!--/body>
</html-->
