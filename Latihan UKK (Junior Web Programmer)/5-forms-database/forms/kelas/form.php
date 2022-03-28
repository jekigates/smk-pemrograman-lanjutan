<?php
require "../../connection.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelas</title>
  <link rel="stylesheet" href="../../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid p-5">
    <div class="row mb-2">
      <div class="col-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Table Kelas</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-4">
        <form method="POST" action="./crud.php" id="form">
          <input type="hidden" id="id_kelas" name="id_kelas">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Nama Kelas">
            <label for="nama_kelas">Nama Kelas</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_pengguna" name="id_pengguna">
              <option selected value="">-- Pilih Guru --</option>
              <?php
              $sql1 = "SELECT * FROM tbpengguna INNER JOIN tbguru ON tbpengguna.id_pengguna = tbguru.id_guru";
              $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);

              while ($result1 = mysqli_fetch_array($query1)) {
                $id_pengguna = $result1["id_pengguna"];
                $nama_pengguna = $result1["nama_pengguna"];
                ?>
                <option value="<?= $id_pengguna ?>"><?= $nama_pengguna ?></option>
                <?php
              }
              ?>
            </select>
            <label for="id_kelas">Nama Guru</label>
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
                <th scope="col">Nama Kelas</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $sql1 = "SElECT *, tbkelas.id_kelas AS id_kelas FROM tbkelas LEFT JOIN tbguru ON tbkelas.id_guru = tbguru.id_guru LEFT JOIN tbpengguna ON tbguru.id_guru = tbpengguna.id_pengguna";
              $query1 = mysqli_query($conn, $sql1) or die("error: " . $sql1);
              $iteration = 1;

              while ($result1 = mysqli_fetch_array($query1)) {
                $id_kelas = $result1["id_kelas"];
                $nama_kelas = $result1["nama_kelas"];
                $id_pengguna = $result1["id_pengguna"];
                $nama_pengguna = $result1["nama_pengguna"];
                ?>
              <tr>
                <th scope="row"><?= $iteration ?></th>
                <td><?= $nama_kelas ?></td>
                <td><?= $nama_pengguna ?></td>
                <td>
                  <div class="d-flex gap-2">
                    <button class="btn btn-info" type="button" onclick="editForm(<?php echo "'$id_kelas', '$nama_kelas', '$id_pengguna'"; ?>)">Edit</button>
                    <form action="./crud.php" method="POST" class="d-inline-block">
                      <input type="hidden" name="id_kelas" value="<?= $id_kelas ?>">
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
    function editForm(id_kelas, nama_kelas, id_pengguna) {
      this.id_kelas.value = id_kelas;
      this.nama_kelas.value = nama_kelas;
      this.id_pengguna.value = id_pengguna;
      this.btnCmd.value = "update";
      this.btnCmd.innerHTML = "Update";
    }
  </script>
</body>

</html>