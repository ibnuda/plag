<?php

/**
 * Class Flu
 * @author John Doe
 */
class Flu
{
    protected $unggah_dest = './unggahan/';
    protected $destinasi = './unggahan/';
    protected $berkas_nama ;//= 'asdf.txt';
    protected $berkas_maks = '104857'; // 100 kb?
    protected $ekstensi = array('txt', 'html', 'htm');
    protected $cetak_error = true;
    protected $error = '';

    /*
    public function __construct($options)
    {
    }
     */

    public function setDestinasi($destinasi)
    {
        $this->unggah_dest = $destinasi;
    }

    public function setBerkasNama($namaBaru)
    {
        $this->berkas_nama = $namaBaru;
    }

    public function setBerkasMaks($ukuranBaru)
    {
        $this->berkas_maks == $ukuranBaru;
    }

    public function setCetakError($param)
    {
        $this->cetak_error = $param;
    }
    
    public function setEkstensi($ekstensiBaru)
    {
        if (is_aray($ekstensiBaru)) {
            $this->ekstensi = $ekstensiBaru;
        } else {
            $this->ekstensi = array($ekstensiBaru);
        }
    }

    public function unggahBerkas($berkas, $username, $jumlah)
    {
        $this->validasi($berkas);
        if ($this->error) {
            if ($this->cetak_error) {
                echo $this->error;
            }
        } else {
            //echo 'berhasil upload';
            //echo 'ekstensi berkas adalah "' . $this->ambilEkstensi($berkas) . '"<br>';
            //echo 'nama berkas adalah "' . $this->ambilNamaberkas($berkas) . '"';
            $this->setBerkasNama($username . '_' . $this->ambilNamaberkas($berkas) . '_' . $jumlah . '.txt');
            move_uploaded_file($berkas['tmp_name'],$this->destinasi.$this->berkas_nama); 
        }
    }
    
    /**
     * memeriksa apakah berkas sesuai dengan ekstensi yang ditentukan atau
     * tidak.
     * $berkas merupakan berkas yang diperiksa.
     * $komplain merupakan kegagalan dari pemeriksaan.
     */
    public function validasi($berkas)
    {
        $komplain = '';
        if (empty($berkas['name'][0])) {
            $komplain .= 'berkas tak tersedia.<br>';
        }
        if (!in_array($this->ambilEkstensi($berkas), $this->ekstensi)) {
            $komplain .= 'ekstensi tidak valid.<br>.';
            $komplain .= 'ekstensi berkas adalah "' . $this->ambilEkstensi($berkas) . '"';
        }
        if ($berkas['size'][0] > $this->berkas_maks) {
            $komplain .= 'berkas terlalu besar.<br>';
        }

        $this->error = $komplain;
    }

    /**
     * menentukan ekstensi berkas.
     * $berkas merupakan berkas yang diperiksa.
     * $kek merupakan kembalian dari ekstensi berkas.
     */
    public function ambilEkstensi($berkas)
    {
        $pathberkas = $berkas['name'];
        //$ekst = pathinfo($pathberkas, PATHINFO_EXTENSION);
        $ekst = pathinfo($pathberkas);
        $kek = $ekst['extension'];
        return $kek;
        //return $ekst['extension'];
    }

    /**
     * menentukan namaberkas berkas.
     * $berkas merupakan berkas yang diperiksa.
     * $kek merupakan kembalian dari nama berkas.
     */
    public function ambilNamaberkas($berkas)
    {
        $pathberkas = $berkas['name'];
        $nama = pathinfo($pathberkas);
        $kek = $nama['filename'];
        return $kek;
    }
    

    public function hapusBerkas($berkas)
    {
        if (file_exist($berkas)) {
            unlink($berkas) or $this->error .= 'masalah permisi direktori';
        } else {
            $this->error .= 'berkas tak ada.';
        }

        if ($this->error && $this->cetak_error) {
            echo $this->error;
        }
    }
    
}

