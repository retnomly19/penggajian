<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config/koneksi.php';
include 'header_admin.php';
?>

<div class="container mt-4">
    <h4 class="mb-3">Kelola Akun</h4>

    <?php if (isset($_GET['status']) && $_GET['status'] == 'reset') : ?>
        <div class="alert alert-info">Password berhasil direset ke <b>karyawan123</b></div>
    <?php endif; ?>

    <table class="table table-bordered table-striped table-sm">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>Username</th>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Role</th>
                <th>Bagian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($koneksi, "SELECT * FROM users");
            while ($data = mysqli_fetch_assoc($query)) :
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['nama_lengkap'] ?></td>
                    <td><?= $data['email'] ?></td>
                    <td><?= $data['role'] ?></td>
                    <td><?= $data['bagian'] ?></td>
                    <td class="text-center">
                        <a href="edit_akun.php?id=<?= $data['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="hapus_akun.php?id=<?= $data['id'] ?>" onclick="return confirm('Hapus akun ini?')" class="btn btn-danger btn-sm">Hapus</a>
                        <a href="reset_password.php?id=<?= $data['id'] ?>" onclick="return confirm('Reset password user ini ke default?')" class="btn btn-info btn-sm">Reset</a>
                    </td>
                </tr>
            <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php include 'footer_admin.php'; ?>
