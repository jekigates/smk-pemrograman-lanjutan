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
      <div class="col-4 text-center">
        <img src="<?= $user['foto']; ?>" style="width: 10rem; height: 10rem; background-size: cover; border-radius: 50%;">
        <h2><?= $user["nama"]; ?></h2>
        <p>Biodata : <?= $user["biografi"]; ?></p>
        <a href="./edit_profile.php" class="btn btn-info">Ubah Profile</a>
        <a href="./buat_tweet.php" class="btn btn-primary">Buat Postingan</a>
      </div>
    </div>
    <div class="row">
      <?php
        foreach (getTweetsByUser($user["id"]) as $tweet) {
          $id = $tweet["id"];
          $deskripsi = getDeskripsiWithTag($tweet["deskripsi"]);
          $foto = $tweet["foto"];
          ?>
          <div class="col-4 mb-4">
            <div class="card w-100">
              <img src="<?= $foto; ?>" class="card-img-top" alt="" style="height: 20rem;">
              <div class="card-body">
                <p class="card-text"><?= $deskripsi; ?></p>
                <a href="./show_tweet.php?id=<?= $id ?>" class="btn btn-primary">Preview</a>
                <a href="./edit_tweet.php?id=<?= $id ?>" class="btn btn-info">Edit</a>
                <form action="./crud.php?cmd=delete_tweet&id=<?= $id ?>" method="POST" class="d-inline-block">
                  <button type="submit" class="btn btn-danger">Delete</button>
                </form>
              </div>
            </div>
          </div>
          <?php
        }
      ?>
      <div class="col-4">
      </div>
    </div>
  </div>

  <script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>