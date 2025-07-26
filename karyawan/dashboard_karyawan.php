<?php
session_start();

// Cek login dan role
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'karyawan') {
    header("Location: ../login.php");
    exit;
}

// Include header khusus karyawan
include 'header_karyawan.php';
?>

<h2>Selamat Datang, <?= $_SESSION['username']; ?>!</h2>

<div class="card">
    <h3>Status Kehadiran</h3>
    <p>Silakan lakukan absensi hari ini melalui menu Absensi.</p>
</div>

<div class="card">
    <h3>Informasi Gaji</h3>
    <p>Lihat rekap gaji Anda di menu "Lihat Gaji".</p>
</div>

<?php include 'footer_karyawan.php'; ?>
