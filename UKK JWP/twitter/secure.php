<?php

// mengecek apakah user masuk ke halaman tertentu setelah login dengan benar

session_start();

if (!isset($_SESSION["user"])) {
  ?>
  <script>
    alert("Maaf, Anda harus login terlebih dahulu.");
    location.href = "./index.php";
  </script>
  <?php
}
