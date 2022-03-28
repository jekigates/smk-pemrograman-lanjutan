<?php

session_start();

if (!isset($_SESSION["auth"])) {
  ?>
  <script>
    alert("Mohon login terlebih dahulu.");
    location.href = "index.html";
  </script>
  <?php
}