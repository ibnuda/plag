<div class="col-md-8 column">
    <?php
    //echo '<h1>ngahahahaha</h1>';
    //echo 'tempat lihat unggahan folder';
    echo '<div id="tempatProgres">Progress Pencocokan (Jika Berlangsung)</div>';
    ?>
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
                    include_once '../lihat/lihatfolder.class.php';
                    $lihat = new lihatfolder();
                    echo $lihat->lihatUnggahan($user);
                }
            ?>
        </tbody>
    </table>
</div>
