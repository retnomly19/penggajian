<?php
session_start();
if ($_SESSION['role'] != 'admin') {
    header("Location: ../../login.php");
    exit;
}
include '../header_admin.php';
?>

<h4 class="mb-3">Input Data Bagian</h4>

<form method="post" action="simpan_bagian.php" class="small">
    <div class="row g-2">
        <div class="col-md-6 mb-2">
            <label class="form-label mb-1">Jenis Bagian</label>
            <input type="text" name="jenis_bagian" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label mb-1">Nama Bagian</label>
            <input type="text" name="nama_bagian" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label mb-1">Gaji Dasar</label>
            <input type="number" name="gaji_dasar" class="form-control form-control-sm" required>
        </div>
        <div class="col-md-6 mb-2">
            <label class="form-label mb-1">Tunjangan Jabatan</label>
            <input type="number" name="tunjangan_jabatan" class="form-control form-control-sm" required>
        </div>
    </div>
    <button type="submit" class="btn btn-sm btn-primary mt-2">Simpan</button>
</form>

<?php include '../footer_admin.php'; ?>
