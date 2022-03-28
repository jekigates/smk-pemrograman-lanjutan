<?php

require "../../connection.php";

$cmd = "";

if (isset($_GET["cmd"])) {
  $cmd = $_GET["cmd"];
} else {
  $cmd = $_POST["cmd"];
}

if ($cmd == "save") {
  $nis = $_POST["nis"];
  $nama_pengguna = $_POST["nama_pengguna"];
  $id_kelas = $_POST["id_kelas"] != "" ? $_POST["id_kelas"] : "NULL";
  $id_jurusan = $_POST["id_jurusan"] != "" ? $_POST["id_jurusan"] : "NULL";
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $tgl_lahir = $_POST["tgl_lahir"];

  $sql1 = "INSERT INTO tbpengguna(nama_pengguna, jenis_kelamin, tgl_lahir) VALUES('" . $nama_pengguna . "', '" . $jenis_kelamin . "', '" . $tgl_lahir . "')";
  $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);

  $id_siswa = mysqli_insert_id($conn);
  
  $sql2 = "INSERT INTO tbsiswa(id_siswa, nis, id_kelas, id_jurusan) VALUES(" . $id_siswa . ", " . $nis . ", " . $id_kelas . ", " . $id_jurusan . ")";
  $query2 = mysqli_query($conn, $sql2) or die("error: " . $sql2);
  ?>
  <script>
    alert("Data baru berhasil dibuat.");
    location.href = "./form.php";
  </script>
  <?php
} elseif ($cmd == "update") {
  $id_pengguna = $_POST["id_pengguna"];
  $nis = $_POST["nis"];
  $nama_pengguna = $_POST["nama_pengguna"];
  $id_kelas = $_POST["id_kelas"] != "" ? $_POST["id_kelas"] : "NULL";
  $id_jurusan = $_POST["id_jurusan"];
  $jenis_kelamin = $_POST["jenis_kelamin"];
  $tgl_lahir = $_POST["tgl_lahir"];

  $sql3 = "UPDATE tbpengguna SET tbpengguna.nama_pengguna='" . $nama_pengguna . "', tbpengguna.jenis_kelamin='" . $jenis_kelamin . "', tbpengguna.tgl_lahir='" . $tgl_lahir . "' WHERE tbpengguna.id_pengguna=" . $id_pengguna;
  $query3 = mysqli_query($conn, $sql3) or die("error: " . $sql3);

  $sql4 = "UPDATE tbsiswa SET nis=" . $nis . ", id_kelas=" . $id_kelas . ", id_jurusan=" . $id_jurusan . " WHERE tbsiswa.id_siswa=" . $id_pengguna;
  $query4 = mysqli_query($conn, $sql4) or die("error: " . $sql4);
  ?>
  <script>
    alert("Data berhasil diubah.");
    location.href = "./form.php";
  </script>
  <?php

} elseif ($cmd == "delete") {
  $id_pengguna = $_POST["id_pengguna"];

  $sql5 = "DELETE FROM tbpengguna WHERE tbpengguna.id_pengguna='" . $id_pengguna . "'";
  $query5 = mysqli_query($conn, $sql5) or die("error: " . $sql5);

  $sql6 = "DELETE FROM tbsiswa WHERE tbsiswa.id_siswa='" . $id_pengguna . "'";
  $query6 = mysqli_query($conn, $sql6) or die("error: " . $sql6);
  ?>
  <script>
    alert("Data berhasil dihapus.");
    location.href = "./form.php";
  </script>
  <?php
}
