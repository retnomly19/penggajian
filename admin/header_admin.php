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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background: #f8f9fa; }
        .sidebar {
            height: 100vh;
            background-color: #81131eff;
            padding-top: 15px;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 12px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #6e0f19;
        }
        .treeview-menu {
            display: none;
            background-color: #971828;
        }
        .treeview:hover .treeview-menu {
            display: block;
        }
        .treeview-menu a {
            padding-left: 30px;
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
            <ul class="list-unstyled">

                <li class="treeview">
                    <a href="#"><i class="fas fa-user-shield"></i> Akun <i class="fas fa-angle-down float-end"></i></a>
                    <ul class="treeview-menu list-unstyled">
                        <li><a href="/penggajian/admin/akun/input_akun.php">Input Akun</a></li>
                        <li><a href="/penggajian/admin/akun/kelola_akun.php">Kelola Akun</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fas fa-building"></i> Bagian <i class="fas fa-angle-down float-end"></i></a>
                    <ul class="treeview-menu list-unstyled">
                        <li><a href="/penggajian/admin/bagian/input_bagian.php">Input Bagian</a></li>
                        <li><a href="/penggajian/admin/bagian/kelola_bagian.php">Kelola Bagian</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fas fa-users"></i> Karyawan <i class="fas fa-angle-down float-end"></i></a>
                    <ul class="treeview-menu list-unstyled">
                        <li><a href="/penggajian/admin/karyawan/input_karyawan.php">Input Karyawan</a></li>
                        <li><a href="/penggajian/admin/karyawan/kelola_karyawan.php">Kelola Karyawan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="/penggajian/admin/profil.php"><i class="fas fa-user-cog"></i> Profil Admin</a>
                </li>

            </ul>
        </div>

        <!-- ✅ Konten Utama -->
        <div class="col-md-10 p-4">
