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
            background-color: #81131e;
            padding-top: 15px;
            transition: 0.3s;
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
            background-color: #6e0f19;
        }

        .treeview:hover .treeview-menu {
            display: block;
        }

        .treeview-menu a {
            padding-left: 30px;
        }

        #sidebarToggle {
            cursor: pointer;
        }

        .dropdown-profile {
            position: relative;
            display: inline-block;
        }

        .dropdown-card {
            display: none;
            position: absolute;
            right: 0;
            top: 45px;
            background: white;
            color: black;
            width: 250px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
            z-index: 999;
        }

        .dropdown-profile:hover .dropdown-card {
            display: block;
        }

        .dropdown-card p {
            margin: 0;
            padding: 8px 15px;
            border-bottom: 1px solid #eee;
        }

        .dropdown-card p:last-child {
            border-bottom: none;
        }

        @media (max-width: 768px) {
            .sidebar {
                display: none;
                position: absolute;
                z-index: 999;
                top: 60px;
                left: 0;
                width: 100%;
            }

            .sidebar.active {
                display: block;
            }

            .col-md-10 {
                margin-left: 0 !important;
            }
        }

        @media (min-width: 769px) {
            .sidebar.active {
                display: none;
            }
        }

        .dashboard-link {
            font-weight: bold;
            font-size: 16px;
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <!-- ✅ Header Atas -->
    <div class="row bg-danger text-white p-3 align-items-center justify-content-between">
        <div class="col-auto">
            <span id="sidebarToggle" class="fs-4">&#9776;</span>
            <span class="ms-3 fw-bold">Admin Panel - PT Karsasoft</span>
        </div>
        <div class="col-auto">
            <div class="dropdown-profile">
                <span class="fw-bold" style="cursor:pointer;"><i class="fas fa-user-circle"></i> <?= $_SESSION['username']; ?> <i class="fas fa-angle-down"></i></span>
                <div class="dropdown-card">
                    <p><strong>Username:</strong> <?= $_SESSION['username']; ?></p>
                    <p><strong>Email:</strong> <?= $_SESSION['email'] ?? '-'; ?></p>
                    <p><strong>Role:</strong> <?= $_SESSION['role']; ?></p>
                    <p><a href="/penggajian/admin/profil.php" class="text-decoration-none"><i class="fas fa-user-cog"></i> Profil</a></p>
                    <p><a href="/penggajian/admin/ganti_password.php" class="text-decoration-none"><i class="fas fa-key"></i> Ganti Password</a></p>
                    <p><a href="/penggajian/logout.php" class="text-danger text-decoration-none"><i class="fas fa-sign-out-alt"></i> Logout</a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- ✅ Sidebar -->
        <div class="col-md-2 sidebar" id="sidebar">
            <ul class="list-unstyled">
                <li><a href="/penggajian/admin/dashboard_admin.php" class="dashboard-link"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>

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
            </ul>
        </div>

        <!-- ✅ Konten Utama -->
        <div class="col-md-10 p-4" id="main-content">
