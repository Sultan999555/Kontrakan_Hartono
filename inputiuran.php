<?php
session_start();

if (isset($_SESSION['login'])) {
    header("login.php");
    exit;
}
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);


$querypenghuni = mysqli_query($koneksi, "SELECT max(id_penghuni) as maxid_penghuni FROM rekam_iuran");
$r1 = mysqli_fetch_array($querypenghuni);
$maxidp = $r1["maxid_penghuni"];
$noidp = (string) substr($maxidp, 0, 4);
$noidp;
$maxidp = "" . sprintf("%03s", $noidp);

$title = "Rekam Iuran";
$main_url = "";
require_once "header.php";
require_once "navbar.php";
require_once "sidebar.php";

if(isset($_GET['msg'])){
    $msg=$_GET['msg'];
}else{
    $msg='';

}
$alert='';
if($msg='cancel'){
    $alert='';
}
?>

<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Rekam Iuran</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Rekam Iuran</li>
                <li class="breadcrumb-item active"><a href="outputiuran.php"></a></li>
                <li class="breadcrumb-item active">Tambah Iuran</a></li>
            </ol>
            <form action="koneksiiuran.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2">Tambah Iuran</span>
                        <button type="submit" nama='simpan' class="btn btn-primary float-end">Simpan</button>
                        <button type="reset" nama='reset' class="btn btn-primary float-end btn-danger">Reset</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8"></div>

                            <div class="mb-3 row">
                                <label for="id_penghuni" class="col-sm-2 col-form-label">ID Penghuni</label>
                                <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="id_penghuni" required class="form-control-plaintext 
                                    border-bottom ps-2" id="id_penghuni" value="<?= $maxidp ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Penghuni</label>
                                <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="nama" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="nama" value="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="no_kontrakan" class="col-sm-2 col-form-label">NO Kontrakan</label>
                                <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="no_kontrakan" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="no_kontrakan" value="">
                                </div>
                            </div>

                           
                            <div>
                                <div class="mb-3 row">
                                    <label for="iuran" class="col-sm-2 col-form-label">Iuran</label>
                                    <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left:-50px;">
                                        <input type="text" name="iuran" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="iuran" value="">
                                    </div>
                                </div>

                                <div>
                                <div class="mb-3 row">
                                    <label for="tanggal_bayar" class="col-sm-2 col-form-label">Tanggal Bayar</label>
                                    <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left:-50px;">
                                        <input type="text" name="tanggal_bayar" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="tanggal_bayar" value="">

                                    <div>
                                <div class="mb-3 row">
                                    <label for="keterangan" class="col-sm-2 col-form-label">keterangan</label>
                                    <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left:-50px;">
                                        <input type="text" name="keterangan" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="keterangan" value="">
                                
                                    </div>
                                </div>
                            </div>
            </form>
        </div>
    </main>

    <?php
    require_once "footer.php";

    ?>