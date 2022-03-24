<?php

require "../../connection.php";

$cmd = "";

if (isset($_GET["cmd"])) {
  $cmd = $_GET["cmd"];
} else {
  $cmd = $_POST["cmd"];
}

if ($cmd == "save") {
  $nama_mapel = $_POST["nama_mapel"];
  $id_pengguna = $_POST["id_mapel"] != "" ? $_POST["id_mapel"] : "NULL";
  $id_jurusan = $_POST["id_jurusan"] != "" ? $_POST["id_jurusan"] : "NULL";

  $sql1 = "INSERT INTO tbmapel(nama_mapel, id_guru, id_jurusan) VALUES('" . $nama_mapel . "', " . $id_pengguna . ", '" . $id_jurusan . "')";
  $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);
  ?>
  <script>
    alert("Data baru berhasil dibuat.");
    location.href = "./form.php";
  </script>
  <?php
} elseif ($cmd == "update") {
  $id_mapel = $_POST["id_mapel"];
  $nama_mapel = $_POST["nama_mapel"];
  $id_pengguna = $_POST["id_mapel"] != "" ? $_POST["id_mapel"] : "NULL";
  $id_jurusan = $_POST["id_jurusan"] != "" ? $_POST["id_jurusan"] : "NULL";

  $sql2 = "UPDATE tbmapel SET tbmapel.nama_mapel='" . $nama_mapel . "', tbmapel.id_guru=" . $id_pengguna . ", tbmapel.id_jurusan=" . $id_jurusan . " WHERE tbmapel.id_mapel=" . $id_mapel;
  $query2 = mysqli_query($conn, $sql2) or die("error: " . $sql2);
  ?>
  <script>
    alert("Data berhasil diubah.");
    location.href = "./form.php";
  </script>
  <?php

} elseif ($cmd == "delete") {
  $id_mapel = $_POST["id_mapel"];

  $sql3 = "DELETE FROM tbmapel WHERE tbmapel.id_mapel=" . $id_mapel;
  $query3 = mysqli_query($conn, $sql3) or die("error: " . $sql3);
  ?>
  <script>
    alert("Data berhasil dihapus.");
    location.href = "./form.php";
  </script>
  <?php
}
