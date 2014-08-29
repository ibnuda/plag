<?php

include_once './oss_api.class.php';
include_once './oss_search.class.php';
include_once './conf.php';

$oss_api = new OssApi(url, indeks, login, kunciapi);
$oss_search = new OssSearch(url, indeks, '', '', login, kunciapi);

