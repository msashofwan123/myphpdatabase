<?php
session_start();

if (isset($_SESSION['ingatkan'])) {
    header('location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form class="box" action="aksilogin.php" method="post">
        <?php
        if (isset($_GET['pesan'])) { ?>
            <div class="alert alert-primary" role="alert">
                <div style="color:white; background-color:brown; padding:10px;"><?= $_GET['pesan'] ?></div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php }
        ?>
        <h1>Login</h1>
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <div>
            <input type="checkbox" class="form-check-input" id="ingatkan" name="ingatkan">
            <label class="form-check-label" for="ingatkan">Ingat Saya</label>
        </div>
        <input type="submit" name="submit" value="Login">
    </form>



</body>

</html>