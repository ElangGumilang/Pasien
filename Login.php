<?php
session_start();

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pasien");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verifikasi login
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        // Login berhasil
        $_SESSION['username'] = $username;
        header("Location: pasien.php"); // Ganti dengan halaman setelah login berhasil
        exit();
    } else {
        // Login gagal
        echo "Username atau password salah!";
    }
}
?>
