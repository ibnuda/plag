<?php

/**
 * Class Flu
 * @author John Doe
 */
class Flu
{
    protected $unggah_dest = './unggahan/';
    protected $berkas_nama = 'asdf.txt';
    protected $berkas_maks = '104857'; // 100 kb?
    protected $ekstensi = array('txt', 'html', 'htm');
    protected $cetak_error = true;
    protected $error = '';

    public function __construct($options)
    {
    }

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
            $this->setBerkasNama($username . '_' . $berkas . '_' . $jumlah . '.txt');
            move_uploaded_file($berkas['tmp_name'][0],$this->destinasi.$this->berkas_nama); 
        }
    }
    
    public function validasi($berkas)
    {
        $komplain = '';
        if (empty($berkas['name'][0])) {
            $komplain .= 'berkas tak tersedia.<br>';
        }
        if (!in_array($this->ambilEkstensi($berkas), $this->ekstensi)) {
            $komplain .= 'ekstensi tidak valid.<br>.';
        }
        if ($berkas['size'][0] > $this->berkas_maks) {
            $komplain .= 'berkas terlalu besar.<br>';
        }

        $this->error = $komplain;
    }

    public function ambilEkstensi($berkas)
    {
        $pathberkas = $berkas['name'][0];
        $ekst = pathinfo($pathberkas, PATHINFO_EXTENSION);
        return $ekst;
    }
}

