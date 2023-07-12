<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

if (isset($_GET["id_penghuni"])) {
    $idsup = $_GET["id_penghuni"];

    $hapus = mysqli_query($koneksi, "DELETE FROM data_sewa WHERE ID_Supplier='$idsup'");

    if ($hapus) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'outputsewa.php';
        </script>";
        exit;
    } else {
        echo "<script>
            alert('Data gagal dihapus');
            window.location.href = 'outputsewa.php';
        </script>";
        exit;
    }
}
