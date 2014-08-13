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

    public function lihatIsi($user)
    {
        $kembalian = '';
        $hitungan = 1;
        $kueri = 'select na_file, uk_file, ta_file from simpanan where na_user = "' . $user . '"';
        $hasil = $this->mysqli->query($kueri);
        while ($baris = $hasil->fetch_array()){
            $kembalian .= '<tr class=danger><td>' . $hitungan . '</td>' .
                          '<td>' . $baris['na_file'] . '</td> ' .
                          '<td>' . $baris['uk_file'] / 1024 . ' kb </td>' .
                          '<td>' . $baris['ta_file'] . '</td>' .
                          '<td> bentar </td></tr>';
            $hitungan++;
        }
        return $kembalian;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
    
}

?>
