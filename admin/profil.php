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

<div class="container">
    <h4 class="mb-4">Profil Admin</h4>

    <table class="table table-striped table-bordered" style="max-width:600px">
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

    <a href="ganti_password.php" class="btn btn-warning">Ganti Password</a>
</div>

<?php include 'footer_admin.php'; ?>
