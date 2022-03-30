<?php
require "./secure.php";
require "./functions.php";
$tweet = showTweet($_GET["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Buat Postingan</title>
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Twitter</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="./home.php">Home</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="./profile.php">Profile</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid p-4">
    <div class="row">
      <div class="col-4 offset-4">
        <form action="./crud.php?cmd=posts_update&id=<?= $tweet['id']; ?>" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
          <div class="form-group mb-4">
            <label for="foto" class="form-label">Foto Postingan</label>
            <img class="w-100 bg-light border border-primary" style="height: 30rem;" id="divFoto" src="<?= $tweet['foto']; ?>"></img>
            <input type="file" class="form-control d-none" id="foto" name="foto" accept="image/png, image/jpeg">
            <div class="invalid-feedback">
              Foto harus diunggah.
            </div>
          </div>
          <div class="mb-4">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi" rows="4" placeholder="Deskripsi" required maxlength="250"><?= $tweet["deskripsi"]; ?></textarea>
            <div class="invalid-feedback">
              Deskripsi perlu diisi.
            </div>
          </div>
          <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Update Tweet</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
      'use strict';

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.querySelectorAll('.needs-validation');

      // Loop over them and prevent submission
      Array.prototype.slice.call(forms)
        .forEach(function (form) {
          form.addEventListener('submit', function (event) {
            if (!form.checkValidity()) {
              event.preventDefault();
              event.stopPropagation();
            };

            form.classList.add('was-validated');
          }, false);
        });
    })();

    var foto = document.getElementById("foto");
    var divFoto = document.getElementById("divFoto");

    divFoto.onclick = () => {
      foto.click();
    };

    foto.onchange = function(e) {
      divFoto.src = URL.createObjectURL(e.target.files[0]);
      divfoto.onload = function() {
        URL.revokeObjectURL(divFoto.src) // free memory
      };
    }
  </script>
</body>

</html>