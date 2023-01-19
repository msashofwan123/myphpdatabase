<?php

require_once('database/koneksi.php');
include_once('header.php');
?>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap Upload File</title>

    <!-- BOOTSTRAP CSS 5.2.3 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <link rel="stylesheet" href="index.css">
</head>

<!-- Kolom Formulir -->
<div class="container">
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 col-lg-offset-3">
            <h4 id="member-h" style="text-align:center">DAFTAR MENJADI MEMBER SEKOLAH</h4>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                </div>
                <div class="form-group">
                    <label for="Status">Perjanjian</label>
                    <input type="text" class="form-control" id="status" name="status" placeholder="Tulis Disini">
                    <small class="form-text text-muted">TULIS (Tanpa petik)= "SAYA BERJANJI"</small>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
    <div class="col-lg-4"></div>
</div>
<!-- Akhir Kolom Formulir -->



<?php

// Variabel Post Data Member

$username = $_POST['username'];
$pass = $_POST['password'];
$textnya = "SAYA BERJANJI";

if ($_POST['status'] == $textnya) {
    $status = "1";
} else {
    $status = "0";
};

// Input Data Ke Database
$insert_member = mysqli_query($conn, "INSERT INTO `login`(`username`, `password`, `status`) VALUES ('$username','$pass','$status') ");
?>

<div class="col-lg-12">
    <?php
    // Cek Apakah Data Berhasil Masuk
    if ($insert_member) {
        echo "<h1 id=data-found><center>DATA ANDA TELAH BERHASIL DI INPUT</center></h1>";
    } else {
        echo "<h1 id=data-found><center>DATA ANDA TIDAK DIPROSES</center></h1>";
    }
    ?>
</div>