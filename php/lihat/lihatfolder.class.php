<?php

include_once '../conf/config.php';
include_once '../conf/error_handler.php';

/**
 * Class LihatFolder
 * @author John Doe
 */
class lihatfolder
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(host, user, pass, debe);
    }

    public function lihatUnggahan($user)
    {
        $kembalian = '';
        $hitungan = 1;
        $kueri = 'select na_file, uk_file, ta_file, st_cek from simpanan where na_user = "' . $user . '"';
        $hasil = $this->mysqli->query($kueri);
        while ($baris = $hasil->fetch_array()){
            $kembalian .= '<tr class=active><td>' . $hitungan . '</td>' .
                          '<td>' . $baris['na_file'] . '</td> ' .
                          '<td>' . $baris['uk_file'] / 1024 . ' kb </td>' .
                          '<td>' . $baris['ta_file'] . '</td>'; 
            if ($baris['st_cek'] == 0) {
                $kembalian .= '<td><a href="../pencocokan/cocok.php?teks=' . $baris['na_file'] . '">bandingkan</a></td></tr>';
            } else {
                $kembalian .= '<td> rencananya akan pindah ke tab lihat. </td></tr>';
            }
            $hitungan++;
        }
        return $kembalian;
    }

    public function lihatPencocokan($user)
    {
        $kembalian = null;
        $hitungan = 1;
        $kueri = 'select nam_fil, tan_fil, jum_cek, jum_cok, jum_sum, has_cek from log where nam_use ="' . $user .'";';
        $hasil = $this->mysqli->query($kueri);
        while ($baris = $hasil->fetch_array()) {
            $kembalian .= '<tr class=active><td>' . $hitungan . '</td>' .
                          '<td>' . $baris['nam_fil'] . '</td>' .
                          '<td>' . $baris['tan_fil'] . '</td>' .
                          '<td>' . $baris['jum_cek'] . '</td>' .
                          '<td>' . $baris['jum_cok'] . '</td>' .
                          '<td>' . $baris['jum_sum'] . '</td>' .
                          '<td>' . $baris['has_cek'] . '</td></tr>';
        }
        if ($kembalian !== null) {
            return $kembalian;
        } else {
            return '<tr><td></td><td>belum mencocokkan</td></tr>';
        }
    }
    

    public function __destruct()
    {
        $this->mysqli->close();
    }
    
}

?>
