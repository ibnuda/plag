<?php

require_once './config.php';
require_once './error_handler.php';

/**
 * Class KePHP
 * @author Ibnu
 */
class KePHP
{
	private $mMysqli;
	
    public function __construct()
    {
        $this->mMysqli = new mysqli(host, user, pass, debe);
    }
    function __destruct()
    {
        $this->mMysqli->close();
    }

    public function cekKeDB($kalimat)
    {
        $kalimat = $this->mMysqli->real_escape_string($kalimat);
        if ($kalimat == null) {
            return 0;
        }
        $asdf = 'select id_skrip, ju_skrip from skripsi where match(is_skrip) against (\'"' . $kalimat .
                '" @2 \' in natural language mode)';
        $kueri = $this->mMysqli->query($asdf);
        if ($this->mMysqli->affected_rows > 0) {
            $baris = $kueri->fetch_array(MYSQLI_ASSOC);
            if (strlen($kalimat) >= 60){
                $kalimat = substr($kalimat, 0, 60);
                $kalimat = $kalimat . '...';
            }
            return '<tr class="warning"><td>' . $kalimat . '</td><td>' . $baris['id_skrip'] . '</td><td>' . $baris['ju_skrip'] . '</td></tr>';
        } else {
            return "<tr class='warning'><td>" . $kalimat . "</td><td>null</td><td>null</td></tr>";
        } 
    }
	public function ngeprin($a, $b){
		$kek = $this->mMysqli->query('select id_skrip, ju_skrip from skripsi id_skrip between ' . $a . ' and ' . $b .';');
		$heem = $kek->fetch_array();
		return $heem['id_skrip'] . $heem['ju_skrip'];
	}
}

