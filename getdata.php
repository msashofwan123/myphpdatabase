<?php
include_once('database/koneksi.php');

$id = $_POST['id'];
$ambil_data = mysqli_query($conn, "SELECT a.*,k.nama_kelas,k.id AS id_kelas FROM `datasiswa` a LEFT JOIN daftar_kelas b ON b.no_siswa=a.no LEFT JOIN kelas k ON k.id=b.id_kelas WHERE a.`no` = '$id'");

$data = mysqli_fetch_assoc($ambil_data);
// echo var_dump($data);

$ambil_data_kelas = mysqli_query($conn, "SELECT nama_kelas,id FROM kelas");

