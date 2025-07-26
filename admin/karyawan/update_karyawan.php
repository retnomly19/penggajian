<?php
session_start();
include '../config/koneksi.php';

$id = $_POST['id'];
$nip = $_POST['nip'];
$nama_karyawan = $_POST['nama_karyawan'];
$no_ktp = $_POST['no_ktp'];
$no_npwp = $_POST['no_npwp'];
$telepon = $_POST['telepon'];
$alamat = $_POST['alamat'];
$pendidikan_terakhir = $_POST['pendidikan_terakhir'];
$tahun_masuk = $_POST['tahun_masuk'];
$status_nikah = $_POST['status_nikah'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$bagian_id = $_POST['bagian_id'];

$query = "UPDATE karyawan SET 
    nip='$nip',
    nama_karyawan='$nama_karyawan',
    no_ktp='$no_ktp',
    no_npwp='$no_npwp',
    telepon='$telepon',
    alamat='$alamat',
    pendidikan_terakhir='$pendidikan_terakhir',
    tahun_masuk='$tahun_masuk',
    status_nikah='$status_nikah',
    jenis_kelamin='$jenis_kelamin',
    bagian_id='$bagian_id'
WHERE id=$id";

if (mysqli_query($koneksi, $query)) {
    header("Location: kelola_karyawan.php?status=updated");
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
