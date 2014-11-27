<div class="container">
    <div class="col-md-12 column">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <table class='table' id='cocok'>
                    <thead> 
                        <tr>
                            <th> Kalimat (60 Karakter pertama)  </th>
                            <th> ID Skripsi </th>
                            <th> Judul Skripsi </th>
                        </tr>
                    </thead>
                    <tbody id="wowkakakwow">
                        <?php
                        session_start();
                        include_once '../conf/config.php';

                        $id_log = $_GET['asdf'];


                        if (isset( $_SESSION['username'])) {
                            //$parameter = $_GET['yangDiLihat'];
                            //include '../pencocokan/hasilCocok/' . $parameter;
                            $mysq = new mysqli(host, user, pass, debe);

                            $kueri = 'select skripsi.ju_skrip, skripsi.id_skrip, ' .
                                     'kalimat FROM `skripsi`, log WHERE id_log="' .
                                      $id_log . '" and skripsi.id_skrip = log.id_skrip ';
                            $hasil = $mysq->query($kueri);
                            while ($baris = $hasil->fetch_array()) {
                                echo '<tr class="active"><td>' . $baris['kalimat'] . '</td>' .
                                     '<td>' . $baris['id_skrip'] . '</td>' .
                                     '<td>' . $baris['ju_skrip'] . '</td></tr>';
                            }
                            $mysq->close();
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

