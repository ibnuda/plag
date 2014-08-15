<?php

session_start();

//print("anu  " . $_SESSION['progres'] . " dari " . $_SESSION['akhir'] . " baris.");
echo '<div class="progress-bar" role="progressbar" aria-valuenow="' . 
(( $_SESSION['progress'] + 1) * 100 / $_SESSION['goal']) . '" aria-valuemin="0" aria-valuemax="100" style="width: ' .  (( $_SESSION['progress'] + 1) * 100 / $_SESSION['goal']) . '%;"> ' + (( $_SESSION['progress']+1) * 100 / $_SESSION['goal']) . '% </div>';


?>
