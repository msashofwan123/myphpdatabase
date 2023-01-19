<!-- <?php

echo "<h2>Halo Shofwan</h2>";
$a = 3;
$b = 5;

echo "Baru";

echo "<p>Jumlah 1+2 adalah $a</P>";

$nilaiAkhir = $b;

echo "<strong><h1>yang nilai akhir adalah $nilaiAkhir</h1></strong>";
echo "</br>";

$nama1 = "Rudi";
$nama2 = "Andi";
$nama3 = "Rendi";
$nama4 = "Firko";
$nama5 = "Danda";

$data_siswa = array("Rudi","Andi","Rendi","Firko",$nama5);

echo $data_siswa[1];
echo "</br>";
echo "</br>";
echo "</br>";
echo "</br>";

echo "<h1 style=text-align:center>";
echo "<strong>";
for ($i=0; $i < count($data_siswa); $i++) {
    echo $data_siswa[$i]."</br>";
}
echo "</strong>";
echo "<h1>";
?> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta lang="ID">
    <title>Percobaan PHP</title>
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
</head>
<body>
    <form action="" method="GET">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama">
        <br>
        <button type="submit">Proses</button>
    </form>

    <?php
    echo var_export($_GET) ?? "Jangan Lesu😒";
    ?>
</body>
</html>