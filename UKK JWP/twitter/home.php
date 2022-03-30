<?php
  require "./secure.php"; // agar user yang belum login tidak bisa masuk ke halaman ini
  $user = $_SESSION["user"]; // untuk mendapatkan data dari user yang login
  require "./functions.php"; // beberapa method yang saya gunakan untuk view page
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <?php
    require "./navbar.php";
  ?>

  <div class="container mt-4">
    <div class="row">
      <div class="col-6">
        <div class="row">
        <?php
          if (isset($_GET["tag"])) {
            $tag = $_GET["tag"];

            $tweets = getAllTweetsByTag($tag);

            if (count($tweets) == 0) {
              ?>
              <div class="col-12">
                <h2>Belum ada tweet dengan tag ini.</h2>
              </div>
              <?php
            } else {
              foreach ($tweets as $tweet) {
                $id = $tweet["id"];
                $deskripsi = getDeskripsiWithTag($tweet["deskripsi"]);
                $foto = $tweet["foto"];
                $creator = findUser($tweet["user_id"]);
                ?>
                <div class="col-12 mb-4">
                  <div class="card w-100">
                    <div class="card-header d-flex align-items-center">
                      <img src="<?= $creator['foto']; ?>" alt="" style="width: 2rem; height: 2rem; border-radius: 50%">
                      <h6 class="mb-0 ms-2"><?= $creator['nama']; ?></h6>
                    </div>
                    <img src="<?= $foto; ?>" class="card-img-top" alt="" style="height: 20rem;">
                    <div class="card-body">
                      <p class="card-text"><?= $deskripsi; ?></p>
                      <a href="./show_tweet.php?id=<?= $id ?>" class="btn btn-primary">Preview</a>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
          } else {
            $tweets = getAllTweets();

            if (count($tweets) == 0) {
              ?>
              <div class="col-12">
                <h2>Belum ada tweet apapun.</h2>
              </div>
              <?php
            } else {
              foreach ($tweets as $tweet) {
                $id = $tweet["id"];
                $deskripsi = getDeskripsiWithTag($tweet["deskripsi"]);
                $foto = $tweet["foto"];
                $creator = findUser($tweet["user_id"]);
                ?>
                <div class="col-12 mb-4">
                  <div class="card w-100">
                    <div class="card-header d-flex align-items-center">
                      <img src="<?= $creator['foto']; ?>" alt="" style="width: 2rem; height: 2rem; border-radius: 50%">
                      <h6 class="mb-0 ms-2"><?= $creator['nama']; ?></h6>
                    </div>
                    <img src="<?= $foto; ?>" class="card-img-top" alt="" style="height: 20rem;">
                    <div class="card-body">
                      <p class="card-text"><?= $deskripsi; ?></p>
                      <a href="./show_tweet.php?id=<?= $id ?>" class="btn btn-primary">Preview</a>
                    </div>
                  </div>
                </div>
              <?php
              }
            }
          }
        ?>
        </div>
      </div>
    </div>
  </div>

  <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>