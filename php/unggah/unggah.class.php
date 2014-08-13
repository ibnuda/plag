<?php

/**
 * Class Unggah
 * @author 
 */
class Unggah
{

    public function __construct($options)
    {
        // code
    }

    public function mulai()
    {
        $this->berkas_nama = null;
        $this->berkas_ekst = null;
    }

    public function unggahBerkas($berkas)
    {
        if ($this->cekUkuran($berkas)) {

        } else {
            return '<h3>gagal</h3>';
        }
    }
    function cekMime($berkas)
    {
        $finf = new finfo(FILEINFO_MIME);
        $mime = $finf->buffer(file_get_contents($berkas));
    }

    /*
    function cekUkur($berkas)
    {
        
    }
    function cekEkst($berkas)
    {
        
    }
    function simpanBerkas($berkas)
    {
    }
     */
}

