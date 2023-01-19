<?php
include_once('database/koneksi.php');

$no = $_POST['no'];
$query = "SELECT `file` FROM `datasiswa` WHERE `no` = $no";
$data_foto = mysqli_query($conn, $query);
$file = mysqli_fetch_assoc($data_foto);

// HAPUS DATA GAMBAR DI ASSETS
unlink("assets/" . $file['file']);

// HAPUS DATA
$hapus_data = mysqli_query($conn, "DELETE FROM `datasiswa` WHERE `no` = $no");

if ($hapus_data) {
    echo "<h2>DATA BERHASIL DIHAPUS</h2>";
} else {
    echo "<h2>DATA GAGAL DIHAPUS</h2>";
};

echo "<a href='datasiswa.php'>KEMBALI KE TABEL</a>";
