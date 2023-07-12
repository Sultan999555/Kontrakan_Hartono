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


$querypenghuni = mysqli_query($koneksi, "SELECT max(no_kontrakan) as maxno_kontrakan FROM data_kontrakan");
$r1 = mysqli_fetch_array($querypenghuni);
$maxnok = $r1["maxno_kontrakan"];
$nonok = (string) substr($maxnok, 0, 4);
$nonok;
$maxnok = "" . sprintf("%03s", $nonok);

$title = "Data Kontrakan";
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
            <h1 class="mt-4">Data Kontrakan</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
                <li class="breadcrumb-item active"><a href="datakontrakan.php"></a></li>
                <li class="breadcrumb-item active">Tambah Kontrak</a></li>
            </ol>
            <form action="koneksikontrakan.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2">Tambah Kontrak</span>
                        <button type="submit" nama='simpan' class="btn btn-primary float-end">Simpan</button>
                        <button type="reset" nama='reset' class="btn btn-primary float-end btn-danger">reset</button>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-8"></div>

                            <div class="mb-3 row">
                                <label for="no_kontrakan" class="col-sm-2 col-form-label">No Kontrakan</label>
                                <label for="no_kontrakan" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="no_kontrakan" required class="form-control-plaintext 
                                    border-bottom ps-2" id="no_kontrakan" value="<?= $maxnok ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="status_kontrak" class="col-sm-2 col-form-label">Status Kontrak</label>
                                <label for="no_kontrakan" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="status_kontrak" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="status_kontrak" value="">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="lama_kontrak" class="col-sm-2 col-form-label">Lama Kontrak</label>
                                <label for="no_kontrakan" class="col-sm-1 col-form-label">:</label>
                                <div class="col-sm-9" style="margin-left:-50px;">
                                    <input type="text" name="lama_kontrak" required class="form-control-plaintext 
                                    border-0 border-bottom ps-2" id="lama_kontrak" value="">
                                </div>
                            </div>
            </form>
        </div>
    </main>

    <?php
    require_once "footer.php";

    ?>