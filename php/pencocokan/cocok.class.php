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

    public function pencocokan($kalimat)
    {
        $kalimat = $this->sanitasiKalimat($kalimat);
        $kueri = 'select id_skrip from skripsi where match(is_skrip) ' .
                 ' against (\'"' . $kalimat . '" @2 \' in natural language mode)';
        $hasil = $this->mysqli->query($kueri);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $hasil->fetch_array(MYSQLI_ASSOC);
            /*
            if (strlen($kalimat) >= 60){
                $kalimat = substr($kalimat, 0, 60);
                $kalimat = $kalimat . '...';
            }*/
            return $baris['id_skrip'];
            //return '<tr class="danger"><td>' . $kalimat . '</td><td>' .
            //       $baris['id_skrip'] . '</td><td>' . $baris['ju_skrip'] . '</td></tr>';
        } else {
            return 0;
        }
        /* 
        else {
            return "<tr class='active'><td>" . $kalimat . "</td><td>null</td><td>null</td></tr>";
        }*/ 
    }
    
    public function sanitasiKalimat($kalimat)
    {
        $kalimat = stripslashes($kalimat);
        $kalimat = $this->mysqli->real_escape_string($kalimat);
        return $kalimat;
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
    
    public function tulisBerkasCocok($namaBerkas, $isiBerkas)
    {
        $berkas = './hasilCocok/cocok_' . $namaBerkas . '.php';
        if (!$handle = fopen($berkas, 'a')) {
            return 2;
            exit;
        }
        if (fwrite($handle, $isiBerkas) === FALSE) {
            echo "Cannot write to file ($filename)";
            return 1;
            exit;
        }
        return 0;
    }
    
}

