<?php
/*
echo '<h1>ngahahahaha</h1>';
echo 'tempat lihat unggahan folder';
 */
?>
<div class="container">
    <div class="clearfix row">
        <div class="col-md-12 column">
            <div class="row clearfix">
                <div class="col-md-12 column">
                    <table class="table" id="initabel">
                        <thead> 
                            <tr>
                                <!--th> No </th>
                                <th> Judul Berkas  </th>
                                <th> Ukuran Berkas </th>
                                <th> Waktu Unggah Berkas </th>
                                <th> Periksa </th!-->
                                <th>No</th>
                                <th>Nama Berkas</th>
                                <th>Tanggal Pemeriksaan</th>
                                <th>Jumlah Kalimat Diperiksa</th>
                                <th>Jumlah Kalimat Sama</th>
                                <th>Jumlah Sumber</th>
                                <th>Persentase</th>
                                <th>Lihat</th>
                            </tr>
                        </thead>
                        <tbody id="are">
                            <?php
                                if (isset($_SESSION['username'])) {
                                    $user = $_SESSION['username'];
                                    include_once '../lihat/lihatfolder.class.php';
                                    $lihat = new lihatfolder();
                                    //echo 'masih belum jadi';
                                    echo $lihat->lihatPencocokan($user);
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

