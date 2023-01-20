<?php
include_once('database/koneksi.php');

// Kolom data di table
$no = $_POST['no'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$file = $_FILES['file']['name'];
$id_kelas = $_POST['pilih_kelas'];
$image = $_FILES['file']['name'];
$kelas = $_POST['pilih_kelas'];


$query = "UPDATE `datasiswa` SET `nama`='$nama',`alamat`='$alamat',`nohp`='$nohp',`gender`='$gender',`email`='$email' ";
if ($file != '') {
    $query .= ",`file`='$file'";
}
$query .= "WHERE `no` = '$no'  ";


$update_data = mysqli_query($conn, $query);

if ($update_data) {
?>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Detail Pendaftaran</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="postdata.css">
        <link href="favicon.ico" rel="icon" type="image/x-icon" />
    </head>

    <body>
        <br>
        <br>
        <br>
        <br>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- ALERT NOTIFICATION -->
                    <div class="alert alert-success"><strong>
                            <center>DATA ANDA TELAH BERHASIL DIPERBAHARUI
                        </strong></div>
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
                            <tr>
                                <td>Kelas</td>
                                <td><?= $kelas; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-6">
                    <?php echo '<img src="assets/' . $image . '" class="img-thumbnail" alt=..>'; ?>
                </div>
                <div class="col-lg-12 d-grid gap-2">
                    <a class="btn btn-info" href="datasiswa.php"><strong>MENUJU KE TABEL PENDAFTARAN<div id="timer"></div></strong></a>
                </div>
            </div>
        </div>
    </body>
    
<script>
    var count=6;
    function startTimer(){
        count--;
        document.getElementById("timer").innerHTML=count;
        if (count > 0) {
            setTimeout(startTimer, 1000);
        }
    }
    startTimer();
</script>

    <script type="text/javascript">
        setTimeout(function() {
            window.location = "datasiswa.php";
        }, 5000);
    </script>

    </html>

<?php
} else {
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

move_uploaded_file($_FILES["file"]["tmp_name"], 'assets/' . $file);
