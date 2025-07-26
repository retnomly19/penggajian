<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            height: 100vh;
            background-color: #81131eff;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #81131eff;
        }
    </style>
</head>
<body>

<div class="container-fluid">

    <!-- ✅ Header Atas -->
    <div class="row bg-danger text-white p-3">
        <div class="col">
            <h4 class="mb-0">Admin Panel - PT Karsasoft</h4>
            <small>Login sebagai: <strong><?= $_SESSION['username']; ?></strong></small>
        </div>
    </div>

    <div class="row">
        <!-- ✅ Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="dashboard_admin.php">Dashboard</a>
                <a href="akun_input.php">Input Akun</a>
                <a href="kelola_akun.php">Kelola Akun</a>
                <a href="bagian_input.php">Input Bagian</a>
                <a href="kelola_bagian.php">Kelola Bagian</a>
                <a href="karyawan_input.php">Input Karyawan</a>
                <a href="kelola_karyawan.php">Kelola Karyawan</a>
                <a href="profil.php">Profil</a>
                <a href="../logout.php">Keluar</a>

        </div>

        <!-- ✅ Konten -->
        <div class="col-md-10 p-4">
