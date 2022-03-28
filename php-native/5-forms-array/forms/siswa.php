<?php
  require "../migrations.php";

  $cmd = "create";

  if (isset($_GET["cmd"])) {
    $cmd = $_GET["cmd"];
  } else if (isset($_POST["cmd"])) {
    $cmd = $_POST["cmd"];
  }

  $nama_file_database = getNamaFileDatabase();

  $data = json_decode(file_get_contents($nama_file_database), true);
  $data_jurusan = $data["jurusan"];
  $data_kelas = $data["kelas"];
  $data_siswa = $data["siswa"];

  $form_data = [
    "id_siswa" => "",
    "nis" => "",
    "nama_siswa" => "",
    "id_jurusan" => "",
    "id_kelas" => "",
    "jenis_kelamin" => "",
    "tgl_lahir" => "",
  ];

  if ($cmd == "store") {
    $new_id_siswa = $data_siswa[count($data_siswa) - 1]["id_siswa"] + 1;
    $form_data["id_siswa"] = intval($new_id_siswa);
    $form_data["nis"] = intval($_POST["nis"]);
    $form_data["nama_siswa"] = $_POST["nama_siswa"];
    $form_data["id_jurusan"] = intval($_POST["id_jurusan"]);
    $form_data["id_kelas"] = intval($_POST["id_kelas"]);
    $form_data["jenis_kelamin"] = $_POST["jenis_kelamin"];
    $form_data["tgl_lahir"] = $_POST["tgl_lahir"];
    array_push($data["siswa"], $form_data);
  } else if ($cmd == "update") {
    $form_data["id_siswa"] = intval($_POST["id_siswa"]);
    $form_data["nis"] = intval($_POST["nis"]);
    $form_data["nama_siswa"] = $_POST["nama_siswa"];
    $form_data["id_jurusan"] = intval($_POST["id_jurusan"]);
    $form_data["id_kelas"] = intval($_POST["id_kelas"]);
    $form_data["jenis_kelamin"] = $_POST["jenis_kelamin"];
    $form_data["tgl_lahir"] = $_POST["tgl_lahir"];
    $search_siswa = array_search($form_data["id_siswa"], array_column($data_siswa, "id_siswa"));

    if ($search_siswa !== false) {
      $data["siswa"][$search_siswa] = $form_data;
    }
  } else if ($cmd == "edit") {
    $form_data["id_siswa"] = $_GET["id_siswa"];

    $search_siswa = array_search($form_data["id_siswa"], array_column($data_siswa, "id_siswa"));

    if ($search_siswa !== false) {
      $form_data["id_siswa"] = $data_siswa[$search_siswa]["id_siswa"];
      $form_data["nis"] = $data_siswa[$search_siswa]["nis"];
      $form_data["nama_siswa"] = $data_siswa[$search_siswa]["nama_siswa"];
      $form_data["id_jurusan"] = $data_siswa[$search_siswa]["id_jurusan"];
      $form_data["id_kelas"] = $data_siswa[$search_siswa]["id_kelas"];
      $form_data["jenis_kelamin"] = $data_siswa[$search_siswa]["jenis_kelamin"];
      $form_data["tgl_lahir"] = $data_siswa[$search_siswa]["tgl_lahir"];
    }
  } else if ($cmd == "delete") {
    $form_data["id_siswa"] = $_POST["id_siswa"];
    
    $search_siswa = array_search($form_data["id_siswa"], array_column($data_siswa, "id_siswa"));

    if ($search_siswa !== false) {
      array_splice($data["siswa"], $search_siswa, 1);
    }
  }

  if ($cmd != "edit" && $cmd != "create") {
    file_put_contents($nama_file_database, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: siswa.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Siswa</title>
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid p-5">
    <div class="row mb-2">
      <div class="col-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Table Siswa</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-4">
        <form method="POST" action="siswa.php" id="form">
          <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $form_data['id_siswa']; ?>">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nis" name="nis" placeholder="NIS" value="<?= $form_data['nis']; ?>">
            <label for="nis">NIS</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" placeholder="Nama Siswa" value="<?= $form_data['nama_siswa']; ?>">
            <label for="nama_siswa">Nama Siswa</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_jurusan" name="id_jurusan">
              <option selected value="">-- Pilih Jurusan --</option>

              <?php
                foreach ($data_jurusan as $jurusan) {
                  ?>
                  <option value="<?= $jurusan['id_jurusan']; ?>" <?php if ($form_data["id_jurusan"] == $jurusan["id_jurusan"]) echo "selected" ?>><?= $jurusan["nama_jurusan"]; ?></option>
                  <?php
                }
              ?>
            </select>
            <label for="id_jurusan">Nama Jurusan</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_kelas" name="id_kelas">
              <option selected value="">-- Pilih Kelas --</option>

              <?php
                foreach ($data_kelas as $kelas) {
                  ?>
                  <option value="<?= $kelas['id_kelas']; ?>" <?php if ($form_data["id_kelas"] == $kelas["id_kelas"]) echo "selected" ?>><?= $kelas["nama_kelas"]; ?></option>
                  <?php
                }
              ?>
            </select>
            <label for="id_kelas">Nama Kelas</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="jenis_kelamin" name="jenis_kelamin">
              <option selected value="">-- Pilih Jenis Kelamin --</option>
              <option value="L" <?php if ($form_data["jenis_kelamin"] == "L") echo "selected" ?>>Laki - Laki</option>
              <option value="P" <?php if ($form_data["jenis_kelamin"] == "P") echo "selected" ?>>Perempuan</option>
            </select>
            <label for="jenis_kelamin">Jenis Kelamin</label>
          </div>
          <div class="form-floating mb-2">
            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="Tanggal Lahir" value="<?= $form_data['tgl_lahir']; ?>">
            <label for="tgl_lahir">Tanggal Lahir</label>
          </div>
          <div class="d-flex gap-2">
            <?php
              if ($cmd == "create") {
                ?>
                <button type="submit" class="btn btn-primary" name="cmd" value="store">Store</button>
                <?php
              } else if ($cmd == "edit") {
                ?>
                <button type="submit" class="btn btn-primary" name="cmd" value="update">Update</button>
                <?php
              }
            ?>
            <a href="mapel.php" class="btn btn-secondary">Reset</a>
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
                <th scope="col">NIS</th>
                <th scope="col">Nama Siswa</th>
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Nama Kelas</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $iteration = 1;
                foreach ($data_siswa as $siswa) {
                  $id_siswa = $siswa["id_siswa"];
                  $nis = $siswa["nis"];
                  $nama_siswa = $siswa["nama_siswa"];
                  $id_jurusan = $siswa["id_jurusan"];
                  $nama_jurusan = "";
                  $id_kelas = $siswa["id_kelas"];
                  $nama_kelas = "";
                  $jenis_kelamin = $siswa["jenis_kelamin"];
                  $tgl_lahir = $siswa["tgl_lahir"];

                  $search_jurusan = array_search($id_jurusan, array_column($data_jurusan, "id_jurusan"));
                  $search_kelas = array_search($id_kelas, array_column($data_kelas, "id_kelas"));

                  if ($search_jurusan !== false) {
                    $jurusan = $data_jurusan[$search_jurusan];
                    $nama_jurusan = $jurusan["nama_jurusan"];
                  }
                  if ($search_kelas !== false) {
                    $kelas = $data_kelas[$search_kelas];
                    $nama_kelas = $kelas["nama_kelas"];
                  }
                  ?>
                  <tr>
                    <th scope="row"><?= $iteration; ?></th>
                    <td><?= $nis; ?></td>
                    <td><?= $nama_siswa; ?></td>
                    <td><?= $nama_jurusan; ?></td>
                    <td><?= $nama_kelas; ?></td>
                    <td><?= $jenis_kelamin; ?></td>
                    <td><?= $tgl_lahir; ?></td>
                    <td>
                      <div class="d-flex gap-2">
                        <a href="?cmd=edit&id_siswa=<?= $id_siswa; ?>" class="btn btn-info" type="button">Edit</a>
                        <form action="siswa.php" method="POST" class="d-inline-block">
                          <input type="hidden" name="id_siswa" value="<?= $id_siswa; ?>">
                          <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?')" name="cmd" value="delete">Delete</button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  <?php
                  $iteration++;
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>