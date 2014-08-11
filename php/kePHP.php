<?php
require_once './config.php';
require_once './error_handler.php';
require_once './kePHP.class.php';


$isianKalimat = $_GET['yangDicari'];

if (isset($isianKalimat)) {
    if (strlen($isianKalimat) > 200) {
        $isianKalimat = substr($isianKalimat, 0, 149);
    } else if (strlen($isianKalimat) < 20) {
        exit;
    }
    $kephp = new KePHP();
    $hasilKalimat = $kephp->cekKeDB($isianKalimat);
    echo $hasilKalimat;
} else {
    echo "koneksi error";
}
?>
