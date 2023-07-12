<?php
$title = "penghuni";
$main_url = "";
$main_ur = "";
$data = "";
require_once "header.php";
require_once "navbar.php";
require_once "sidebar.php";

$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

?>
<div id="layoutSidenav_content">
    <main>

        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penghuni</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>

        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card master">
                        <div class="card">
                            <div class="card-header">
                                <span class="h5 my-2">Penghuni</span>
                                <a href="<?= $main_url ?>penghuni.php" class="btn btn-sm btn-primary float-end">Tambah Penghuni</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><center>ID Penghuni</center></th>
                                            <th scope="col"><center>Nama Penghuni</center></th>
                                            <th scope="col"><center>No Kontrakan</center></th>
                                            <th scope="col"><center>No Telepon</center></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $querypenghuni = mysqli_query($koneksi, "SELECT * FROM data_penghuni");
                                        while ($data = mysqli_fetch_array($querypenghuni)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td align="center"><?= $data['id_penghuni'] ?></td>
                                                <td align="center"><?= $data['nama'] ?></td>
                                                <td align="center"><?= $data['no_kontrakan'] ?></td>
                                                <td align="center"><?= $data['no_telp'] ?></td>
                                                
                                                    <a href="editpenghuni.php" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil" title="Update Penghuni"></i></a>
                                                    <button class="btn btn-sm btn-danger btnhapus" data-id="<?= $data['id_penghuni'] ?>"><i class="fa-solid fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>



<?php
require "footer.php";
?>