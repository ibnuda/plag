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
        $id_user = 0; 
        $kueri0 = 'select id_user from user where nama="' . $user . '";';

        $hasil0 = $this->mysqli->query($kueri0);
        while ($baris = $hasil0->fetch_array()) {
          $id_user = $baris['id_user'];
        }
        //echo $id_user;

        if ($id_user == 5) {
          $kueri1 = 'select berkas.nama_file, penyimpanan.id_file, tanggal_unggah, ' .
                    'status_cek, ukuran_file from user, penyimpanan, berkas where ' .
                    ' 1 = 1 and ' .
                    'penyimpanan.id_file = berkas.id_file and user.id_user = penyimpanan.id_user';
        } else {
          $kueri1 = 'select berkas.nama_file, penyimpanan.id_file, tanggal_unggah, ' .
                    'status_cek, ukuran_file from user, penyimpanan, berkas where ' .
                    'penyimpanan.id_user=' . $id_user . ' and ' .
                    'penyimpanan.id_file = berkas.id_file and user.id_user = penyimpanan.id_user';
        }
        

        //$kueri1 = 'select id_file, na_file, tanggal_unggah, status_cek from penyimpanan where id_user =' . $id_user . '" and penyimpanan.id_file=berkas.id_file";';

        $hasil1 = $this->mysqli->query($kueri1);
        while ($baris = $hasil1->fetch_array()){
            $kembalian .= '<tr class=active><td>' . $hitungan . '</td>' .
                          //'<td id="' . $baris['na_file'] .'">' . $baris['na_file'] . '</td> ' .
                          //'<td id="' . $baris['na_file'] .'">' . $baris['na_file'] . '</td> ' .
                          '<td>' . $baris['nama_file'] . '</td> ' .
                          '<td>' . $baris['ukuran_file'] / 1024 . ' kb </td>' .
                          '<td>' . $baris['tanggal_unggah'] . '</td>'; 
            if ($baris['status_cek'] == 0) {
                //$kembalian .= '<td><a href="../pencocokan/cocok.php?teks=' . $baris['na_file'] . '">bandingkan</a></td></tr>';
                $nama_berkas = substr($baris['nama_file'], 0, -4);
                $kembalian .= '<td><input type="button" onclick="mulai(\'' . $nama_berkas . '\')" value="Cocokkan" /></td></td>';
            } else {
                //$kembalian .= '<td> rencananya akan pindah ke tab lihat. </td></tr>';
                $nama_berkas = substr($baris['nama_file'], 0, -4);
                //$kembalian .= '<td><input type="button" onclick="mulai(\'' . $nama_berkas . '\')" value="Cocokkan" /></td></td>';
                $kembalian .= '<td><a class="baten" href="/plag/php/pencocokan/index.php">Lihat</a></td></tr>';
            }
            $hitungan++;
        }
        return $kembalian;
    }

    public function lihatPencocokan($user)
    {
        $id_user = 0;
        $id_file = 0;
        $itungan = 0;
        $kueri0 = 'select id_user from user where nama="' . $user . '";';
        $hasil0 = $this->mysqli->query($kueri0);
        while ($baris = $hasil0->fetch_array()) {
          $id_user = $baris['id_user'];
        }

        if ($id_user == 5) {
          $kueri = 'select distinct(id_log), id_file, waktu_pengecekan, waktu_pengecekan, jumlah_cek, jumlah_cocok, jumlah_sumber, persentase from log where 1 = 1';
        } else {
          $kueri = 'select distinct(id_log), id_file, waktu_pengecekan, waktu_pengecekan, jumlah_cek, jumlah_cocok, jumlah_sumber, persentase from log where id_log like "' . $id_user . '%"';
          # code...
        }
        
        $hasil = $this->mysqli->query($kueri);

        while ($baris = $hasil->fetch_array()) {
          $kuerix = 'select nama_file from berkas where id_file="' . $baris['id_file'] . '";';
          $lel = $this->mysqli->query($kuerix);
          while ($kek = $lel->fetch_array()) {
            $nama_berkas = $kek['nama_file'];
          }
          echo '<tr class=active> ' . 
               '<td>' . ($itungan + 1) . '</td>' .
               '<td>' . $nama_berkas . '</td>' .
               '<td>' . $baris['waktu_pengecekan'] . '</td>' .
               '<td>' . $baris['jumlah_cocok'] . '</td>' .
               '<td>' . $baris['jumlah_cek'] . '</td>' .
               '<td>' . $baris['jumlah_sumber'] . '</td>' .
               '<td>' . $baris['persentase'] * 100 . '% </td>' .
               '<td><a class="baten" href="/plag/php/lihat/index.php?asdf=' . $baris['id_log'] . '">Lihat</a></td>';
          $itungan++;
        }
        /*
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
                          '<td>' . $baris['has_cek'] . '</td>' .
                          /*
                          '<td><a href="../lihat/index.php?yangDiLihat=cocok_' . $baris['nam_fil'] . '.php">Lihat</a></td></tr>';
                          //'<input type="button" onclick="mulai(' . $baris['nama_fil'] . ')" value="mulai!" />';
                          '<td><a href="../lihat/index.php?yangDiLihat=cocok_' . $baris['nam_fil'] . '.php">Lihat</a></td></tr>';

            $hitungan++;
        }
        if ($kembalian !== null) {
            return $kembalian;
        } else {
            return '<tr><td></td><td>belum mencocokkan</td></tr>';
        }
                           */
    }
    

    public function __destruct()
    {
        $this->mysqli->close();
    }
    
    /*
    public function lihatHasil($id_log)
    {
        $kueri = 'select skripsi.ju_skrip, skripsi.id_skrip, ' .
           'kalimat FROM `skripsi`, log WHERE id_log="' .
            $id_log . '" and skripsi.id_skrip = log.id_skrip ';
        $hasil = $mysq->query($kueri);
        while ($baris = $hasil->fetch_array()) {
            echo '<tr class="active"><td>' . $baris['kalimat'] . '</td>' .
                 '<td>' . $baris['id_skrip'] . '</td>' .
                 '<td>' . $baris['ju_skrip'] . '</td></tr>';
        }

    }
    */
}

?>
