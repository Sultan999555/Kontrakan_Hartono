<?php
$title = "kontrakan";
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
            <h1 class="mt-4">Data Kontrakan</h1>
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
                                <span class="h5 my-2">Kontrakan</span>
                                <a href="<?= $main_url ?>kontrakan.php" class="btn btn-sm btn-primary float-end">Tambah Kontrak</a>
                            </div>
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col"><center>No Kontrakan</center></th>
                                            <th scope="col"><center>Status Kontrak</center></th>
                                            <th scope="col"><center>Lama Kontrak</center></th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $querykontrakan = mysqli_query($koneksi, "SELECT * FROM data_kontrakan");
                                        while ($data = mysqli_fetch_array($querykontrakan)) {
                                        ?>
                                            <tr>
                                                <th scope="row"><?= $no++ ?></th>
                                                <td align="center"><?= $data['no_kontrakan'] ?></td>
                                                <td align="center"><?= $data['status_kontrak'] ?></td>
                                                <td align="center"><?= $data['lama_kontrak'] ?></td>
                                                <td align="center">
                                                    <a href="editkontrakan.php" class="btn btn-sm btn-warning"><i class="fa-solid fa-pencil" title="Update kontrakan"></i></a>
                                                    <button class="btn btn-sm btn-danger btnhapus" data-id="<?= $data['no_kontrakan'] ?>"><i class="fa-solid fa-trash"></i></button>
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

<script>
    $(document).ready(function() {
        $(document).on('click', '.btnhapus', function() {
            var no_kontrakan= $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data?")) {
                window.location.href = "hapuskontrakan.php?no_kontrakan=" + no_kontrakan;
            }
        });
    });
</script>

<?php
require "footer.php";
?>