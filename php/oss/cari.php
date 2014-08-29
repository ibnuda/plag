<?php

/**
 * menggunakan kelas api dan pencarian
 */
include_once('./oss_api.class.php');
include_once('./oss_results.class.php');

/**
 * konfigurasi.
 */
$oss_url = 'http://localhost:9090';
$oss_index = 'qwer';
$oss_login = 'joni';
$oss_key = '9fa92f21a01f42520817f955ca909fde';

/**
 * instansiasi objek kelas api dan search.
 */
$oss_api = new OssApi($oss_url, $oss_index, $oss_login, $oss_key);
$oss_search = new OssSearch($oss_url, $oss_index, '', '', $oss_login, $oss_key);

/**
 * pencarian dengan kueri.
$kueri = 'Penelitian ini merupakan penelitian yang bersifat pengujian hipotesis dengan menggunakan metode survei';
 */
$kueri = $_POST['yangDicari'];
$xmlResult = $oss_search->query($kueri)->lang('en')->template('ceksound')->rows(10)->execute(50);
$oss_result = new OssResults($xmlResult);
$jumlahhasil = $oss_result->getResultRows(); 

/**
 * cetak hasil.
 */
print '<ul>';
for ($i = 0; $i < $jumlahhasil; $i++) {
//for ($i = 0; $i < 3; $i++) {
  $link = $oss_result->getField($i, 'uri');
  $konten = $oss_result->getField($i, 'content', true, true, null, true);
  print '<li>' . $link . '<br> - <em>' . $konten . '</em></li><br>';
}
print '</ul>';
