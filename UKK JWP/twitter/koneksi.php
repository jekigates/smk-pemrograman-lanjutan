<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "twitter";

// menghubungkan ke database di localhost melalui data yang sudah kita daftarkan dalam variable
$conn = mysqli_connect($hostname, $username, $password, $database);
