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
  $data_guru = $data["guru"];
  $data_jurusan = $data["jurusan"];

  $form_data = [
    "id_jurusan" => "",
    "nama_jurusan" => "",
    "id_guru" => "",
  ];

  if ($cmd == "store") {
    $new_id_jurusan = $data_jurusan[count($data_jurusan) - 1]["id_jurusan"] + 1;
    $form_data["id_jurusan"] = intval($new_id_jurusan);
    $form_data["nama_jurusan"] = $_POST["nama_jurusan"];
    $form_data["id_guru"] = intval($_POST["id_guru"]);
    array_push($data["jurusan"], $form_data);
  } else if ($cmd == "update") {
    $form_data["id_jurusan"] = intval($_POST["id_jurusan"]);
    $form_data["nama_jurusan"] = $_POST["nama_jurusan"];
    $form_data["id_guru"] = intval($_POST["id_guru"]);
    $search_jurusan = array_search($form_data["id_jurusan"], array_column($data_jurusan, "id_jurusan"));

    if ($search_jurusan !== false) {
      $data["jurusan"][$search_jurusan] = $form_data;
    }
  } else if ($cmd == "edit") {
    $form_data["id_jurusan"] = $_GET["id_jurusan"];

    $search_jurusan = array_search($form_data["id_jurusan"], array_column($data_jurusan, "id_jurusan"));

    if ($search_jurusan !== false) {
      $form_data["id_jurusan"] = $data_jurusan[$search_jurusan]["id_jurusan"];
      $form_data["nama_jurusan"] = $data_jurusan[$search_jurusan]["nama_jurusan"];
      $form_data["id_guru"] = $data_jurusan[$search_jurusan]["id_guru"];
    }
  } else if ($cmd == "delete") {
    $form_data["id_jurusan"] = $_POST["id_jurusan"];
    
    $search_jurusan = array_search($form_data["id_jurusan"], array_column($data_jurusan, "id_jurusan"));

    if ($search_jurusan !== false) {
      array_splice($data["jurusan"], $search_jurusan, 1);
    }
  }

  if ($cmd != "edit" && $cmd != "create") {
    file_put_contents($nama_file_database, json_encode($data, JSON_PRETTY_PRINT));
    header("Location: jurusan.php");
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jurusan</title>
  <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.min.css">
</head>

<body>
  <div class="container-fluid p-5">
    <div class="row mb-2">
      <div class="col-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="../index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Form Table Jurusan</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-4">
        <form method="POST" action="jurusan.php" id="form">
          <input type="hidden" id="id_jurusan" name="id_jurusan" value="<?= $form_data['id_jurusan']; ?>">
          <div class="form-floating mb-2">
            <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="Nama Jurusan" value="<?= $form_data['nama_jurusan']; ?>">
            <label for="nama_jurusan">Nama Jurusan</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_guru" name="id_guru">
              <option selected value="">-- Pilih Guru --</option>

              <?php
                foreach ($data_guru as $guru) {
                  ?>
                  <option value="<?= $guru['id_guru']; ?>" <?php if ($form_data["id_guru"] == $guru["id_guru"]) echo "selected" ?>><?= $guru["nama_guru"]; ?></option>
                  <?php
                }
              ?>
            </select>
            <label for="id_kelas">Nama Guru</label>
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
            <a href="jurusan.php" class="btn btn-secondary">Reset</a>
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
                <th scope="col">Nama Jurusan</th>
                <th scope="col">Nama Guru</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $iteration = 1;
                foreach ($data_jurusan as $jurusan) {
                  $id_jurusan = $jurusan["id_jurusan"];
                  $nama_jurusan = $jurusan["nama_jurusan"];
                  $id_guru = $jurusan["id_guru"];
                  $nama_guru = "";

                  $search_guru = array_search($id_guru, array_column($data_guru, "id_guru"));

                  if ($search_guru !== false) {
                    $guru = $data_guru[$search_guru];
                    $nama_guru = $guru["nama_guru"];
                  }
                  ?>
                  <tr>
                    <th scope="row"><?= $iteration; ?></th>
                    <td><?= $nama_jurusan; ?></td>
                    <td><?= $nama_guru; ?></td>
                    <td>
                      <div class="d-flex gap-2">
                          <a href="?cmd=edit&id_jurusan=<?= $id_jurusan; ?>" class="btn btn-info" type="button">Edit</a>
                          <form action="jurusan.php" method="POST" class="d-inline-block">
                            <input type="hidden" name="id_jurusan" value="<?= $id_jurusan; ?>">
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