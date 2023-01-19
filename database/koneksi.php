<?php

// SET DATA KONEKSI
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "sdnsolo";

// KONEKSI DATABASE
$conn = mysqli_connect("$hostname", "$username", "$password", "$dbname");

// PERIKSA KONEKSI
if(!$conn){
    die("Koneksi Dengan Database Bermasalah" .mysqli_connect_errno(). " - " .mysqli_connect_error());
}