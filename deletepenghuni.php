<?php
    include "prosespenghuni.php";
    $id = $_GET['data_penghuni'];
    $ambilData = mysqli_query($koneksi, "DELETE FROM db_kontrakan WHERE data_penghuni='$id'");
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/WEB/datapenghuni.php'>";
?>