<?php

session_start();
require "./connection.php";

$cmd = $_GET["cmd"];

function login() {
  global $conn;

  $data = [
    "message" => "Invalid",
    "data" => [],
  ];
  $email = $_POST["email"];
  $password = md5($_POST["password"]);

  $sql1 = "SELECT * FROM tbuser WHERE tbuser.email='$email' AND tbuser.password='$password'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $result1 = mysqli_fetch_assoc($query1);
  $num1 = mysqli_num_rows($query1);

  if ($num1 == 1) {
    $data["message"] = "Success";
    $data["data"] = $result1;
    $_SESSION["auth"] = true;
  }

  echo json_encode($data);
}

function register() {
  global $conn;

  $data = [
    "message" => "Invalid",
    "data" => [],
  ];
  $email = $_POST["email"];
  $nama = $_POST["nama"];
  $password = md5($_POST["password"]);

  $sql1 = "SELECT * FROM tbuser WHERE tbuser.email='$email'";
  $query1 = mysqli_query($conn, $sql1) or die("error : $sql1");
  $num1 = mysqli_num_rows($query1);
  
  if ($num1 == 0) {
    $sql2 = "INSERT INTO tbuser(email, nama, password) VALUES('$email', '$nama', '$password')";
    $query2 = mysqli_query($conn, $sql2) or die("error : $sql2");

    $id = mysqli_insert_id($conn);
    $sql3 = "SELECT * FROM tbuser WHERE tbuser.id='$id'";
    $query3 = mysqli_query($conn, $sql3) or die("error : $sql3");
    $result3 = mysqli_fetch_assoc($query3);

    $data["message"] = "Success";
    $data["data"] = $result3;
    $_SESSION["auth"] = true;
  }

  echo json_encode($data);
}

if ($cmd == "login") {
  login();
} else if ($cmd == "logout") {
  session_destroy();
} else if ($cmd == "register") {
  register();
}