<?php

require_once '../conf/config.php';
require_once '../conf/error_handler.php';

/**
 * Class Login
 * @author Ibnu
 */
class Login
{
    private $mMysqli;

    public function __construct()
    {
        $this->mMysqli = new mysqli(host, user, pass, debe);
    }

    public function cekLogin($nama, $word)
    {
        $kueri = 'select nama, word from luser where nama="' . $nama .
                 '" and word="' . $word . '"';

        $hasil = $this->mMysqli->query($kueri);
        $masuk = $hasil->num_rows;
        return $masuk;
    }
    public function sehatNama($nama)
    {
        $nama = stripslashes($nama);
        $nama = $this->mMysqli->real_escape_string($nama);
        return $nama;
    }

    public function sehatWord($word)
    {
        $word = stripslashes($word);
        $word = $this->mMysqli->real_escape_string($word);
        return $word;
    }

    public function redirek($url)
    {
        header('Location: ' . $url);
        exit();
    }
    

    public function __destruct()
    {
        $this->mMysqli->close();
    }
}

