
-- DATABASE: db_penggajian

CREATE DATABASE IF NOT EXISTS db_penggajian;
USE db_penggajian;

-- Tabel users
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    nama_lengkap VARCHAR(100),
    email VARCHAR(100),
    bagian_id INT,
    role ENUM('admin', 'karyawan') DEFAULT 'karyawan',
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Tabel bagian
CREATE TABLE bagian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_bagian VARCHAR(100),
    gaji_dasar DECIMAL(12,2),
    tunjangan_jabatan DECIMAL(12,2)
);

-- Tabel karyawan
CREATE TABLE karyawan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nip VARCHAR(20) UNIQUE,
    nama_karyawan VARCHAR(100),
    no_ktp VARCHAR(30),
    no_npwp VARCHAR(30),
    telepon VARCHAR(15),
    alamat TEXT,
    pendidikan_terakhir VARCHAR(50),
    tahun_masuk YEAR,
    status_nikah ENUM('Menikah', 'Belum Menikah'),
    jumlah_anak INT,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan'),
    bagian_id INT,
    user_id INT UNIQUE,
    FOREIGN KEY (bagian_id) REFERENCES bagian(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Tabel absensi
CREATE TABLE absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    karyawan_id INT,
    tanggal DATE,
    status ENUM('Hadir', 'Tidak Hadir', 'Izin', 'Cuti'),
    FOREIGN KEY (karyawan_id) REFERENCES karyawan(id),
    UNIQUE(karyawan_id, tanggal)
);

-- Tabel tunjangan
CREATE TABLE tunjangan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_tunjangan VARCHAR(100),
    jumlah DECIMAL(12,2)
);

-- Tabel penggajian
CREATE TABLE penggajian (
    id INT AUTO_INCREMENT PRIMARY KEY,
    karyawan_id INT,
    bulan INT,
    tahun INT,
    gaji_awal DECIMAL(12,2),
    tunjangan_jabatan DECIMAL(12,2),
    tunjangan_kesehatan DECIMAL(12,2),
    tunjangan_makan DECIMAL(12,2),
    tunjangan_transport DECIMAL(12,2),
    tunjangan_bpjs DECIMAL(12,2),
    potongan_bpjs DECIMAL(12,2),
    pph DECIMAL(12,2),
    besar_pkp DECIMAL(12,2),
    pph_tahunan DECIMAL(12,2),
    pph_bulanan DECIMAL(12,2),
    gaji_netto DECIMAL(12,2),
    tanggal_penggajian DATE,
    FOREIGN KEY (karyawan_id) REFERENCES karyawan(id)
);
