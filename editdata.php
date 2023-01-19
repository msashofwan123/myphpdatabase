<?php
include_once('database/koneksi.php');

// echo var_dump($_POST);
// Kolom data di table
$no = $_POST['no'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$file = $_FILES['file']['name'];
$id_kelas = $_POST['pilih_kelas'];


$query = "UPDATE `datasiswa` SET `nama`='$nama',`alamat`='$alamat',`nohp`='$nohp',`gender`='$gender',`email`='$email' ";
if ($file !='') {
$query .= ",`file`='$file'";
}
$query .="WHERE `no` = '$no'  ";


$update_data = mysqli_query($conn, $query);

if ($update_data) {
    echo "<h1>Data berhasil masuk</h1><br>
    <a href='datasiswa.php'>Kembali Ke Tabel</a>
    ";
}else{
    echo "<h1>Data gagal masuk</h1>";
}

// Update Daftar Kelas
// Cek, Apakah Siswa Tersebut Sudah Ada Kelasnya Belum
$cek_data_kelas = mysqli_query($conn, "SELECT * FROM `daftar_kelas` WHERE `no_siswa` = '$no'");

// Jika data Sudah ada, maka menjalankan opsi Update. Jika Belum, Maka Menjalankan Opsi INSERT
if (mysqli_fetch_assoc($cek_data_kelas)) {
    $query = mysqli_query($conn, "UPDATE `daftar_kelas` SET `id_kelas`='$id_kelas' WHERE `no_siswa` = '$no'");
} else {
    $query = mysqli_query($conn, "INSERT `daftar_kelas` VALUES ( null, '$no', '$id_kelas')");
}



echo "<br>";

// echo var_dump($_FILES);

// $nama = $_FILES["foto"]["name"];

move_uploaded_file($_FILES["file"]["tmp_name"], 'assets/'.$file);

