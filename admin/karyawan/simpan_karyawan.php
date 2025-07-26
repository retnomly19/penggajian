<?php
session_start();
include '../config/koneksi.php';

// Ambil data dari form
$nip                 = $_POST['nip'];
$nama_karyawan       = $_POST['nama_karyawan'];
$no_ktp              = $_POST['no_ktp'];
$no_npwp             = $_POST['no_npwp'];
$telepon             = $_POST['telepon'];
$alamat              = $_POST['alamat'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$tahun_masuk         = $_POST['tahun_masuk'];
$status_nikah        = $_POST['status_nikah'];
$jenis_kelamin       = $_POST['jenis_kelamin'];
$bagian_id           = $_POST['bagian_id'];

// Query simpan data
$query = "INSERT INTO karyawan (
    nip, nama_karyawan, no_ktp, no_npwp, telepon, alamat,
    pendidikan_terakhir, tahun_masuk, status_nikah, jenis_kelamin, bagian_id
) VALUES (
    '$nip', '$nama_karyawan', '$no_ktp', '$no_npwp', '$telepon', '$alamat',
    '$pendidikan_terakhir', '$tahun_masuk', '$status_nikah', '$jenis_kelamin', '$bagian_id'
)";

// Eksekusi query
if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_karyawan.php?status=sukses");
} else {
    echo "Gagal menyimpan data: " . mysqli_error($koneksi);
}
?>
