<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'karyawan') {
    header("Location: ../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Karyawan</title>
    <style>
        body { font-family: Arial; margin: 0; background: #f5f5f5; }
        .header { background: #2980b9; color: white; padding: 15px; }
        .sidebar {
            background: #3498db; width: 200px; height: 100vh;
            position: fixed; top: 0; left: 0; padding-top: 60px;
        }
        .sidebar a {
            display: block; color: white; padding: 12px; text-decoration: none;
        }
        .sidebar a:hover { background: #2980b9; }
        .content {
            margin-left: 200px; padding: 20px;
        }
        .card {
            background: white; padding: 20px; border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1); margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h2 style="margin:0;">Dashboard Karyawan - PT Karsasoft</h2>
    </div>

    <div class="sidebar">
        <a href="dashboard_karyawan.php">Dashboard</a>
        <a href="absensi_karyawan.php">Absensi</a>
        <a href="gaji_karyawan.php">Lihat Gaji</a>
        <a href="../logout.php">Keluar</a>
    </div>

    <div class="content">
