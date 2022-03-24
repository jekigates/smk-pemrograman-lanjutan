<?php

require "../../connection.php";

$cmd = "";

if (isset($_GET["cmd"])) {
  $cmd = $_GET["cmd"];
} else {
  $cmd = $_POST["cmd"];
}

if ($cmd == "save") {
  $nama_jurusan = $_POST["nama_jurusan"];
  $id_pengguna = $_POST["id_pengguna"] != "" ? $_POST["id_pengguna"] : "NULL";

  $sql1 = "INSERT INTO tbjurusan(nama_jurusan, id_guru) VALUES('" . $nama_jurusan . "', " . $id_pengguna . ")";
  $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);
  ?>
  <script>
    alert("Data baru berhasil dibuat.");
    location.href = "./form.php";
  </script>
  <?php
} else if ($cmd == "update") {
  $id_jurusan = $_POST["id_jurusan"];
  $nama_jurusan = $_POST["nama_jurusan"];
  $id_pengguna = $_POST["id_pengguna"] != "" ? $_POST["id_pengguna"] : "NULL";

  $sql2 = "UPDATE tbjurusan SET tbjurusan.nama_jurusan='" . $nama_jurusan . "', tbjurusan.id_guru=" . $id_pengguna . " WHERE tbjurusan.id_jurusan=" . $id_jurusan;
  $query2 = mysqli_query($conn, $sql2) or die("error: " . $sql2);
  ?>
  <script>
    alert("Data berhasil diubah.");
    location.href = "./form.php";
  </script>
  <?php
} else if ($cmd == "delete") {
  $id_jurusan = $_POST["id_jurusan"];

  $sql3 = "DELETE FROM tbjurusan WHERE tbjurusan.id_jurusan=" . $id_jurusan;
  $query3 = mysqli_query($conn, $sql3) or die("error: " . $sql3);
  ?>
  <script>
    alert("Data berhasil dihapus.");
    location.href = "./form.php";
  </script>
  <?php
}
