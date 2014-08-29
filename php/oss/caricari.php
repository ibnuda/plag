<?php
//session_start();

include_once './oss_search.class.php';
include_once './oss_api.class.php';
//include_once '';

$teks = $_GET['teks'];
$cocok = new Cocok();
$simpan = new Simpan();
$direk = new cumanRedirek();

$arraySimpanan = $cocok->bukaBerkas($teks);
$arrayHasil = '';
$jumlahKalimatCek = 0;
$jumlahKalimatCok = 0;

$jumlahKalimatCek = sizeof($arraySimpanan);
$errortulis = 9;
$waktumulai = microtime(true);
for ($i = 0; $i < sizeof($arraySimpanan); $i++) {
    session_start();
    $user = $_SESSION['username'];
    if(!isset($_SESSION['progres'])) {
        $_SESSION['progres'] = $i;
        $_SESSION['akhir'] = $jumlahKalimatCek;
    }
    if (strlen($arraySimpanan[$i]) > 30) {
        $sementara = $cocok->pencocokan($arraySimpanan[$i]);
        if ($sementara !== null){
            $arrayHasil .= $sementara;
            $jumlahKalimatCok++;
        } else {
            $arrayHasil .= "<tr class='active'><td>" . $arraySimpanan[$i] . "</td><td>Kosong</td><td>N/A</td></tr>";
        }
    }
    $_SESSION['progres'] = $i;
    session_write_close(); 
    header_remove();
}
$waktuakhir = microtime(true);

/**
 * log.
 * $user = user dalam sesi tersebut.
 * $berkas = file yang dicocokan.
 * no_log = no log.
 * nam_log = nama hasil pencatatan.
 * nam_fil = nama file yang dicocokkan.
 * tan_fil = tanggal pencocokan.
 * lam_cek = lama pencocokan.
 * jum_cek = jumlah kalimat yang dicek.
 * jum_cok = jumlah kalimat yang sesuai dengan sumber.
 * jum_sum = jumlah sumber.
 * has_cek = hasil pengecekan (dalam persen).
 */

$lamapengecekan = $waktuakhir - $waktumulai;
$persentase = $jumlahKalimatCok / $jumlahKalimatCek;

if ((sizeof($arraySimpanan)> 0) && $arrayHasil !== null) {
    $errortulis = $cocok->tulisBerkasCocok($teks, $arrayHasil);
    if ($errortulis === 2) {
        echo 'gagal membuat berkas';
    } elseif ($errortulis === 1) {
        echo 'gagal menulis berkas';
    } elseif ($errortulis === 0) {
        echo 'berhasil simpan';
        echo 'kalimat di cek ' . $jumlahKalimatCek . '</br>';
        echo 'kalimat cocok ' . $jumlahKalimatCok . '</br>';
        echo 'lama pengecekan ' . $lamapengecekan . '</br>';
        echo 'nama berkas ' . $teks . '</br>';
        echo 'hasil pengecekan ' . $jumlahKalimatCok / $jumlahKalimatCek . '</br>';
        $simpan->catatPencocokanUser($user, $teks, $lamapengecekan, $jumlahKalimatCek, $jumlahKalimatCok, $persentase);
    }
    $direk->cumanRedirek('/plag/pencocokan/');
    exit();
}
/*
$berkas = 'kekeke.txt';
$handle = fopen($berkas, 'a');
fwrite($handle, $arrayHasil);
 */
