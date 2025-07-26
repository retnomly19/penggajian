<?php
include '../../config/koneksi.php';

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$nama = $_POST['nama_lengkap'];
$email = $_POST['email'];
$role = $_POST['role'];
$is_active = $_POST['is_active'];

$query = "INSERT INTO users (username, password, nama_lengkap, email, role, is_active)
          VALUES ('$username', '$password', '$nama', '$email', '$role', $is_active)";
mysqli_query($koneksi, $query);

header("Location: kelola_akun.php");
