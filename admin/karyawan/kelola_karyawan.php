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
    <h4 class="mb-3">Kelola Data Karyawan</h4>
    <a href="input_karyawan.php" class="btn btn-sm btn-primary mb-3">+ Tambah Karyawan</a>

    <table class="table table-bordered table-striped table-sm">
        <thead class="table-dark text-center">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Bagian</th>
                <th>Gaji Dasar</th>
                <th>Telepon</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = "SELECT k.*, b.nama_bagian, b.gaji_dasar
                      FROM karyawan k
                      LEFT JOIN bagian b ON k.bagian_id = b.id";
            $result = mysqli_query($koneksi, $query);

            while ($data = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td class='text-center'>{$no}</td>
                        <td>{$data['nip']}</td>
                        <td>{$data['nama_karyawan']}</td>
                        <td>{$data['nama_bagian']}</td>
                        <td>Rp" . number_format($data['gaji_dasar'], 0, ',', '.') . "</td>
                        <td>{$data['telepon']}</td>
                        <td class='text-center'>
                            <a href='edit_karyawan.php?id={$data['id']}' class='btn btn-sm btn-warning'>Edit</a>
                            <a href='hapus_karyawan.php?id={$data['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin hapus?')\">Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</div>

<?php include 'footer_admin.php'; ?>
