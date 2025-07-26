<?php
session_start();
include '../config/koneksi.php';

// Cek role
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'karyawan') {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user_id'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id = '$id'");
$karyawan = mysqli_fetch_assoc($query);

include 'header_karyawan.php';
?>

<div class="container">
    <h4 class="mb-4">Profil Saya (Karyawan)</h4>

    <table class="table table-bordered" style="max-width:600px">
        <tr>
            <th>Username</th>
            <td><?= htmlspecialchars($karyawan['username']); ?></td>
        </tr>
        <tr>
            <th>Nama Lengkap</th>
            <td><?= htmlspecialchars($karyawan['nama_lengkap']); ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= htmlspecialchars($karyawan['email']); ?></td>
        </tr>
        <tr>
            <th>Role</th>
            <td><?= htmlspecialchars($karyawan['role']); ?></td>
        </tr>
        <!-- Tambahkan data penting lain jika kamu punya tabel biodata -->
    </table>

    <a href="ganti_password.php" class="btn btn-warning">Ganti Password</a>
</div>

<?php include 'footer_karyawan.php'; ?>
