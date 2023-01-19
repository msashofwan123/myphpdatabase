<?php
session_start();
include_once('database/koneksi.php');

if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];

    $sqlsearch = "SELECT datasiswa.*,daftar_kelas.id,kelas.nama_kelas FROM `datasiswa` LEFT JOIN daftar_kelas ON daftar_kelas.no_siswa=datasiswa.no LEFT JOIN kelas ON kelas.id=daftar_kelas.Id_kelas WHERE nama LIKE '%$cari%' OR alamat LIKE '%$cari%'";
    $ambildata = mysqli_query($conn, $sqlsearch);
} else {

    $sql = "SELECT datasiswa.*,daftar_kelas.id,kelas.nama_kelas FROM `datasiswa` LEFT JOIN daftar_kelas ON daftar_kelas.no_siswa=datasiswa.no LEFT JOIN kelas ON kelas.id=daftar_kelas.Id_kelas";
    $ambildata = mysqli_query($conn, $sql);
};


if ($_SESSION['nama_login'] == null) {
    header("location: login.php");
};
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Pendaftaran</title>
    <link href="favicon.ico" rel="icon" type="image/x-icon" />

    <!-- BOOTSTRAP 5.3.0 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- DATA TABLE -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.css">

    <!-- INTERNAL CSS -->
    <link rel="stylesheet" href="index.css">
</head>

<body>

    <?php
    require_once('header.php');

    if (isset($_GET['cari'])) {
        echo "<br>";
        echo "<h3><center>Data Ditemukan<center></h3>";
        echo "<br>";
    };
    ?>

    <div class="container">
        <table class="table table-striped mytable" id="mytable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Gender</th>
                    <th>Email</th>
                    <th>Nama Kelas</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($data = mysqli_fetch_assoc($ambildata)) {
                    if ($data['file'] == "") {
                        $gambar = "no-image.jpg";
                    } else {
                        $gambar = $data['file'];
                    }
                ?>
                    <tr>
                        <th><?= $no++; ?></th>
                        <th><?php echo $data['no'] ?></th>
                        <td><?php echo $data['nama'] ?></td>
                        <td><?= $data['alamat'] ?></td>
                        <td><?= $data['nohp'] ?></td>
                        <td><?= $data['gender'] ?></td>
                        <td><?= $data['email'] ?></td>
                        <td><?= $data['nama_kelas'] ?></td>
                        <td><img class="img-thumbnail" width="100" src="assets/<?= $gambar ?>" /></td>
                        <td>
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $data['no'] ?>" data-bs-aksi="ubah"> Ubah
                            </button>
                            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-id="<?= $data['no'] ?>" data-bs-aksi="hapus"> Hapus
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Data</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button> -->
                        &copy; 2023 <a href="shofwan-cv.netlify.app" id="a-copyright">One-Project</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>

<!-- JQUERY 3.X -->
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

<!-- DATA TABLES  -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.js"></script>

<!-- CUSTOM SCRIPT -->
<Script>
    $(document).ready(function() {
        // alert('Hallo');
        const modal = document.getElementById('exampleModal')
        modal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget
            const id = button.getAttribute('data-bs-id');
            const aksi = button.getAttribute('data-bs-aksi');
            console.log(id);
            $.post('form.php', {
                id,
                aksi
            }, function(a) {
                // console.log(a);
            }).done(function(x) {
                $('.modal-body').html(x);
            }).fail(function() {
                alert("error");
            }).always(function() {
                // alert("finished");
            });
        });
    });
</script>

<!-- PAGINATION DATA TABLES  -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#mytable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.13.1/i18n/id.json"
            }
        });
    });
</script>

</html>