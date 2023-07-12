<?php
session_start();
$host_db = "localhost";
$user_db = "root";
$pass_db = "";
$nama_db = "db_kontrakan";
$koneksi = mysqli_connect($host_db, $user_db, $pass_db, $nama_db);

if (isset($_GET['id'])) {
    $id_penghuni = $_GET['id']; // Get the id_penghuni value from the query parameter

    // Retrieve the record from the database based on the id_penghuni
    $query = "SELECT * FROM rekam_iuran WHERE id_penghuni = $id_penghuni";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "<script>
        alert('Invalid ID Penghuni');
        window.location.href = 'outputiuran.php';
    </script>";
    exit;
}

if (isset($_POST['bubah'])) {
    $nama = $_POST['tnama'];
    $no_kontrakan = $_POST['tnokontrakan'];
    $iuran = $_POST['tiuran'];
    $tanggal_bayar = $_POST['ttanggalbayar'];
    $keterangan = $_POST['tketerangan'];

    $query = "UPDATE rekam_iuran SET 
        nama = '$nama',
        no_kontrakan = '$no_kontrakan',
        iuran = '$iuran',
        tanggal_bayar = '$tanggal_bayar',
        keterangan = '$keterangan'
        WHERE id_penghuni = $id_penghuni";

    mysqli_query($koneksi, $query);

    echo "<script>
        alert('Data berhasil diubah');
        window.location.href = 'outputiuran.php';
    </script>";

    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Rekam Iuran</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Edit Rekam Iuran</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="fungsieditrekamiuran.php?id=<?= $id_penghuni ?>">
                        <input type="hidden" name="id_penghuni" value="<?= $id_penghuni ?>">
                        <div class="form-group">
                            <label for="tnama">Nama Penghuni</label>
                            <input type="text" class="form-control" id="tnama" name="tnama" value="<?= $data['nama'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tnokontrakan">Nomor Kontrakan</label>
                            <input type="text" class="form-control" id="tnokontrakan" name="tnokontrakan" value="<?= $data['no_kontrakan'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tiuran">Iuran</label>
                            <input type="text" class="form-control" id="tiuran" name="tiuran" value="<?= $data['iuran'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="ttanggalbayar">Tanggal Bayar</label>
                            <input type="date" class="form-control" id="ttanggalbayar" name="ttanggalbayar" value="<?= $data['tanggal_bayar'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="tketerangan">Keterangan</label>
                            <input type="text" class="form-control" id="tketerangan" name="tketerangan" value="<?= $data['keterangan'] ?>" required>
                        </div>
                        <button type="submit" name="bubah" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
