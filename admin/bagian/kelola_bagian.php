<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}
include '../header_admin.php';
include '../../config/koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM bagian");
?>

<h4 class="mb-3">Kelola Data Bagian</h4>

<table class="table table-bordered table-striped table-sm small">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Jenis Bagian</th>
            <th>Nama Bagian</th>
            <th>Gaji Dasar</th>
            <th>Tunjangan Jabatan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $row['jenis_bagian']; ?></td>
            <td><?= $row['nama_bagian']; ?></td>
            <td>Rp <?= number_format($row['gaji_dasar'], 0, ',', '.'); ?></td>
            <td>Rp <?= number_format($row['tunjangan_jabatan'], 0, ',', '.'); ?></td>
            <td>
                <a href="edit_bagian.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="hapus_bagian.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<?php include '../footer_admin.php'; ?>
