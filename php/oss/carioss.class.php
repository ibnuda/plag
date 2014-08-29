<?php

/**
 * Class CariOSS extends OssSearch
 * @author Ibnu
 */
//require_once './conf.php';
require_once './oss_search.class.php';
require_once './oss_results.class.php';
require_once './oss_api.class.php';

class CariOSS extends OssSearch
{
    protected $url ;//= 'http://localhost:9090';
    protected $indeks;// = 'qwer';                             //     protected $url = url;
    protected $login ;//= 'joni';                              //     protected $indeks = indeks;
    protected $kunciapi;// = 'fa92f21a01f42520817f955ca909fde'; //   protected $login = login;
    //protected $kunciapi = kunciapi;
    public function __construct()
    {
        $this->url = 'http://localhost:9090';                                                 
        $this->indeks = 'qwer';                             //     protected $url = url;       
        $this->login = 'joni';                              //     protected $indeks = indeks;
        $this->kunciapi = '9fa92f21a01f42520817f955ca909fde';
        $oss_api = new OssApi($this->url, $this->indeks, $this->login, $this->kunciapi);
        parent::__construct($this->url, $this->indeks, '', '', $this->login, $this->kunciapi);
    }
    public function cari($kalimat)
    {
        $hasilXML = $this->ambilXML($kalimat);
        return $this->renderKalimat($hasilXML);
        //var_dump($hasilXML);
    }

    public function ambilXML($kalimat)
    {
        $hasilXML = $this->query($kalimat)->lang('en')->template('aaaaaa')->rows(10)->execute(50);
        echo "ini apa coba";
        return $hasilXML;
    }
    
    public function renderKalimat($hasilXML)
    {
        $res = new OssResults($hasilXML);
        $kembalian = '';
        echo $kembalian;
        $panjang = $res->getResultRows();
        if ($panjang > 0 && $panjang < 3) {
            for ($i = 0; $i < $panjang; $i++) {
                $link = $res->getField($i, 'uri');
                $konten = $res->getField($i, 'content', true, true, null, true);
                $kembalian .= '<li>' . $link . '<br> - <em>' . $konten . '</em></li><br>';
                echo $kembalian;
            }
        } else if ($panjang >= 3) {
            for ($i = 0; $i < 3; $i++) {
                $link = $res->getField($i, 'uri');
                $konten = $res->getField($i, 'content', true, true, null, true);
                $kembalian .= '<li>' . $link . '<br> - <em>' . $konten . '</em></li><br>';
                echo $kembalian;
            }
        }
        return $kembalian;
    }

    public function bukaBerkas($namaBerkas)
    {
        $berkas = '../unggah/unggahan/' . $namaBerkas;
        //$berkas = $namaBerkas;
        $handle = fopen($berkas, 'r');
        $konten = fread($handle, filesize($berkas));
        fclose($handle);

        $konten = trim(preg_replace('/\s+/', ' ', $konten));
        $kalimat = preg_split('/(?<=[.?!])\s+(?=[a-z])/i', $konten);

        return $kalimat;
    }
}

