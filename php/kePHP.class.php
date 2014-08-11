<?php

require_once './config.php';
require_once './error_handler.php';

/**
 * Class KePHP
 * @author Ibnu
 */
class KePHP
{
	private $mysqli;
	
    public function __construct()
    {
        $this->mysqli = new mysqli(host, user, pass, debe);
    }
    function __destruct()
    {
        $this->mysqli->close();
    }

    public function cekKeDB($kalimat)
    {
        $kalimat = $this->mysqli->real_escape_string($kalimat);
        if ($kalimat == null) {
            return 0;
        }
        $asdf = 'select id_skrip, ju_skrip from skripsi where match(is_skrip) against (\'"' . $kalimat .
                '" @2 \' in natural language mode)';
        $kueri = $this->mysqli->query($asdf);
        if ($this->mysqli->affected_rows > 0) {
            $baris = $kueri->fetch_array(MYSQLI_ASSOC);
            if (strlen($kalimat) >= 60){
                $kalimat = substr($kalimat, 0, 60);
                $kalimat = $kalimat . '...';
            }
            return '<tr class="danger"><td>' . $kalimat . '</td><td>' . $baris['id_skrip'] . '</td><td>' . $baris['ju_skrip'] . '</td></tr>';
        } else {
            return "<tr class='active'><td>" . $kalimat . "</td><td>null</td><td>null</td></tr>";
        } 
    }
    public function simpanKeDB($teks)
    {
        $teks = $this->mysqli->real_escape_string($teks);
        if ($teks === null) {
            exit();
        }
        $kueri = 'insert into carian (
    }
    
}

