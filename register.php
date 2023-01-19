<?php
require_once('session.php');
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap Upload File</title>

  <!-- BOOTSTRAP CSS 5.2.3 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="index.css">
</head>

<body>

  <?php
  require_once('header.php');
  ?>

  <div class="container">
    <div class="row">
      <form action="postdata.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" id="nama">
        </div>
        <div class="mb-3">
          <label for="alamat" class="form-label">Alamat</label>
          <input type="text" name="alamat" class="form-control" id="alamat">
        </div>
        <div class="mb-3">
          <label for="nohp" class="form-label">Nomor Telepon</label>
          <input type="number" name="nohp" class="form-control" id="nohp">
        </div>
        <div class="mb-3">
          <label class="form-label">Jenis Kelamin</label>
          <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" value="L">
            <label class="form-check-label">Laki-Laki</label>
          </div>
          <div class="form-label">
            <input class="form-check-input" type="radio" name="gender" value="P">
            <label class="form-check-label">Perempuan</label>
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="file" class="form-label">Upload Foto</label>
          <input class="form-control" name="file" type="file" id="file">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
      </form>
    </div>
  </div>
  </br>
  <div class="container">
    <div class="row">
      <div class="d-grid gap-2">
        <a href="datasiswa.php" class="btn btn-primary" type="button">Lihat Data Pendaftar</a>
      </div>
    </div>
  </div>

</body>

<!-- BOOTSTRAP JS 5.2.3 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>