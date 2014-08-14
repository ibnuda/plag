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

                        if (isset( $_SESSION['username'])) {
                            $parameter = $_GET['yangDiLihat'];
                            include '../pencocokan/hasilCocok/' . $parameter;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

