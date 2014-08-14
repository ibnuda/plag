<?php

include_once './cocok.class.php';

$teks = $_GET['teks'];
//$teks = 'ibnu_qwer_2.txt';
//$teks = 'lele.txt';
$cocok = new Cocok();

$arraySimpanan = $cocok->bukaBerkas($teks);

$hah = '';
$a = 0;
for ($i = 0; $i < sizeof($arraySimpanan); $i++) {
    if (strlen($arraySimpanan[$i]) > 30) {
        //$hah .= $a + 1 . '. ' . $arraySimpanan[$i] . "\r\n";
        //$a++;
        $hah .= $cocok->pencocokan($arraySimpanan[$i]);
    }
}
$berkas = 'kekeke.txt';
$handle = fopen($berkas, 'a');
fwrite($handle, $hah);
