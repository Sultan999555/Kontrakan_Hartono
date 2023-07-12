<?php
session_start();

if (isset($_SESSION['login'])) {
    header("login.php");
    exit;
}
$namehost_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($namehost_db, $user_db, $pass_db, $nama_db);


$id_penghuni = mysqli_query($koneksi, "SELECT max(id_penghuni) as maxid_penghuni FROM data_penghuni");
$r1 = mysqli_fetch_array($id_penghuni);
$maxidp = $r1["maxid_penghuni"];
$noidp = (string) substr($maxidp, 0, 4);
$noidp;
$maxidp = "" . sprintf("%03s", $noidp);

$title = "Data Penghuni";
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
            <h1 class="mt-4">Tambah Penghuni</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active"><a href="datapenghuni.php"></a></li>
                <li class="breadcrumb-item active">Tambah Penghuni</a></li>
            </ol>
            <form action="prosespenghuni.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2">Tambah Peghuni</span>
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
                                <label for="nama_penghuni" class="col-sm-2 col-form-label">Nama Penghuni</label>
                                <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="nama_penghuni" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="nama_penghuni" value="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="no_kontrakan" class="col-sm-2 col-form-label">No Kontrakan</label>
                                <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <textarea type="text" name="no_kontrakan" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="no_kontrakan" value=""></textarea>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3 row">
                                    <label for="no_telp" class="col-sm-2 col-form-label">No Telepon</label>
                                    <label for="id_penghuni" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left:-50px;">
                                        <input type="text" name="no_telp" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="no_telp" value="">
                                    </div>
                                </div>
                                </div>
                            </div>
            </form>
        </div>
    </main>

    <?php
    require_once "footer.php";

    ?>