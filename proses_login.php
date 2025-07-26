<?php
session_start();
include 'config/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $query = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username' AND is_active=1");
    $user = mysqli_fetch_assoc($query);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirect berdasarkan role
        if ($user['role'] === 'admin') {
            header("Location: admin/dashboard_admin.php");
        } else {
            header("Location: karyawan/dashboard_karyawan.php");
        }
        exit;
    } else {
        $_SESSION['error'] = "Username atau password salah!";
        header("Location: login.php");
        exit;
    }
} else {
    echo "Akses tidak valid.";
}
