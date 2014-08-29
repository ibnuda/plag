<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <!--form action="cari.php" method="post">
        <input type="text" name="yangDicari" id="yangDicari"><br>
        <input type="submit">
    </form-->
    <script>
        
    </script>
        <?php
        
        include_once './carioss.class.php';
        $teksnya = $_GET['yangDicari'];
        $teksnya = $teksnya . '.txt';
        echo 'nama teksnya : ' . $teksnya;
        
        $cariaja = new CariOSS();

        $arrayKueri = $cariaja->bukaBerkas($teksnya);
        echo '<ul>';
        $cariaja->cari('kota salatiga');

        //foreach ($arrayKueri as $kueri){
            //$cariaja->cari($kueri);
        //}
        echo '</ul>'
        ?>
</body>
</html>
