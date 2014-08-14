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
     * log.
     * $user = user dalam sesi tersebut.
     * $berkas = file yang dicocokan.
     * no_log = no log.
     * nam_log = nama hasil pencatatan.
     * nam_fil = nama file yang dicocokkan.
     * tan_fil = tanggal pencocokan.
     * uku_fil = ukuran file yang dicocokkan.
     * lam_cek = lama pencocokan.
     * jum_cek = jumlah kalimat yang dicek.
     * jum_cok = jumlah kalimat yang sesuai dengan sumber.
     * jum_sum = jumlah sumber.
     * uku_sum = besar sumber (dalam mb).
     * has_cek = hasil pengecekan (dalam persen).
     */
    //$simpan->catatPencocokanUser($user, $berkas, $lamapengecekan, $jumlahKalimatCek, $jumlahKalimatCok, $persentase);
    public function catatPencocokanUser($user, $berkas, $lama, $cek, $cok, $pers)
    {
        // update status cocok dari berkas
        $kueri1 = 'update simpanan set st_cek = 1 where na_user="' . $user .
                 '" and na_file="' . $berkas .'";';
        $this->mysqli->query($kueri1);

        // ambil informasi file cocok.
        $kueri2 = 'select uk_file from simpanan where na_user="' . $user . '" ' .
                  'and na_file="' . $berkas . '";';
        $ukuranberkas = 0;
        $hasil2 = $this->mysqli->query($kueri2);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil2->fetch_array();
            $ukuranberkas = $baris['uk_file'];
        }

        // ambil besar data sumber.
        $kueri3 = 'select table_schema, sum(data_length + index_length) / 1024 / 1024 "ukuran" ' .
                  'from information_schema.tables where table_schema="artikel";';
        $hasil3 = $this->mysqli->query($kueri3);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil3->fetch_array();
            $ukurandatabase = $baris['ukuran'];
        }

        // ambil jumlah skripsi sumber.
        $kueri4 = 'select count(id_skrip) as jumlahsumber from skripsi';
        $hasil4 = $this->mysqli->query($kueri4);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil4->fetch_array();
            $banyaksumber = $baris['jumlahsumber'];
        }
        $kuerisimpan = 'insert into log nam_log, nam_fil, tan_fil, uku_fil, lam_cek, ' .
                       'jum_cek, jum_cok, jum_sum, uku_sum, has_cek, nam_use ' .
                       ' values("' . 'cocok_' . $berkas . '", "' . $berkas . '", "' . 
                       date('Y-m-d H:i:s') .'", ' . $ukuranberkas . ', ' . $lama . ', ' .
                       $cek . ', ' . $cok . ', ' . $banyaksumber . ', "' . $ukurandatabase . 
                       '", ' . $pers . ', "' . $user . '");';
        $this->mysqli->query($kuerisimpan);
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
        $hasil = $this->mysqli->query($kueri);
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

