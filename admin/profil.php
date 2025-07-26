<?php
session_start();
include '../config/koneksi.php';

// Cek jika bukan admin
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Ambil data admin yang login
$id = $_SESSION['user_id'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$admin = mysqli_fetch_assoc($query);

// Include header
include 'header_admin.php';
?>

<div class="container mt-4" style="max-width: 700px;">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Profil Admin</h4>
        </div>
        <div class="card-body">
            <table class="table table-borderless">
                <tr>
                    <th>Username</th>
                    <td><?= htmlspecialchars($admin['username']); ?></td>
                </tr>
                <tr>
                    <th>Nama Lengkap</th>
                    <td><?= htmlspecialchars($admin['nama_lengkap']); ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= htmlspecialchars($admin['email']); ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><?= htmlspecialchars($admin['role']); ?></td>
                </tr>
            </table>
            <a href="ganti_password.php" class="btn btn-warning mt-3">Ganti Password</a>
        </div>
    </div>
</div>

<?php include 'footer_admin.php'; ?>
