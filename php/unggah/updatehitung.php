<?php

session_start();

//print("anu  " . $_SESSION['progres'] . " dari " . $_SESSION['akhir'] . " baris.");
echo '<div class="progress-bar" role="progressbar" aria-valuenow="' . 
     (( $_SESSION['progres'] + 1) * 100 / $_SESSION['akhir']) .
     '" aria-valuemin="0" aria-valuemax="100" style="width: ' . 
     (( $_SESSION['progres'] + 1) * 100 / $_SESSION['akhir']) . '%;"> ' .
     (( $_SESSION['progres'] + 1) * 100 / $_SESSION['akhir']) . '% </div>';

?>
