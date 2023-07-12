<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

require_once "datakontrakan.php";

if (isset($_POST['bubah'])) {
    $no_kontrakan = $_POST['tnokontrakan'];
    $status_kontrak = $_POST['tstatuskontrak'];
    $lama_kontrak = $_POST['tlamakontrak'];
    $no_kontrakan_old = $_POST['no_kontrakan'];

    $query = "UPDATE data_kontrakan SET 
        no_kontrakan = '$no_kontrakan',
        status_kontrak = '$status_kontrak',
        lama_kontrak = '$lama_kontrak'
        WHERE no_kontrakan = '$no_kontrakan_old'";

    mysqli_query($koneksi, $query);

    echo "<script>
        alert('Data disimpan');
        window.location.href = 'datakontrakan.php';
    </script>";

    exit;
}
?>
