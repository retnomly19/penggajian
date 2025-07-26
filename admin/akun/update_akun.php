<?php
session_start();
include '../config/koneksi.php';

$id = $_POST['id'];
$username = $_POST['username'];
$nama_lengkap = $_POST['nama_lengkap'];
$email = $_POST['email'];
$bagian = $_POST['bagian'];
$role = $_POST['role'];
$is_active = $_POST['is_active'];

$query = "UPDATE users SET 
    username = '$username',
    nama_lengkap = '$nama_lengkap',
    email = '$email',
    bagian = '$bagian',
    role = '$role',
    is_active = '$is_active'
WHERE id = $id";

if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_akun.php?status=updated");
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
