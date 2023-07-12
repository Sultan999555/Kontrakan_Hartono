<?php
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_kontrakan";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);


require_once "outputsewa.php";

if(!isset($_POST['simpan'])){
    $id_penghuni = $_POST['id_penghuni'];
    $nama = $_POST['nama'];
    $no_kontrakan = $_POST['no_kontrakan'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $sewa = $_POST['sewa'];
    $iuran = $_POST['iuran'];
    

    mysqli_query($koneksi,"INSERT INTO data_sewa VALUES ('$id_penghuni','$nama','$no_kontrakan',
    '$tanggal_bayar','$sewa','$iuran')");
   
    
   echo "<script>
   alert('Data Tersimpan');
   document.location.href = 'outputsewa.php';

   </script>";
  
    return;
    
}
?>