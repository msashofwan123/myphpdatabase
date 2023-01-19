<?php
require_once('getdata.php');

$no = $data['no'];
$nama = $data['nama'];
$alamat = $data['alamat'];
$nohp = $data['nohp'];
$gender = $data['gender'];
$email = $data['email'];
$file = $data['file'];
$idkelas = $data['id_kelas'];

?>


<?php
// CEK AKSI FORM
if ($_POST['aksi'] == 'ubah') {
    # code...
?>

    <form id="form" action="editdata.php" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
            <label for="no" class="form-label">No</label>
            <input type="text" class="form-control" id="no" name="no" value="<?php echo $no; ?>" />
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Tulis namamu" value="<?php echo $nama; ?>" />
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="<?= $alamat; ?>">
        </div>
        <div class="mb-3">
            <label for="nohp" class="form-label">Nomor Telepon</label>
            <input type="number" name="nohp" class="form-control" id="nohp" value="<?= $nohp; ?>">
        </div>
        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="gender" value="L" id="gender1" <?= ($gender == "L") ? 'checked' : "" ?>>
                <label class="form-check-label">Laki-Laki</label>
            </div>
            <div class="form-label">
                <input class="form-check-input" type="radio" name="gender" value="P" id="gender2" <?= ($gender == "P") ? 'checked' : "" ?>>
                <label class="form-check-label">Perempuan</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" value="<?= $email; ?>">
        </div>
        <div class="mb-3">
            <label for="pilih_kelas" class="form-label">Kelas</label>
            <select class="form-select" name="pilih_kelas" id="pilih_kelas">
                <option>Pilih Kelas</option>
                <?php
                while ($kelas = mysqli_fetch_assoc($ambil_data_kelas)) {
                    $nama_kelas = $kelas['nama_kelas'];
                    $selected = ($kelas['id'] == $idkelas) ? 'selected' : '' ;
                    echo "<option value='{$kelas['id']}' $selected>{$kelas['nama_kelas']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="file" class="form-label">Upload Foto</label>
            <input class="form-control" name="file" type="file" id="file">
        </div>
        <img src="assets/<?= $file ?>" class="img-thumbnail" alt="">
        <button type="submit" class="btn btn-primary" value="ubah">Ubah Data</button>
    </form>

<?php
} else {
?>

    <h4>Apakah Anda Yakin Ingin Menghapus Data Ini?</h4>

    <form action="hapusdata.php" method="post">
        <input type="hidden" name="no" value="<?= $no; ?>">
        <input type="submit" value="hapus" class="btn btn-danger">
    </form>

<?php
}
?>