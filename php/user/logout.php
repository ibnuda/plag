<?php

session_start();
setcookie( $_SESSION['username'], $_SESSION['password'], time() - 3600);
unset($_SESSION['username']);
unset($_SESSION['password']);
unset($_SESSION['ngapain']);
session_destroy();

header('Location:../../index.php');
