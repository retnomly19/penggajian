<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config/koneksi.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .sidebar {
            background-color: #81131eff;
            height: 100vh;
        }
        .sidebar a {
            color: white;
            display: block;
            padding: 10px;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #a21628;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <!-- Header -->
    <div class="row bg-danger text-white p-3">
        <div class="col">
            <h2 class="mb-0">Dashboard Admin - PT Karsasoft</h2>
            <small>Login sebagai: <?= $_SESSION['username']; ?></small>
        </div>
    </div>

    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar">
            <a href="../dashboard_admin.php">Dashboard</a>
            <a href="../akun/input_akun.php">Input Akun</a>
            <a href="../akun/kelola_akun.php">Kelola Akun</a>
            <a href="../bagian/input_bagian.php">Input Bagian</a>
            <a href="../bagian/kelola_bagian.php">Kelola Bagian</a>
            <a href="../karyawan/input_karyawan.php">Input Karyawan</a>
            <a href="../karyawan/kelola_karyawan.php">Kelola Karyawan</a>
            <a href="../absensi/input_absensi.php">Absensi</a>
            <a href="../penggajian/input_gaji.php">Penggajian</a>
            <a href="../tunjangan/tunjangan.php">Tunjangan</a>
            <a href="../profil.php">Profil</a>
            <a href="../logout.php">Keluar</a>
        </div>

        <!-- Konten -->
        <div class="col-md-10 p-4">
            <h3>Selamat Datang, <?= $_SESSION['username']; ?></h3>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card border-primary">
                        <div class="card-body">
                            <h5 class="card-title">Total Karyawan</h5>
                            <p class="card-text">
                                <?php
                                $q = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM users WHERE role='karyawan'");
                                echo mysqli_fetch_assoc($q)['total'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-success">
                        <div class="card-body">
                            <h5 class="card-title">Hadir Hari Ini</h5>
                            <p class="card-text">
                                <?php
                                $tanggal = date('Y-m-d');
                                $q = mysqli_query($koneksi, "SELECT COUNT(*) as hadir FROM absensi WHERE tanggal='$tanggal' AND status='Hadir'");
                                echo mysqli_fetch_assoc($q)['hadir'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <div class="card border-danger">
                        <div class="card-body">
                            <h5 class="card-title">Tidak Hadir Hari Ini</h5>
                            <p class="card-text">
                                <?php
                                $q = mysqli_query($koneksi, "SELECT COUNT(*) as absen FROM absensi WHERE tanggal='$tanggal' AND status IN ('Izin','Tidak Hadir','Cuti')");
                                echo mysqli_fetch_assoc($q)['absen'];
                                ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div> <!-- /row -->
        </div> <!-- /col -->
    </div> <!-- /row -->
</div> <!-- /container -->

</body>
</html>
