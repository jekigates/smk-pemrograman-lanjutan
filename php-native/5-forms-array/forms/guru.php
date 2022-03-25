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
            <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
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
            </select>
            <label for="id_kelas">Nama Kelas</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_jurusan" name="id_jurusan">
              <option selected value="">-- Pilih Jurusan --</option>
            </select>
            <label for="id_jurusan">Nama Jurusan</label>
          </div>
          <div class="form-floating mb-2">
            <select class="form-select" id="id_mapel" name="id_mapel">
              <option selected value="">-- Pilih Mapel --</option>
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
              <tr>
                <th scope="row">1</th>
                <td>NISN</td>
                <td>Nama Pengguna</td>
                <td>Nama Kelas</td>
                <td>Nama Jurusan</td>
                <td>Nama Mapel</td>
                <td>Jenis Kelamin</td>
                <td>Tanggal Lahir</td>
                <td>
                  <div class="d-flex gap-2">
                      <a href="?cmd=edit&id_guru=1" class="btn btn-info" type="button">Edit</a>
                      <form action="guru.php" method="POST" class="d-inline-block">
                        <input type="hidden" name="id_guru" value="1">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Apakah kamu yakin untuk menghapus data ini?')" name="cmd" value="delete">Delete</button>
                      </form>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>