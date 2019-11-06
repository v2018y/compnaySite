<?php
  $link = mysqli_connect("localhost", "root", "", "santoshsir");
  if (!$link) {
      die("Database connection failed: " . mysqli_connect_error());
  }

 $db_select = mysqli_select_db($link, "santoshsir");
  if (!$db_select) {
      die("Database selection failed: " . mysqli_connect_error());
  }
  mysqli_set_charset($link, 'UTF8');
?>