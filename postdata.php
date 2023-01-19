<?php

include("database/koneksi.php");
include_once('header.php');

// Variabel Data Pada Table
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$file = $_FILES['file']['name'];

// Penampilan Tulisan Setelah Submit
// echo "Selamat Datang $nama. Aku Tebak, $nohp ini adalah nomor kamu. kamu adalah $gender yang berasal dari $alamat. adapun email kamu adalah $email.";

// Penampilan Gambar Setelah Submit
// echo "ini adalah gambar yang kamu upload kan..? apakah benar?";
// echo '<img src="assets/' . $file . '" class="card-img-top" alt=..>';

// echo "</br></br></br></br></br>";
// echo var_dump($_POST);
echo "</br></br></br></br></br>";
// echo var_dump($_FILES);

// Perintah Memindahkan File Upload ke Folder Tujuan
$sort = $_FILES["file"]["name"];
move_uploaded_file($_FILES["file"]["tmp_name"], "assets/$sort");

// Input Data Ke Database
$insert_data =
    mysqli_query($conn, "INSERT INTO `datasiswa`(`nama`, `alamat`, `nohp`, `gender`, `email`, `file`) VALUES ('$nama','$alamat','$nohp','$gender','$email','$file') ");

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detail Pendaftaran</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="postdata.css">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <?php
            // Cek Apakah Data Berhasil Masuk
            if ($insert_data) {
                echo "<h1 id=data-found><center>DATA ANDA TELAH BERHASIL DI INPUT</center></h1>";
            } else {
                echo "<h1 id=data-found><center>DATA ANDA TIDAK DIPROSES</center></h1>";
            }
            ?>
        </div>

        <div class="col-lg-6">
            <table class="table table-primary table-striped">
                <thead>
                    <tr>
                        <th class="table-success">Data</th>
                        <th class="table-success">Value</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Nama</td>
                        <td><?= $nama; ?></td>
                    </tr>
                    <tr>
                        <td>alamat</td>
                        <td><?= $alamat; ?></td>
                    </tr>
                    <tr>
                        <td>nohp</td>
                        <td><?= $nohp; ?></td>
                    </tr>
                    <tr>
                        <td>gender</td>
                        <td><?= $gender; ?></td>
                    </tr>
                    <tr>
                        <td>email</td>
                        <td><?= $email; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-lg-6">
            <?php echo '<img src="assets/' . $file . '" class="img-thumbnail" alt=..>'; ?>
        </div>

        <div class="col-lg-12 d-grid gap-2">
            <a class="btn btn-info" href="datasiswa.php"><strong>MENUJU KE TABEL PENDAFTARAN</strong></a>
        </div>
    </div>
</div>