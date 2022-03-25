<?php
require "../../connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru</title>
  <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid p-5">
    <div class="row mb-2">
      <div class="col-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Table Guru</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-4">
        <form method="POST" action="./crud.php" id="form">
          <input type="hidden" id="id_pengguna" name="id_pengguna">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN">
            <label for="nisn">NISN</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_pengguna" name="nama_pengguna" placeholder="Nama Guru">
            <label for="nama_pengguna">Nama Guru</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_kelas" name="id_kelas">
              <option selected value="">-- Pilih Kelas --</option>
              <?php
              $sql1 = "SELECT * FROM tbkelas";
              $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);

              while ($result1 = mysqli_fetch_array($query1)) {
                $id_kelas = $result1["id_kelas"];
                $nama_kelas = $result1["nama_kelas"];
                ?>
                <option value="<?= $id_kelas ?>"><?= $nama_kelas ?></option>
                <?php
              }
              ?>
            </select>
            <label for="id_kelas">Nama Kelas</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_jurusan" name="id_jurusan">
              <option selected value="">-- Pilih Jurusan --</option>
              <?php
              $sql2 = "SELECT * FROM tbjurusan";
              $query2 = mysqli_query($conn, $sql2) or die("error: " . $sql2);

              while ($result2 = mysqli_fetch_array($query2)) {
                $id_jurusan = $result2["id_jurusan"];
                $nama_jurusan = $result2["nama_jurusan"];
                ?>
                <option value="<?= $id_jurusan ?>"><?= $nama_jurusan ?></option>
                <?php
              }
              ?>
            </select>
            <label for="id_jurusan">Nama Jurusan</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_mapel" name="id_mapel">
              <option selected value="">-- Pilih Mapel --</option>
              <?php
              $sql3 = "SELECT * FROM tbmapel";
              $query3 = mysqli_query($conn, $sql3) or die("error: " . $sql3);

              while ($result3 = mysqli_fetch_array($query3)) {
                $id_mapel = $result3["id_mapel"];
                $nama_mapel = $result3["nama_mapel"];
                ?>
                <option value="<?= $id_mapel ?>"><?= $nama_mapel ?></option>
                <?php
              }
              ?>
            </select>
            <label for="id_kelas">Nama Mapel</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
              <option selected value="">-- Pilih Jenis Kelamin --</option>
              <option value="L">Laki - Laki</option>
              <option value="P">Perempuan</option>
            </select>
            <label for="jenis_kelamin">Jenis Kelamin</label>
          </div>
          <div class="form-floating mb-2">
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir">
            <label for="tgl_lahir">Tanggal Lahir</label>
          </div>
          <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary" id="btnCmd" name="cmd" value="save">Save</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table class="table table-striped align-middle">
            <thead class="table-dark">
              <tr>
                <th scope="col">#</th>
                <th scope="col">NISN</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Nama Mapel</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql1 = "SELECT * FROM tbpengguna LEFT JOIN tbguru ON tbpengguna.id_pengguna = tbguru.id_guru LEFT JOIN tbkelas ON tbguru.id_kelas = tbkelas.id_kelas LEFT JOIN tbjurusan ON tbguru.id_jurusan = tbjurusan.id_jurusan LEFT JOIN tbmapel ON tbmapel.id_mapel = tbguru.id_mapel";
              ($query1 = mysqli_query($conn, $sql1)) or die("error: " . $sql1);
              $iteration = 1;

              while ($result1 = mysqli_fetch_array($query1)) {
                $id_pengguna = $result1["id_pengguna"];
                $nisn = $result1["nisn"];
                $nama_pengguna = $result1["nama_pengguna"];
                $id_kelas = $result1["id_kelas"];
                $nama_kelas = $result1["nama_kelas"];
                $id_jurusan = $result1["id_jurusan"];
                $nama_jurusan = $result1["nama_jurusan"];
                $id_mapel = $result1["id_mapel"];
                $nama_mapel = $result1["nama_mapel"];
                $jenis_kelamin = $result1["jenis_kelamin"];
                $tgl_lahir = $result1["tgl_lahir"];
                ?>
              <tr>
                <th scope="row"><?= $iteration ?></th>
                <td><?= $nisn ?></td>
                <td><?= $nama_pengguna ?></td>
                <td><?= $nama_kelas ?></td>
                <td><?= $nama_jurusan ?></td>
                <td><?= $nama_mapel ?></td>
                <td><?= ($jenis_kelamin == "L") ? "Laki - Laki" : "Perempuan" ?></td>
                <td><?= $tgl_lahir ?></td>
                <td>
                  <div class="d-flex gap-2">
                    <button class="btn btn-info" type="button" onclick="editForm(<?php echo "'$id_pengguna', '$nisn', '$nama_pengguna', '$id_jurusan', '$id_kelas', '$jenis_kelamin', '$tgl_lahir'"; ?>)">Edit</button>
                    <form action="./crud.php" method="POST" class="d-inline-block">
                      <input type="hidden" name="id_pengguna" value="<?= $id_pengguna ?>">
                      <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?')" name="cmd" value="delete">Delete</button>
                    </form>
                  </div>
                </td>
              </tr>
                <?php $iteration++;
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="../../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    function editForm(id_pengguna, nisn, nama_pengguna, id_jurusan, id_kelas, jenis_kelamin, tgl_lahir) {
      this.id_pengguna.value = id_pengguna;
      this.nisn.value = nisn;
      this.nama_pengguna.value = nama_pengguna;
      this.id_jurusan.value = id_jurusan;
      this.id_kelas.value = id_kelas;
      this.jenis_kelamin.value = jenis_kelamin;
      this.tgl_lahir.value = tgl_lahir;
      this.btnCmd.value = "update";
      this.btnCmd.innerHTML = "Update";
    }
  </script>
</body>

</html>