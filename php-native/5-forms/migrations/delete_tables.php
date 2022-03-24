<?php

$nama_tables = ["pengguna", "siswa", "kelas", "guru", "mapel", "jurusan"];

foreach ($nama_tables as $nama_table) {
  $sql = "DROP TABLE IF EXISTS tb" . $nama_table;
  ($query = mysqli_query($conn, $sql)) or die("error: " . $sql);
}