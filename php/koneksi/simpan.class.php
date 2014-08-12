<?php

/**
 * Class Simpan
 * @author John Doe
 */
include_once '../conf/config.php';
include_once '../conf/error_handler.php';

class Simpan
{
    /*
     * merupakan koneksi ke mysql.
     */
    private $mysqli;

    /*
     * setiap kali instansiasi objek, mbuat koneksi baru.
     */
    public function __construct()
    {
        $this->mysqli = new mysqli(host, user, pass, db);
    }
    /**
     * tiap kali selesai, nutup koneksi.
     */
    public function __destruct()
    {
        $this->mysqli->close();
    }

    /**
     * log. sepertinya.
     * user siapa unggah berkas namanya apa.
     * sekaligus update 'jumlah_simpanan' di tabel luser.
     */
    public function unggahBerkas($user, $berkas)
    {
        $kueri = 'insert into simpanan values';
    }
    
}

