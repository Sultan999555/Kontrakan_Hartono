<?php
// Koneksi ke database (misalnya menggunakan MySQLi)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "db_kontrakan";
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Query untuk memeriksa keberadaan username dan password yang valid dalam database
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Jika login berhasil, simpan informasi login dan arahkan ke dashboard
        session_start();
        $_SESSION["username"] = $username;
        header("Location: dashboard.php");
    } else {
        // Jika login gagal, tampilkan pesan kesalahan
        echo "Username atau password salah.";
    }
}

$conn->close();
?>