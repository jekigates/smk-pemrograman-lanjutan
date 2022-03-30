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
  <title>Detail Tweet</title>
  <link rel="stylesheet" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
</head>
<body>
  <?php
    require "./navbar.php";
    $tweet_id = $_GET["id"];
  ?>

  <div class="container mt-4">
    <div class="row">
      <div class="col-6">
        <div class="row">
        <?php
          $tweet = showTweet($tweet_id);
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
              </div>
            </div>
          </div>
        <?php
        ?>
        </div>
      </div>
      <div class="col-6">
        <h4>Daftar Komen</h4>
            
        <form action="crud.php?cmd=buat_komen&tweet_id=<?= $tweet_id; ?>" method="POST" class="needs-validation" novalidate id="formKomen">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="isi" placeholder="Komen" required id="inputIsi">
            <button class="btn btn-primary" type="submit" id="btnKomen">Buat Komen</button>
          </div>
        </form>

        <div class="row">
          <?php
            $comments = getAllCommentsOfTweet($tweet_id);

            foreach ($comments as $comment) {
              $comment_id = $comment["comment_id"];
              $isi = $comment["isi"];
              ?>
              <div class="col-12 mb-4">
                <div class="card">
                  <div class="card-header d-flex align-items-center">
                    <img src="<?= $comment['foto']; ?>" alt="" style="width: 2rem; height: 2rem; border-radius: 50%">
                    <h6 class="mb-0 ms-2"><?= $comment['nama']; ?></h6>
                  </div>
                  <div class="card-body">
                    <div class="d-flex justify-content-between">
                      <p class="card-text"><?= getDeskripsiWithTag($comment["isi"]); ?></p>
                      <?php
                        if ($comment["creator_id"] == $user["id"]) {
                          ?>
                          <div class="d-flex">
                            <button class="btn btn-info" type="button" onclick="edit_comment(<?php echo "'$comment_id', '$isi'"; ?>)">Edit</button>
                            <form action="crud.php?cmd=hapus_komen&tweet_id=<?= $tweet_id; ?>" method="POST">
                              <button class="btn btn-danger ms-2" type="submit">Delete</button>
                            </form>
                          </div>
                          <?php
                        }
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            }
          ?>
        </div>
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

    var formKomen = document.getElementById("formKomen");
    var btnKomen = document.getElementById("btnKomen");
    var inputIsi = document.getElementById("inputIsi");

    function edit_comment(comment_id, isi) {
      var formAction = document.getElementById('formKomen').getAttribute("action");
      btnKomen.innerHTML = "Update Komen";
      formAction = formAction.replace("buat_komen", "update_komen")
      formKomen.setAttribute("action", formAction);
      inputIsi.value = isi;
    }
  </script>
</body>

</html>