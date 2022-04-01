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
  $data_mapel = $data["mapel"];
  $data_guru = $data["guru"];

  $form_data = [
    "id_guru" => "",
    "nisn" => "",
    "nama_guru" => "",
    "id_jurusan" => "",
    "id_kelas" => "",
    "id_mapel" => "",
    "jenis_kelamin" => "",
    "tgl_lahir" => "",
  ];

  if ($cmd == "store") {
    $new_id_guru = $data_guru[count($data_guru) - 1]["id_guru"] + 1;
    $form_data["id_guru"] = intval($new_id_guru);
    $form_data["nisn"] = intval($_POST["nisn"]);
    $form_data["nama_guru"] = $_POST["nama_guru"];
    $form_data["id_jurusan"] = intval($_POST["id_jurusan"]);
    $form_data["id_kelas"] = intval($_POST["id_kelas"]);
    $form_data["id_mapel"] = intval($_POST["id_mapel"]);
    $form_data["jenis_kelamin"] = $_POST["jenis_kelamin"];
    $form_data["tgl_lahir"] = $_POST["tgl_lahir"];
    array_push($data["guru"], $form_data);
  } else if ($cmd == "update") {
    $form_data["id_guru"] = intval($_POST["id_guru"]);
    $form_data["nisn"] = intval($_POST["nisn"]);
    $form_data["nama_guru"] = $_POST["nama_guru"];
    $form_data["id_jurusan"] = intval($_POST["id_jurusan"]);
    $form_data["id_kelas"] = intval($_POST["id_kelas"]);
    $form_data["id_mapel"] = intval($_POST["id_mapel"]);
    $form_data["jenis_kelamin"] = $_POST["jenis_kelamin"];
    $form_data["tgl_lahir"] = $_POST["tgl_lahir"];
    $search_guru = array_search($form_data["id_guru"], array_column($data_guru, "id_guru"));

    if ($search_guru !== false) {
      $data["guru"][$search_guru] = $form_data;
    }
  } else if ($cmd == "edit") {
    $form_data["id_guru"] = $_GET["id_guru"];

    $search_guru = array_search($form_data["id_guru"], array_column($data_guru, "id_guru"));

    if ($search_guru !== false) {
      $form_data["id_guru"] = $data_guru[$search_guru]["id_guru"];
      $form_data["nisn"] = $data_guru[$search_guru]["nisn"];
      $form_data["nama_guru"] = $data_guru[$search_guru]["nama_guru"];
      $form_data["id_jurusan"] = $data_guru[$search_guru]["id_jurusan"];
      $form_data["id_kelas"] = $data_guru[$search_guru]["id_kelas"];
      $form_data["id_mapel"] = $data_guru[$search_guru]["id_mapel"];
      $form_data["jenis_kelamin"] = $data_guru[$search_guru]["jenis_kelamin"];
      $form_data["tgl_lahir"] = $data_guru[$search_guru]["tgl_lahir"];
    }
  } else if ($cmd == "delete") {
    $form_data["id_guru"] = $_POST["id_guru"];
    
    $search_guru = array_search($form_data["id_guru"], array_column($data_guru, "id_guru"));

    if ($search_guru !== false) {
      array_splice($data["guru"], $search_guru, 1);
    }
  }

  if ($cmd != "edit" && $cmd != "create") {
    file_put_contents($nama_file_database, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: guru.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Guru</title>
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid p-5">
    <div class="row mb-2">
      <div class="col-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Table Guru</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-4">
        <form method="POST" action="guru.php" id="form">
          <input type="hidden" id="id_guru" name="id_guru" value="<?= $form_data['id_guru']; ?>">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nisn" name="nisn" placeholder="NISN" value="<?= $form_data['nisn']; ?>">
            <label for="nisn">NISN</label>
          </div>
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_guru" name="nama_guru" placeholder="Nama Guru" value="<?= $form_data['nama_guru']; ?>">
            <label for="nama_guru">Nama Guru</label>
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
            <select class="form-select" id="id_mapel" name="id_mapel">
              <option selected value="">-- Pilih Mapel --</option>

              <?php
                foreach ($data_mapel as $mapel) {
                  ?>
                  <option value="<?= $mapel['id_mapel']; ?>" <?php if ($form_data["id_mapel"] == $mapel["id_mapel"]) echo "selected" ?>><?= $mapel["nama_mapel"]; ?></option>
                  <?php
                }
              ?>

            </select>
            <label for="id_kelas">Nama Mapel</label>
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
            <a href="guru.php" class="btn btn-secondary">Reset</a>
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
                $iteration = 1;
                foreach ($data_guru as $guru) {
                  $id_guru = $guru["id_guru"];
                  $nisn = $guru["nisn"];
                  $nama_guru = $guru["nama_guru"];
                  $id_jurusan = $guru["id_jurusan"];
                  $nama_jurusan = "";
                  $id_kelas = $guru["id_kelas"];
                  $nama_kelas = "";
                  $id_mapel = $guru["id_mapel"];
                  $nama_mapel = "";
                  $jenis_kelamin = $guru["jenis_kelamin"];
                  $tgl_lahir = $guru["tgl_lahir"];

                  $search_jurusan = array_search($id_jurusan, array_column($data_jurusan, "id_jurusan"));
                  $search_kelas = array_search($id_kelas, array_column($data_kelas, "id_kelas"));
                  $search_mapel = array_search($id_mapel, array_column($data_mapel, "id_mapel"));

                  if ($search_jurusan !== false) {
                    $jurusan = $data_jurusan[$search_jurusan];
                    $nama_jurusan = $jurusan["nama_jurusan"];
                  }
                  if ($search_kelas !== false) {
                    $kelas = $data_kelas[$search_kelas];
                    $nama_kelas = $kelas["nama_kelas"];
                  }
                  if ($search_mapel !== false) {
                    $mapel = $data_mapel[$search_mapel];
                    $nama_mapel = $mapel["nama_mapel"];
                  }
                  ?>
                  <tr>
                    <th scope="row"><?= $iteration; ?></th>
                    <td><?= $nisn; ?></td>
                    <td><?= $nama_guru; ?></td>
                    <td><?= $nama_kelas; ?></td>
                    <td><?= $nama_jurusan; ?></td>
                    <td><?= $nama_mapel; ?></td>
                    <td><?= $jenis_kelamin; ?></td>
                    <td><?= $tgl_lahir; ?></td>
                    <td>
                      <div class="d-flex gap-2">
                          <a href="?cmd=edit&id_guru=<?= $id_guru; ?>" class="btn btn-info" type="button">Edit</a>
                          <form action="guru.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_guru" value="<?= $id_guru; ?>">
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