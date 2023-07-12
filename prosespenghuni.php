<?php
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_kontrakan";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);


require_once "penghuni.php";

if(!isset($_POST['simpan'])){
    $id_penghuni = $_POST['id_penghuni'];
    $nama_penghuni = $_POST['nama_penghuni'];
    $no_kontrakan = $_POST['no_kontrakan'];
    $no_telp = $_POST['no_telp'];

    mysqli_query($koneksi,"INSERT INTO data_penghuni VALUES ('$id_penghuni','$nama_penghuni','$no_kontrakan',
    '$no_telp')");

echo "<script>
alert('Data Tersimpan');
document.location.href = 'datapenghuni.php';

</script>";

  
    return;
    
}
?>