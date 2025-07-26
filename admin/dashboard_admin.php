<?php
session_start();
include '../config/koneksi.php';

// Cek jika bukan admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

include 'header_admin.php';
?>

<div class="container mt-4">
    <h3 class="mb-4">Dashboard Admin</h3>

    <div class="row">
        <!-- Total Karyawan -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-primary shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Total Karyawan</h5>
                    <p class="card-text fs-4 fw-bold">
                        <?php
                        $q = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM users WHERE role='karyawan'");
                        echo mysqli_fetch_assoc($q)['total'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Hadir Hari Ini -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-success shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Hadir Hari Ini</h5>
                    <p class="card-text fs-4 fw-bold">
                        <?php
                        $tanggal = date('Y-m-d');
                        $q = mysqli_query($koneksi, "SELECT COUNT(*) as hadir FROM absensi WHERE tanggal='$tanggal' AND status='Hadir'");
                        echo mysqli_fetch_assoc($q)['hadir'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Tidak Hadir Hari Ini -->
        <div class="col-md-4 mb-3">
            <div class="card text-bg-danger shadow-sm rounded-4">
                <div class="card-body">
                    <h5 class="card-title">Tidak Hadir Hari Ini</h5>
                    <p class="card-text fs-4 fw-bold">
                        <?php
                        $q = mysqli_query($koneksi, "SELECT COUNT(*) as absen FROM absensi WHERE tanggal='$tanggal' AND status IN ('Izin','Tidak Hadir','Cuti')");
                        echo mysqli_fetch_assoc($q)['absen'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer_admin.php'; ?>
