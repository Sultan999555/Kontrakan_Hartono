<?php
$title = "Data";
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
                                            <th scope="col">
                                                <center>ID Penghuni</center>
                                            </th>
                                            <th scope="col">
                                                <center>Nama</center>
                                            </th>
                                            <th scope="col">
                                                <center>No Kontrakan</center>
                                            </th>
                                            <th scope="col">
                                                <center>No Telepon</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $querypenghuni = mysqli_query($koneksi, "SELECT * FROM data_penghuni");
                                        while ($data = mysqli_fetch_array($querypenghuni)) {
                                            ?>
                                            <tr>
                                                <th scope="row">
                                                    <?= $no++ ?>
                                                </th>
                                                <td align="center">
                                                    <?= $data['id_penghuni'] ?>
                                                </td>
                                                <td align="center">
                                                    <?= $data['nama'] ?>
                                                </td>
                                                <td align="center">
                                                    <?= $data['no_kontrakan'] ?>
                                                </td>
                                                <td align="center">
                                                    <?= $data['no_telp'] ?>
                                                </td>
                                                <td align="center"><class="rounded-circle" width="60px" alt=""></td>
                                                <td align="center">
                                                    <button class="btn btn-sm btn-danger btnhapus" data-id="<?= $data['id_penghuni'] ?>"><i class="fa-solid fa-trash"></i></button>

                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal_<?= $data['id_penghuni'] ?>">
                                                        Edit
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editModal_<?= $data['id_penghuni'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Data Penghuni</h1>
                                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="fungsieditpenghuni.php">
                                                                        <input type="hidden" name="id_penghuni" value="<?= $data['id_penghuni'] ?>">
                                                                        <div class="modal-body">
                                                                            <label class="form-label">ID Penghuni</label>
                                                                            <input type="text" class="form-control" name="tid" value="<?= $data['id_penghuni'] ?>">
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label class="form-label">Nama Penghuni</label>
                                                                            <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>">
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label class="form-label">No Kontrakan</label>
                                                                            <input type="text" class="form-control" name="tnokontrakan" value="<?= $data['no_kontrakan'] ?>">
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <label class="form-label">No Telepon</label>
                                                                            <input type="text" class="form-control" name="tnotelp" value="<?= $data['no_telp'] ?>">
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
    $(document).ready(function () {
        $(document).on('click', '.btnhapus', function () {
            var idpegawai = $(this).data('id');
            if (confirm("Apakah Anda yakin ingin menghapus data?")) {
                window.location.href = "hapuspegawai.php?Id_Pegawai=" + idpegawai;
            }
        });
    });
</script>

<?php
require "footer.php";
?>