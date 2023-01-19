<?php
session_start();

if ($_SESSION['nama_login'] == null) {
    header("location: login.php");
};

?>