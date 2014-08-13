<?php

include_once '../conf/config.php';
include_once '../conf/error_handler.php';

/**
 * Class Cocok
 * @author John Doe
 */
class Cocok
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(host, user, pass, debe);
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }

    public function cocok($kalimat)
    {
        $kalimat = $this->sanitasiKalimat($kalimat);

        $kueri = 'select id_skrip, ju_skrip from skripsi where match(is_skrip) ' .
                 ' against (\'"' . $kalimat . '" @2 \' in natural language mode)';
      
    }
    
    public function sanitasiKalimat($kalimat)
    {
        $kalimat = stripslashes($kalimat);
        $kalimat = $this->mysqli->real_escape_string($kalimat);
        return $kalimat;
    }
    
}

