<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit;
}
include '../config/koneksi.php';
include 'header_admin.php';

// Ambil data bagian
$bagian = mysqli_query($koneksi, "SELECT * FROM bagian");
?>

<div class="container mt-4">
    <h4 class="mb-3">Input Data Karyawan</h4>
    <form action="simpan_karyawan.php" method="POST">
        <div class="row mb-3">
            <div class="col-md-6">
                <label>NIP</label>
                <input type="text" name="nip" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label>Nama Karyawan</label>
                <input type="text" name="nama_karyawan" class="form-control" required>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>No KTP</label>
                <input type="text" name="no_ktp" class="form-control">
            </div>
            <div class="col-md-6">
                <label>No NPWP</label>
                <input type="text" name="no_npwp" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Pendidikan Terakhir</label>
                <input type="text" name="pendidikan_terakhir" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Tahun Masuk</label>
                <input type="number" name="tahun_masuk" class="form-control">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label>Status Nikah</label>
                <select name="status_nikah" class="form-control">
                    <option value="Belum Menikah">Belum Menikah</option>
                    <option value="Menikah">Menikah</option>
                </select>
            </div>
            <div class="col-md-6">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label>Bagian</label>
            <select name="bagian_id" class="form-control">
                <?php while ($row = mysqli_fetch_assoc($bagian)) : ?>
                    <option value="<?= $row['id'] ?>"><?= $row['nama_bagian'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="kelola_karyawan.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include 'footer_admin.php'; ?>
