<?php
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_kontrakan";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);


require_once "outputiuran.php";

if(!isset($_POST['simpan'])){
    $id_penghuni = $_POST['id_penghuni'];
    $nama = $_POST['nama'];
    $no_kontrakan = $_POST['no_kontrakan'];
    $iuran = $_POST['iuran'];
    $tanggal_bayar = $_POST['tanggal_bayar'];
    $keterangan = $_POST['keterangan'];
   
    

    mysqli_query($koneksi,"INSERT INTO rekam_iuran VALUES ('$id_penghuni','$nama','$no_kontrakan','$iuran','$tanggal_bayar','$keterangan')");
   
    
   echo "<script>
   alert('Data Tersimpan');
   document.location.href = 'outputiuran.php';

   </script>";
  
    return;
    
}
?>