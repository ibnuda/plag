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
        $this->mysqli = new mysqli(host, user, pass, debe);
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
    public function catatBerkasUser($user, $berkas, $ukuran)
    {
        $username = $this->sanitasiParameter($user);
        $kueri = 'insert into simpanan (na_user, na_file, uk_file, ta_file) values(' .
                 '"' . $user . '", "' . $berkas .'", ' . $ukuran .', "' . date('Y-m-d H:i:s') .'");';
        echo $kueri . '<br>';
        $this->mysqli->query($kueri);
        $kueri2 = 'update luser set simpanan=simpanan+1 where nama = "' . $user . '";';
        $this->mysqli->query($kueri2);
    }

    /**
     * digunakan untuk daftar anggota baru.
     * parameter yang dibutuhkan adalah username dan password saja.
     * untuk saat ini.
     */
    public function daftarBaru($username, $password)
    {
        $username = $this->sanitasiParameter($username);
        $password = $this->sanitasiParameter($password);

        $kueri = 'insert into luser values ("' . $username . '", "' . $password . '", 0);';
        $this->mysqli->query($kueri);
        if ($this->mysqli->affected_rows > 0) {
            return 'oke. berhasil daftar.';
        } else {
            return 'username sudah ada.';
        }
    }

    public function cekJumlahSimpan($user)
    {
        $username = $this->sanitasiParameter($user);
        $kueri = 'select simpanan from luser where nama = "' . $user . '";';
        $hasil = $this->mysqli->query($kueri);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil->fetch_array();
            return $baris['simpanan'];
        }
    }
    
    
    /**
     * digunakan untuk keamanan. misal ngilangin titik koma dkk.
     * agar kemungkinan injeksi sql tidak berhasil.
     */
    private function sanitasiParameter($parameter)
    {
        $parameter = stripslashes($parameter);
        $parameter = $this->mysqli->real_escape_string($parameter);
        return $parameter;
    }
}

