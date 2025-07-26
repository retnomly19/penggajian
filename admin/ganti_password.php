<?php
session_start();
include '../config/koneksi.php';

if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}

$id = $_SESSION['user_id'];
$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $lama = $_POST['password_lama'];
    $baru = $_POST['password_baru'];
    $ulang = $_POST['konfirmasi_password'];

    $cek = mysqli_query($koneksi, "SELECT password FROM users WHERE id = $id");
    $data = mysqli_fetch_assoc($cek);

    if (!password_verify($lama, $data['password'])) {
        $status = 'salah';
    } elseif ($baru !== $ulang) {
        $status = 'konfirmasi';
    } else {
        $baru_hash = password_hash($baru, PASSWORD_DEFAULT);
        mysqli_query($koneksi, "UPDATE users SET password='$baru_hash' WHERE id = $id");
        $status = 'sukses';
    }
}

include 'header_admin.php';
?>

<div class="container mt-4">
    <h4>Ganti Password Admin</h4>

    <?php if ($status == 'sukses'): ?>
        <div class="alert alert-success">Password berhasil diubah.</div>
    <?php elseif ($status == 'salah'): ?>
        <div class="alert alert-danger">Password lama salah!</div>
    <?php elseif ($status == 'konfirmasi'): ?>
        <div class="alert alert-warning">Konfirmasi password baru tidak cocok!</div>
    <?php endif; ?>

    <form method="POST">
        <div class="mb-3">
            <label>Password Lama</label>
            <input type="password" name="password_lama" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Password Baru</label>
            <input type="password" name="password_baru" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Konfirmasi Password Baru</label>
            <input type="password" name="konfirmasi_password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?php include 'footer_admin.php'; ?>
