<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM karyawan WHERE id=$id"));
$bagian = mysqli_query($koneksi, "SELECT * FROM bagian");

include 'header_admin.php';
?>

<div class="container mt-4">
    <h4>Edit Data Karyawan</h4>
    <form action="update_karyawan.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id'] ?>">
        <div class="row">
            <div class="col-md-6 mb-2">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" value="<?= $data['nip'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" value="<?= $data['nama_karyawan'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>No KTP</label>
                <input type="text" name="no_ktp" class="form-control" value="<?= $data['no_ktp'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>No NPWP</label>
                <input type="text" name="no_npwp" class="form-control" value="<?= $data['no_npwp'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?= $data['telepon'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="form-control" value="<?= $data['pendidikan_terakhir'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>Tahun Masuk</label>
                <input type="number" name="tahun_masuk" class="form-control" value="<?= $data['tahun_masuk'] ?>">
            </div>
            <div class="col-md-6 mb-2">
                <label>Status Nikah</label>
                <select name="status_nikah" class="form-control">
                    <option <?= $data['status_nikah'] == 'Menikah' ? 'selected' : '' ?>>Menikah</option>
                    <option <?= $data['status_nikah'] == 'Belum Menikah' ? 'selected' : '' ?>>Belum Menikah</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L" <?= $data['jenis_kelamin'] == 'L' ? 'selected' : '' ?>>Laki-laki</option>
                    <option value="P" <?= $data['jenis_kelamin'] == 'P' ? 'selected' : '' ?>>Perempuan</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label>Bagian</label>
                <select name="bagian_id" class="form-control">
                    <?php while ($b = mysqli_fetch_assoc($bagian)) : ?>
                        <option value="<?= $b['id'] ?>" <?= $data['bagian_id'] == $b['id'] ? 'selected' : '' ?>>
                            <?= $b['nama_bagian'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-12 mb-2">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control" rows="2"><?= $data['alamat'] ?></textarea>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
        <a href
