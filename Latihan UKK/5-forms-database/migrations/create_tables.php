<?php

$sql1 = "CREATE TABLE tbpengguna(id_pengguna INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_pengguna VARCHAR(255) NOT NULL, jenis_kelamin ENUM('P', 'L') NOT NULL, tgl_lahir DATE NOT NULL)";
$query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);

$sql2 = "CREATE TABLE tbjurusan(id_jurusan INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_jurusan VARCHAR(255), id_guru INT NULL)";
($query2 = mysqli_query($conn, $sql2)) or die("error: " . $sql2);

$sql3 = "CREATE TABLE tbkelas(id_kelas INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_kelas VARCHAR(255) NOT NULL, id_guru INT NULL)";
($query3 = mysqli_query($conn, $sql3)) or die("error: " . $sql3);

$sql4 =
  "CREATE TABLE tbsiswa(id_siswa INT NOT NULL PRIMARY KEY, nis VARCHAR(255) NOT NULL UNIQUE, id_kelas INT NULL, id_jurusan INT NULL)";
($query4 = mysqli_query($conn, $sql4)) or die("error: " . $sql4);


$sql5 = "CREATE TABLE tbguru(id_guru INT NOT NULL PRIMARY KEY, nisn INT NOT NULL, id_kelas INT NULL, id_jurusan INT NULL, id_mapel INT NULL)";
($query5 = mysqli_query($conn, $sql5)) or die("error: " . $sql5);

$sql6 = "CREATE TABLE tbmapel(id_mapel INT NOT NULL AUTO_INCREMENT PRIMARY KEY, nama_mapel VARCHAR(255), id_jurusan INT NULL, id_guru INT NULL)";
($query6 = mysqli_query($conn, $sql6)) or die("error: " . $sql6);

?>
