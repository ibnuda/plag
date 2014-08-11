<!DOCTYPE html>
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
                <div class="row clearfix">
                    <div class="col-md-4 column">
                        <form role="form" name="formLogin" method="post" action="./php/logout.php">
                            <button type="submit" class="btn btn-default">Logout</button>
                        </form>
                    </div>
                    <div class="col-md-4 column">
                    </div>
                    <div class="col-md-4 column">
                    </div>
                </div>
            </div>
            <div class="col-md-12 column">
                <div class="row clearfix">
                    <form role="form" name="formUnggahBanding" method="post" action="./php/unggah.php">
                        <div class="form-group">
                            <p id="list" class="help-block">
                                Pilih berkas yang akan dicocokkan dalam bentuk plaintext / .txt.
                            </p>
                            <label for="exampleInputFile">Berkas</label><input id="exampleInputFile" type="file" />
                            <!--/div--> 
                            <button type="submit" class="btn" onclick="$('#initabel').tableExport(type:'pdf',escape,'false'})">cetak</button> 
                            <script type="text/javascript">
                            var isi = "";
                            var arrayKalimat = new Array();
                            document.getElementById('exampleInputFile').addEventListener('change', readFile, false);

                                function readFile (evt) {
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
                                    document.getElementById("list").innerHTML =  'menghitung ' + (i + 1) + ' dari ' + arrayKalimat.length + ' kalimat';
                                    bandingkanKalimat(arrayKalimat[i]);
                                    document.getElementById("progress").innerHTML = 
                                        '<div class="progress-bar" role="progressbar" aria-valuenow="' + 
                                        ((i+1) * 100 / len) + '" aria-valuemin="0" aria-valuemax="100" style="width: ' +
                                        ((i+1) * 100 / len) + '%;"> ' + ((i+1) * 100 / len) + '% </div>';
                                }
                            }
                            </script>
                        </div>
                    </form>
                    <div id="progress" class="progress">
                    </div>
                    <table class="table" id="initabel">
                        <thead> 
                            <tr> <th> Kalimat (30 karakter pertama).  </th> <th> ID Skripsi </th> <th> Judul Skripsi </th> </tr>
                        </thead>
                        <tbody id="are">
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</body>
</html>
