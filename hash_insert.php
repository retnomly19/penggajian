<?php
include 'config/koneksi.php';

$admin_pw = password_hash('admin123', PASSWORD_DEFAULT);
$budi_pw = password_hash('k1', PASSWORD_DEFAULT);

// Kosongkan dulu user lama (biar gak dobel)
mysqli_query($koneksi, "DELETE FROM users");

$sql = "INSERT INTO users (username, password, nama_lengkap, email, role, is_active) VALUES
    ('admin', '$admin_pw', 'Admin Utama', 'admin@karsasoft.com', 'admin', 1),
    ('budi', '$budi_pw', 'Budi Santoso', 'budi@karsasoft.com', 'karyawan', 1)";

if (mysqli_query($koneksi, $sql)) {
    echo "✅ Data berhasil dimasukkan!";
} else {
    echo "❌ Error: " . mysqli_error($koneksi);
}
