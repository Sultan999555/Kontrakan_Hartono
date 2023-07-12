<?php
session_start();
$host_db    = "localhost";
$user_db    = "root";
$pass_db    = "";
$nama_db    = "db_kontrakan";
$koneksi    = mysqli_connect($host_db,$user_db,$pass_db,$nama_db);


require_once "kontrakan.php";

if(!isset($_POST['simpan'])){
    $no_kontrakan = $_POST['no_kontrakan'];
    $status_kontrak = $_POST['status_kontrak'];
    $lama_kontrak = $_POST['lama_kontrak'];
   
    
    mysqli_query($koneksi,"INSERT INTO data_kontrakan VALUES ('$no_kontrakan','$status_kontrak','$lama_kontrak')");
   
    
   echo "<script>
   alert('Data Tersimpan');
   document.location.href = 'datakontrakan.php';

   </script>";
  
    return;
    
}
?>