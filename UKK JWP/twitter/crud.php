<?php

session_start();
require "./koneksi.php";

// method untuk login
function login()
{
  /*
  menggunakan global karena tidak ada variable yang di luar method bisa masuk
  */
  global $conn;
  $username = $_POST["username"];
  $password = md5($_POST["password"]);

  $sql1 = "SELECT * FROM users WHERE users.username='$username' AND users.password='$password'";
  ($query1 = mysqli_query($conn, $sql1)) or die("error : $sql1");
  $result1 = mysqli_fetch_assoc($query1);
  $num1 = mysqli_num_rows($query1);

  if ($num1 == 1) {
    $nama = $result1["nama"];
    $_SESSION["user"] = $result1;
    ?>
    <script>
      alert("Selamat datang, <?= $nama ?>!");
      location.href = "./home.php";
    </script>
    <?php
  } else {
    ?>
    <script>
      alert("Maaf, username atau password Anda salah.");
      location.href = "./index.php";
    </script>
    <?php
  }
}

// method untuk logout
function logout()
{
  /*
  menggunakan global karena tidak ada variable yang di luar method bisa masuk.
  Saya cek user login atau belum menggunakan session, jadi agar session tidak ada,
  bisa pakai session_destroy()
  */
  session_destroy();

  ?>
  <script>
    alert("Berhasil logout.");
    location.href = "./index.php";
  </script>
  <?php
}

// method register
function register()
{
  /*
  menggunakan global karena tidak ada variable yang di luar method bisa masuk.
  Saya cek user login atau belum menggunakan session, jadi agar session tidak ada,
  bisa pakai session_destroy()
  */
  global $conn;

  // $_POST untuk mendapat data dari request dengan method POST
  $username = $_POST["username"];
  $nama = $_POST["nama"];
  $password = md5($_POST["password"]);

  $sql1 = "SELECT * FROM users WHERE users.username='$username'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $num1 = mysqli_num_rows($query1);

  // cek kalau ada username yang sama terdaftar
  if ($num1 == 1) {
    ?>
    <script>
      alert("Maaf, sudah ada akun lain yang terdaftar.");
      location.href = "register.php";
    </script>
    <?php
  } else { // tidak ada username yang sama terdaftar
    $sql2 = "INSERT INTO users(username, nama, password, foto) VALUES('$username', '$nama', '$password', './assets/img/profile.png')";
    $query2 = mysqli_query($conn, $sql2) or die("error : $sql2");
    
    $id = mysqli_insert_id($conn);
    $sql3 = "SELECT * FROM users WHERE users.id='$id'";
    $query3 = mysqli_query($conn, $sql3) or die("error : $sql3");
    $result3 = mysqli_fetch_assoc($query3);

    /* 
    buat session user agar bisa dipakai datanya di halaman lain
    dan sebagai validasi juga
    */
    $_SESSION["user"] = $result3;
    ?>
    <script>
      alert("Terima kasih sudah mendaftar, <?= $nama ?>!");
      location.href = "home.php";
    </script>
    <?php
  }
}

function posts_create() {
  global $conn;

  $user = $_SESSION["user"];
  $user_id = $user["id"];
  $deskripsi = $_POST["deskripsi"];
  $foto = $_FILES["foto"]; // bisa ambil $_FILES karena encrypt="multipart/form-data" pada <form></form>
  $target_dir = "./assets/img/"; // nama folder tujuan
  $imageFileType = pathinfo($foto["name"],PATHINFO_EXTENSION); // dapatkan file extension
  // Check if image file is a actual image or fake image
  $check = getimagesize($foto["tmp_name"]);
  if($check !== false) {
    // mendapatkan next auto increment untuk penentuan nama file
    $sql1 = "SHOW TABLE STATUS WHERE `Name` = 'tweets';";
    $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
    $result1 = mysqli_fetch_assoc($query1);
    $num1 = mysqli_num_rows($query1);
    $tweet_id = $result1["Auto_increment"];
    $target_file = $target_dir . $tweet_id . "." . $imageFileType;

    // buat tweet baru
    $sql2 = "INSERT INTO tweets(deskripsi, foto, user_id) VALUES('$deskripsi', '$target_file', '$user_id')";
    $query2 = mysqli_query($conn, $sql2) or die('error : $sql2');

    // jika deskripsi mengandung hashtag
    if (str_contains($deskripsi, "#")) {
      $tags = explode(" ", $deskripsi);
      
      foreach ($tags as $tag) {
        if (str_contains($tag, "#")) {
          // menggunakan str replace ini agar data yang dimasukkan tanpa #
          $tag = str_replace("#", "", $tag);
          $sql3 = "SELECT * FROM tags WHERE tags.nama='$tag'";
          $query3 = mysqli_query($conn, $sql3) or die("error : $sql3");
          $result3 = mysqli_fetch_assoc($query3);
          $num3 = mysqli_num_rows($query3);

          $tag_id = "";

          if ($num3 == 0) {
            // kalau tag belum terdaftar, daftarkan
            $sql4 = "INSERT INTO tags(nama) VALUES('$tag')";
            $query4 = mysqli_query($conn, $sql4) or die("error : $sql4");
            $tag_id = mysqli_insert_id($conn);
          } else {
            // kalau tag sudah terdaftar, dapatkan id untuk insert ke table tag_tweet
            $tag_id = $result3["id"];
          }

          $sql5 = "INSERT INTO tag_tweet(tag_id, tweet_id) VALUES('$tag_id', '$tweet_id')";
          $query5 = mysqli_query($conn, $sql5) or die("error : $sql5");
        }
      }
    }

    // upload file dari input file ke tujuan
    if (move_uploaded_file($foto["tmp_name"], $target_file)) {
      ?>
      <script>
        alert("Berhasil membuat postingan.");
        location.href = "./profile.php";
      </script>
      <?php
    }
  } else {
    ?>
    <script>
      alert("Maaf, anda mengupload file yang bukan merupakan foto.");
      location.href = "./posts/create.php";
    </script>
    <?php
  }
}

function posts_update() {
  global $conn;

  $tweet_id = $_GET["id"];
  $deskripsi = $_POST["deskripsi"];
  $foto = $_FILES["foto"];
  
  if ($foto["size"] > 0) { // kalau user mengupload foto baru saat update
    $target_dir = "./assets/img/";
    $imageFileType = pathinfo($foto["name"],PATHINFO_EXTENSION);
    // Check if image file is a actual image or fake image
    $check = getimagesize($foto["tmp_name"]);
  
    if($check !== false) {
      $target_file = $target_dir . $tweet_id . "." . $imageFileType;

      $sql1 = "UPDATE tweets SET tweets.deskripsi='$deskripsi', tweets.foto='$target_file' WHERE tweets.id='$tweet_id'";
      $query1 = mysqli_query($conn, $sql1) or die('error : $sql1');

      move_uploaded_file($foto["tmp_name"], $target_file);
    }
  } else {
    // kalau user tidak mengupload foto baru saat update
    $sql2 = "UPDATE tweets SET tweets.deskripsi='$deskripsi' WHERE tweets.id='$tweet_id'";
    $query2 = mysqli_query($conn, $sql2) or die('error : $sql2');
  }

  // menghapus semua tag pada tweet sebelumnay
  $sql3 = "DELETE FROM tag_tweet WHERE tag_tweet.tweet_id='$tweet_id'";
  $query3 = mysqli_query($conn, $sql3) or die("error : $sql3");

  if (str_contains($deskripsi, "#")) {
    $tags = explode(" ", $deskripsi);
    
    foreach ($tags as $tag) {
      if (str_contains($tag, "#")) {
        $tag = str_replace("#", "", $tag);
        $sql4 = "SELECT * FROM tags WHERE tags.nama='$tag'";
        $query4 = mysqli_query($conn, $sql4) or die("error : $sql4");
        $result4 = mysqli_fetch_assoc($query4);
        $num4 = mysqli_num_rows($query4);

        $tag_id = "";

        if ($num4 == 0) {
          // buat tweet
          $sql5 = "INSERT INTO tags(nama) VALUES('$tag')";
          $query5 = mysqli_query($conn, $sql5) or die("error : $sql5");
          $tag_id = mysqli_insert_id($conn);
        } else {
          $tag_id = $result4["id"];
        }

        // memasukan tag baru pada tweeet
        $sql6 = "INSERT INTO tag_tweet(tag_id, tweet_id) VALUES('$tag_id', '$tweet_id')";
        $query6 = mysqli_query($conn, $sql6) or die("error : $sql6");
      }
    }
  }
  ?>
  <script>
    alert("Berhasil update postingan.");
    location.href = "./profile.php";
  </script>
  <?php
}

// method ubah profile
function ubah_profile() {
  global $conn;
  $user = $_SESSION["user"];
  $id = $user["id"];
  $nama = $_POST["nama"];
  $biografi = $_POST["biografi"];
  $foto = $_FILES["foto"];
  $target_dir = "./assets/img/";
  $imageFileType = pathinfo($foto["name"],PATHINFO_EXTENSION);
  $target_file = $target_dir . $id . "." . $imageFileType;
  // Check if image file is a actual image or fake image
  $check = getimagesize($foto["tmp_name"]);

  $sql1 = "UPDATE users SET users.nama='$nama', users.biografi='$biografi', users.foto='$target_file' WHERE users.id='$id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");

  $user["nama"] = $nama;
  $user["biografi"] = $biografi;
  $user["foto"] = $target_file;

  $_SESSION["user"] = $user;

  if (move_uploaded_file($foto["tmp_name"], $target_file)) {
    ?>
    <script>
      alert("Berhasil ubah profile.");
      location.href = "./profile.php";
    </script>
    <?php
  }
}

function buat_komen() {
  global $conn;
  $user = $_SESSION["user"];
  $user_id = $user["id"];
  $id = $_GET["tweet_id"];
  $isi = $_POST["isi"];

  // membuat komen
  $sql1 = "INSERT INTO comments(isi, tweet_id, user_id) VALUES('$isi', '$id', '$user_id')";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  ?>
  <script>
    alert("Berhasil buat komen.");
    history.back();
  </script>
  <?php
}

function hapus_komen() {
  global $conn;
  $user = $_SESSION["user"];
  $user_id = $user["id"];
  $id = $_GET["tweet_id"];

  // hapus komen seseorang pada sebuah tweet
  $sql1 = "DELETE FROM comments WHERE comments.tweet_id='$id' AND comments.user_id='$user_id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  ?>
  <script>
    alert("Berhasil hapus komen.");
    history.back();
  </script>
  <?php
}

function update_komen() {
  global $conn;
  $user = $_SESSION["user"];
  $user_id = $user["id"];
  $id = $_GET["tweet_id"];
  $isi = $_POST["isi"];

  // update komen
  $sql1 = "UPDATE comments SET comments.isi='$isi' WHERE comments.tweet_id='$id' AND comments.user_id='$user_id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  ?>
  <script>
    alert("Berhasil ubah komen.");
    history.back();
  </script>
  <?php
}

function delete_tweet() {
  global $conn;
  $tweet_id = $_GET["id"];

  // hapus tweet
  $sql1 = "DELETE FROM tweets WHERE tweets.id='$tweet_id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");

  // hapus semua komen pada tweet
  $sql2 = "DELETE FROM comments WHERE tweet_id='$tweet_id'";
  $query2 = mysqli_query($conn, $sql2) or die("error : $sql2");

  // hapus semua relasi tag tweet
  $sql3 = "DELETE FROM tag_tweet WHERE tag_tweet.tweet_id='$tweet_id'";
  $query3 = mysqli_query($conn, $sql3) or die("error : $sql3");

  ?>
  <script>
    alert("Berhasil hapus tweet.");
    location.href = "./profile.php";
  </script>
  <?php
}

$cmd = $_GET["cmd"];

if ($cmd == "login") {
  login();
} else if ($cmd == "logout") {
  logout();
} else if ($cmd == "register") {
  register();
} else if ($cmd == "posts_create") {
  posts_create();
} else if ($cmd == "update_profile") {
  ubah_profile();
} else if ($cmd == "buat_komen") {
  buat_komen();
} else if ($cmd == "hapus_komen") {
  hapus_komen();
} else if ($cmd == "update_komen") {
  update_komen();
} else if ($cmd == "delete_tweet") {
  delete_tweet();
} else if ($cmd == "posts_update") {
  posts_update();
}