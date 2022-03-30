<?php
  require "./secure.php";
  $user = $_SESSION["user"];
  require "./functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <?php
    require "./navbar.php";
  ?>

  <div class="container-fluid p-4">
    <div class="row mb-4 justify-content-center">
      <div class="col-4">
        <form action="crud.php?cmd=update_profile" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
          <div class="form-group mb-4">
            <label for="foto" class="form-label">Foto Postingan</label>
            <img class="d-block rounded-circle bg-light border border-primary" style="height: 10rem; width: 10rem;" id="divFoto" src="<?= $user['foto']; ?>"></img>
            <input type="file" class="form-control d-none" id="foto" name="foto" accept="image/png, image/jpeg" required>
            <div class="invalid-feedback">
              Foto harus diunggah.
            </div>
          </div>
          <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>" required>
          </div>
          <div class="mb-3">
            <label for="biografi" class="form-label">Biografi</label>
            <textarea class="form-control" name="biografi" id="biografi" rows="4" placeholder="Biografi" required><?= $user["biografi"]; ?></textarea>
          </div>
          <div class="d-flex">
            <button class="btn btn-primary" type="submit">Update Profile</button>
            <button class="btn btn-secondary ms-2" type="reset">Reset</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
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