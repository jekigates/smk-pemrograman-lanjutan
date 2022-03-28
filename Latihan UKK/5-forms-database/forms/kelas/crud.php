<?php

require "../../connection.php";

$cmd = "";

if (isset($_GET["cmd"])) {
  $cmd = $_GET["cmd"];
} else {
  $cmd = $_POST["cmd"];
}

if ($cmd == "save") {
  $nama_kelas = $_POST["nama_kelas"];
  $id_pengguna = $_POST["id_pengguna"] != "" ? $_POST["id_pengguna"] : "NULL";

  $sql1 = "INSERT INTO tbkelas(nama_kelas, id_guru) VALUES('" . $nama_kelas . "', " . $id_pengguna . ")";
  $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);
  ?>
  <script>
    alert("Data baru berhasil dibuat.");
    location.href = "./form.php";
  </script>
  <?php
} else if ($cmd == "update") {
  $id_kelas = $_POST["id_kelas"];
  $nama_kelas = $_POST["nama_kelas"];
  $id_pengguna = $_POST["id_pengguna"] != "" ? $_POST["id_pengguna"] : "NULL";
  
  $sql2 = "UPDATE tbkelas SET tbkelas.nama_kelas='" . $nama_kelas . "', tbkelas.id_guru=" . $id_pengguna . " WHERE tbkelas.id_kelas=" . $id_kelas;
  $query2 = mysqli_query($conn, $sql2) or die("error: " . $sql2);
  ?>
  <script>
    alert("Data berhasil diubah.");
    location.href = "./form.php";
  </script>
  <?php
} else if ($cmd == "delete") {
  $id_kelas = $_POST["id_kelas"];

  $sql3 = "DELETE FROM tbkelas WHERE tbkelas.id_kelas=" . $id_kelas;
  $query3 = mysqli_query($conn, $sql3) or die("error: " . $sql3);
  ?>
  <script>
    alert("Data berhasil dihapus.");
    location.href = "./form.php";
  </script>
  <?php
}
