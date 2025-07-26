<?php
session_start();
include '../config/koneksi.php';

$id = $_GET['id'];
mysqli_query($koneksi, "DELETE FROM karyawan WHERE id = $id");

header("Location: kelola_karyawan.php?status=deleted");
