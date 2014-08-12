<?php
echo '<h1>ngahahahaha</h1>';
echo 'tempat lihat unggahan folder';
?>
<div class="col-md-8 column">
    <table class="table" id="initabel">
        <thead> 
            <tr>
                <th> No </th>
                <th> Judul Berkas  </th>
                <th> Ukuran Berkas </th>
                <th> Waktu Unggah Berkas </th>
                <th> Periksa </th>
            </tr>
        </thead>
        <tbody id="are">
            <?php
                if (isset($_SESSION['username'])) {
                    $user = $_SESSION['username'];
                    echo $user;
                    include_once './lihatfolder.class.php';
                    $lihat = new lihatFolder();
                    echo $lihat->lihatIsi($user);
                }
            ?>
        </tbody>
    </table>
</div>
