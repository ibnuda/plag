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
     * $berkas = tmp_name.
     */
    public function catatBerkasUser($user, $berkas, $ukuran)
    {
        // ambil id_user.
        $username = $this->sanitasiParameter($user);
        $id_user = 0;
        $id_file = 0;
        $kueri0 = 'select id_user from user where nama="' . $username . '";';
        $hasil0 = $this->mysqli->query($kueri0);
        while ($baris = $hasil0->fetch_array()) {
          $id_user = $baris['id_user'];
        }

        //simpan data berkas ke tabel berkas.
        $nama_berkas = $username . "_" . date('Ymd_His') . '_' . 
                $this->cekJumlahSimpan($username) .".txt";


        move_uploaded_file($berkas, "../unggah/unggahan/" . $nama_berkas);
        //echo $berkas; exit;

        $kueri1 = 'insert into berkas (nama_file, ukuran_file) values("' .
            $nama_berkas . '", ' . $ukuran . ');';
        $this->mysqli->query($kueri1);

        $kueri15 = 'select id_file from berkas where nama_file = "' .
                    $nama_berkas . '";';
        $hasil15 = $this->mysqli->query($kueri15);
        while ($baris = $hasil15->fetch_array()) {
            $id_file = $baris['id_file'];
        }

        // catat ke tabel penyimpanan.
        $kueri2 = 'insert into penyimpanan values("' .
            $id_user . '", "' . $id_file . '", "' . date('Y-m-d H:i:s') . '", 0);';
        $this->mysqli->query($kueri2);

        // update jumlah simpanan
        $kueri3 = 'update user set simpanan = simpanan + 1 where id_user=' . $id_user . ';';
        $this->mysqli->query($kueri3);

        /*
        $jumlah_simpanan = $this->cekJumlahSimpan($user);
        $nama_berkas = $user . '_' . $berkas . '_' . $jumlah_simpanan . '.txt';

        //$berkas = $namaBerkas;
        $handle = fopen($nama_berkas, 'r');
        $konten = fread($handle, filesize($berkas));
        fclose($handle);


        $kueri1 = 'insert into penyimpanan (id_user, id_file, tanggal_unggah, ukuran) values(' .
                 '"' . $user . '", "' . $berkas .'", ' . $ukuran .', "' . date('Y-m-d H:i:s') .'");';
        echo $kueri . '<br>';
        $this->mysqli->query($kueri);
        $kueri2 = 'update luser set simpanan=simpanan+1 where nama = "' . $user . '";';
        $this->mysqli->query($kueri2);
        */
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
    public function catatPencocokanUser($user, $berkas, $id_skrip, $kalimat)
    {
        $id_user = 0;
        $id_file = 0;
        $kueri0 = 'select id_user from user where nama="' . $user . '";';
        $hasil0 = $this->mysqli->query($kueri0);
        while ($baris = $hasil0->fetch_array()) {
          $id_user = $baris['id_user'];
        }

        $kueri1 = 'select id_file from berkas where nama_file = "' . $berkas . '";';
        $hasil1 = $this->mysqli->query($kueri1);
        while ($baris = $hasil1->fetch_array()) {
            $id_file = $baris['id_file'];
        }

        $no_log = $id_user . '_' . $id_file . '_' . date('Ymd');

        $kueri2 = 'insert into log (id_log, id_file, id_skrip, kalimat) ' .
                  'values("' . $no_log . '", ' . $id_file . ', ' . $id_skrip . ', "' .
                   $kalimat . '");';
        
        $this->mysqli->query($kueri2);

        /*
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
        $kuerisimpan = 'insert into log (nam_log, nam_fil, tan_fil, uku_fil, lam_cek, ' .
                       'jum_cek, jum_cok, jum_sum, uku_sum, has_cek, nam_use)' .
                       ' values("' . 'cocok_' . $berkas . '", "' . $berkas . '", "' . 
                       date('Y-m-d H:i:s') .'", ' . $ukuranberkas . ', ' . $lama . ', ' .
                       $cek . ', ' . $cok . ', ' . $banyaksumber . ', "' . $ukurandatabase . 
                       '", ' . $pers . ', "' . $user . '");';
        $this->mysqli->query($kuerisimpan);
        */
        $kueri = 'update penyimpanan set status_cek = 1 where id_file=' . $id_file ;
        $this->mysqli->query($kueri);
        return $no_log;
    }
    
    public function updatePencocokanUser($no_log, $jum_cek, $jum_cok, $pers, $lama, $jam)
    {
        
        $kueri3 = 'select table_schema, sum(data_length + index_length) / 1024 / 1024 "ukuran" ' .
                  'from information_schema.tables where table_schema="artikel";';
        $hasil3 = $this->mysqli->query($kueri3);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil3->fetch_array();
            $ukurandatabase = $baris['ukuran'];
        } else {
            $ukurandatabase = 0;
        }

        // ambil jumlah skripsi sumber.
        $kueri4 = 'select count(id_skrip) as jumlahsumber from skripsi';
        $hasil4 = $this->mysqli->query($kueri4);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil4->fetch_array();
            $banyaksumber = $baris['jumlahsumber'];
        } else {
            $banyaksumber = 0;
        }

        $kueriy = 'update log set jumlah_cek=' . $jum_cek . ', jumlah_cocok=' . $jum_cok .
            ', persentase="' . $pers . '", lama_cek="' . $lama . '", waktu_pengecekan="' . $jam .
            '", jumlah_sumber=' . $banyaksumber . ', ukuran_sumber="' . $ukurandatabase .
            '" where id_log="' . $no_log . '";';
        $this->mysqli->query($kueriy);
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

        $kueri = 'insert into user (nama, pass) values ("' . $username . '", "' . $password . '");';
        $hasil = $this->mysqli->query($kueri);
        if ($this->mysqli->affected_rows > 0) {
            return 'oke';
        } else {
            return 'gagal';
        }
    }

    public function cekJumlahSimpan($user)
    {
        $username = $this->sanitasiParameter($user);
        $kueri = 'select simpanan from user where nama = "' . $user . '";';
        $hasil = $this->mysqli->query($kueri);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil->fetch_array();
            return $baris['simpanan'];
        } else {
            return 0;
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

