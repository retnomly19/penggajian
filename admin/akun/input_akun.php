<?php
session_start();
include '../../config/koneksi.php';
include '../header_admin.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $is_active = 1;

    $query = mysqli_query($koneksi, "INSERT INTO users (username, password, nama_lengkap, email, role, is_active) VALUES ('$username', '$password', '$nama_lengkap', '$email', '$role', '$is_active')");

    if ($query) {
        echo "<script>alert('Akun berhasil ditambahkan!'); window.location='kelola_akun.php';</script>";
    } else {
        echo "<script>alert('Gagal menambahkan akun!');</script>";
    }
}
?>

<div class="container">
    <h4>Input Akun Baru</h4>
    <form method="post">
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" required class="form-control">
        </div>
        <div class="mb-3">
            <label>Role</label>
            <select name="role" class="form-control" required>
                <option value="karyawan">Karyawan</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include '../footer_admin.php'; ?>
