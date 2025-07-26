<?php
session_start();
include '../config/koneksi.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    $query = mysqli_query($koneksi, "SELECT password FROM users WHERE id = '$id'");
    $data = mysqli_fetch_assoc($query);

    if (password_verify($old, $data['password'])) {
        if ($new === $confirm) {
            $new_hash = password_hash($new, PASSWORD_DEFAULT);
            mysqli_query($koneksi, "UPDATE users SET password = '$new_hash' WHERE id = '$id'");
            $msg = "<div class='alert alert-success'>Password berhasil diubah.</div>";
        } else {
            $msg = "<div class='alert alert-warning'>Konfirmasi password tidak cocok.</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Password lama salah.</div>";
    }
}

include 'header_admin.php';
?>

<div class="container mt-4" style="max-width: 600px;">
    <div class="card">
        <div class="card-header bg-warning text-white">
            <h5 class="mb-0">Ganti Password</h5>
        </div>
        <div class="card-body">
            <?= isset($msg) ? $msg : '' ?>
            <form method="POST">
                <div class="mb-3">
                    <label>Password Lama</label>
                    <input type="password" name="old_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="new_password" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" class="form-control" required>
                </div>
                <button type="submit" name="submit" class="btn btn-success">Simpan</button>
                <a href="profil.php" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<?php include 'footer_admin.php'; ?>
