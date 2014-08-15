<?php

$akhir = 5000;
session_start();
for($i = 0; $i < $goal; $i++) {
    session_start();
    if(!isset($_SESSION['progres'])) {
        $_SESSION['progres'] = $i;
        $_SESSION['akhir'] = $akhir;
    }
    usleep(rand(500, 2000));
    $_SESSION['progres'] = $i;
    session_write_close(); 
    header_remove();
}

?>
