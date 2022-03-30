<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>

  <!-- Memanggil css bootstrap -->
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<!--
  style untuk membuat body memiliki height 100% sesuai halaman,
  sehingga bisa menengahkan div class container secara vertikal
-->
<style>
  html,
  body {
    height: 100%;
  }
</style>

<body class="d-flex align-items-center justify-content-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-4">
        <div class="card">
          <div class="card-body">
            <!-- class dan attribut untuk menggunakan validasi langsung dari bootstrap -->
            <form action="crud.php?cmd=login" method="POST" class="text-center needs-validation" novalidate>
              <h5 class="card-title mb-4">Login Form</h5>
              <div class="form-floating mb-2">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <label for="username">Username</label>
              </div>
              <div class="form-floating mb-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <label for="password">Password</label>
              </div>
              <div class="d-grid gap-2 mb-4">
                <button class="btn btn-primary" type="submit">Login</button>
              </div>
              <a href="./register.php" class="card-link">Belum punya akun? Register</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Memanggil js bootstrap -->
  <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
  <script>
    // coding untuk validasi dari bootstrap

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
  </script>
</body>

</html>