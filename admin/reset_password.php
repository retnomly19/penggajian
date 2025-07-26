<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_GET['id'];
$password_baru = password_hash("karyawan123", PASSWORD_DEFAULT);

$query = mysqli_query($koneksi, "UPDATE users SET password='$password_baru' WHERE id=$id");

if ($query) {
    header("Location: kelola_akun.php?status=reset");
} else {
    echo "Gagal reset password: " . mysqli_error($koneksi);
}
