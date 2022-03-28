<?php
  require "./security.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <link rel="icon" href="./assets/img/favicon.ico" />
    <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css" />
  </head>
  <style>
    html,
    body {
      height: 100%;
    }

    body {
      display: flex;
      align-items: center;
      justify-content: center;
      background-color: #f5f5f5;
    }
  </style>
  <body class="text-center">
    <button type="button" class="btn btn-primary" onclick="logout()">Logout</button>

    <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script>
      // var logout = () => {
      //   var url = "crud.php?cmd=logout";
      //   var xhttp = window.XMLHttpRequest ? new XMLHttpRequest() : ActiveXObject("Microsoft.XMLHTTP");

      //   xhttp.onload = function () {
      //     if (this.status === 200) {
      //       alert("Berhasil logout.");
      //       location.href = "index.html";
      //     }
      //   };
      //   xhttp.open("POST", url, true);
      //   xhttp.send();
      // };

      const logout = () => {
        fetch("crud.php?cmd=logout").then(() => {
            alert("Berhasil logout.");
            location.href = "index.html";
        });
      }
    </script>
  </body>
</html>
