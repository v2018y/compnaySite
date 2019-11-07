<?php
  $link = mysqli_connect("172.19.0.3", "root", "root");
  if (!$link) {
      die("Database connection failed: " . mysqli_connect_error());
  }
  $db = mysqli_select_db($link, "santoshsir");
  if (!$db) {
      die("Database selection failed: " . mysqli_connect_error());
  }
  echo "Database Connections Successfully......";
  mysqli_set_charset($link, 'UTF8');
?>  

