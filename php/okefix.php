<?php

session_start();

?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-4 column">
                    <form action="./php/bandingkan.php">
                        <button class="btn center-block" type="submit">Banding</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                    <form action="./php/rekap.php">
                        <button class="btn center-block" type="submit">Rekap</button>
                    </form>
                </div>
                <div class="col-md-4 column">
                    <form action="./php/logout.php">
                        <button class="btn center-block" type="submit">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
<div class="row clearfix">
    <div class="col-md-8 column">
        <div class="row clearfix">
            <p id="list" class="help-block text-center">
                Pilih berkas yang akan dicocokkan dalam bentuk plaintext / .txt.
            </p>
        </div>
    </div>
    <div class="col-md-4 column">
        <div class="row clearfix">
			<form role="form">
				<div class="form-group">
					<label for="exampleInputFile">Berkas</label><input id="exampleInputFile" type="file" />
                    <!--/div--> <!--button type="submit" class="btn" onclick="$('#initabel').tableExport(type:'pdf',escape,'false'})">cetak</button--> 
                    <script type="text/javascript">
                    var isi = "";
                    var lemper = new Array();
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
                        //kalimat = awal huruf kapital, akhiran tanda seru / titik / tanya.
                        var lemper = isi.match(/\(?[0-9A-Z][^\.\?\!]+[\.!\?]\)?/g);
                        document.getElementById("are").innerHTML = "";
                        for ( var i = 0, len = lemper.length; i < len; i++){
                            document.getElementById("progress").innerHTML = 
                                '<div class="progress-bar" role="progressbar" aria-valuenow="' + 
                                ((i + 1) * 100 / len) + '" aria-valuemin="0" aria-valuemax="100" style="width: ' +
                                ((i + 1) * 100 / len) + '%;"> ' + ((i+1) * 100 / len) + '% </div>';
                            document.getElementById("list").innerHTML =  'menghitung ' + (i + 1) + ' dari ' + lemper.length + ' kalimat';
                            lelele(lemper[i]);
                        }
                    }
                    </script>
				</div>
			</form>
        </div>
    </div>
</div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column">
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
