<?php
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_kontrakan";
$koneksi    = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

if (isset($_POST['bubah'])) {
    $id_penghuni = $_POST['tid'];
    $nama = $_POST['tnama'];
    $no_kontrakan = $_POST['tnokontrakan'];
    $tanggal_bayar = $_POST['ttanggalbayar'];
    $sewa = $_POST['tsewa'];
    $iuran = $_POST['tiuran'];
    $id_penghuni_old = $_POST['id_penghuni'];

    $query = "UPDATE data_sewa SET 
        id_penghuni     = '$id_penghuni',
        nama            = '$nama',
        no_kontrakan    = '$no_kontrakan',
        tanggal_bayar   = '$tanggal_bayar',
        sewa            = '$sewa',
        iuran           = '$iuran'
        WHERE id_penghuni = '$id_penghuni_old'";

    mysqli_query($koneksi, $query);

    echo "<script>
        alert('Data disimpan');
        window.location.href = 'outputsewa.php';
    </script>";

    exit;
}
?>
