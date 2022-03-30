<?php

require "./koneksi.php";

// mendapatkan semua tweet tanpa terkecuali
function getAllTweets() {
  global $conn;

  $sql1 = "SELECT * FROM tweets";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $rows = [];

  while ($result1 = mysqli_fetch_assoc($query1)) {
    $rows[] = $result1;
  }

  return $rows;
}

// mendapatkan tweet yang dimiliki seseorang
function getTweetsByUser($id) {
  global $conn;

  $sql1 = "SELECT * FROM tweets WHERE tweets.user_id='$id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $rows = [];

  while ($result1 = mysqli_fetch_assoc($query1)) {
    $rows[] = $result1;
  }

  return $rows;
}

// menampilkan tweet by id
function showTweet($id) {
  global $conn;

  $sql1 = "SELECT * FROM tweets WHERE tweets.id='$id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $result1 = mysqli_fetch_assoc($query1);

  return $result1;
}

// menemukan sebuah user berdasarkan id user
function findUser($id) {
  global $conn;

  $sql1 = "SELECT * FROM users WHERE users.id='$id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $result1 = mysqli_fetch_assoc($query1);

  return $result1;
}

// mendapatkan semua komen dari sebuah tweet
function getAllCommentsOfTweet($id) {
  global $conn;

  $sql1 = "SELECT comments.isi AS isi, users.nama, users.foto, users.id AS creator_id, comments.id AS comment_id FROM comments INNER JOIN tweets ON comments.tweet_id = tweets.id INNER JOIN users ON comments.user_id = users.id WHERE comments.tweet_id='$id'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $rows = [];

  while ($result1 = mysqli_fetch_assoc($query1)) {
    $rows[] = $result1;
  }

  return $rows;
}

// ubah teks yang dikirim dan mengubah hastagnya menjadi link jika ada
function getDeskripsiWithTag($deskripsi)
{
  if (str_contains($deskripsi, "#")) {
    $tags = explode(" ", $deskripsi); // memisahkan teks deskripsi berdasarkan spasi
    foreach ($tags as $i => $tag) {
      if (str_contains($tag, "#")) {
        $tag_link = str_replace("#", "", $tag);
        $tags[$i] = "<a href='./home.php?tag=" . $tag_link . "'>" . $tag . "</a>";
      }
    }
    $deskripsi = implode(" ", $tags); // menggabungkan isi array deskripsi dan menambahkan spasi
  }
  return $deskripsi;
}

// mendapatkan semua tweet berdasarkan tag
function getAllTweetsByTag($tag) {
  global $conn;

  $sql1 = "SELECT * FROM tags WHERE tags.nama='$tag'";
  $query1 = mysqli_query($conn, $sql1);
  $result1 = mysqli_fetch_assoc($query1);
  $num1 = mysqli_num_rows($query1);
  $rows = [];

  if ($num1 == 1) {
    $tag_id = $result1["id"];
    // mencari data dari tag sweet sekaligus emndapatkan data tweet dan data komennya
    $sql2 = "SELECT * FROM tag_tweet INNER JOIN tweets ON tag_tweet.tweet_id = tweets.id WHERE tag_tweet.tag_id='$tag_id'";
    $query2 = mysqli_query($conn, $sql2) or die("error : $sql2");
  
    while ($result2 = mysqli_fetch_assoc($query2)) {
      $rows[] = $result2;
    }
  }

  return $rows;
}