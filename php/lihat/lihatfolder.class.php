<?php

include_once '../conf/config.php';
include_once '../conf/error_handler.php';

/**
 * Class LihatFolder
 * @author John Doe
 */
class lihatFolder
{
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new mysqli(host, user, pass, debe);
    }

    public function lihatIsi($user)
    {
        $kembalian = '';
        $kueri = 'select na_file, uk_file, ta_file from simpanan where na_user = "' . $user . '"';
        /*
        while ($hasil = $mysqli->query($kueri)) {
            $kembalian .= '<tr class=danger><td>' . $hasil['na_file'] . '</td> ' .
                          '<td>' . $hasil['uk_file'] . '</td>' .
                          '<td>' . $hasil['ta_file'] . '</td>' .
                          '<td> bentar </td></tr>';
        }
        //$hasil = $this->mysqli->query($kueri);
        //return $kembalian;
         */
        return $kueri;
    }

    public function __destruct()
    {
        $this->mysqli->close();
    }
    
}

?>
