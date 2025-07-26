<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config/koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM users WHERE id=$id");
$data = mysqli_fetch_assoc($query);

include 'header_admin.php';
?>

<div class="container mt-4">
    <h4 class="mb-3">Edit Akun</h4>
    <form action="update_akun.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" value="<?= $data['username'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" class="form-control" value="<?= $data['nama_lengkap'] ?>">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?= $data['email'] ?>">
        </div>
        <div class="mb-3">
            <label>Bagian</label>
            <input type="text" name="bagian" class="form-control" value="<?= $data['bagian'] ?>">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control">
                <option value="admin" <?= $data['role'] == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="karyawan" <?= $data['role'] == 'karyawan' ? 'selected' : '' ?>>Karyawan</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Status Akun</label>
            <select name="is_active" class="form-control">
                <option value="1" <?= $data['is_active'] ? 'selected' : '' ?>>Aktif</option>
                <option value="0" <?= !$data['is_active'] ? 'selected' : '' ?>>Nonaktif</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href="kelola_akun.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'footer_admin.php'; ?>
