<?php

  $host = "localhost";
  $id = "root";
  $pw = "2919369";
  $db = "popup";

  $conn = mysqli_connect($host, $id, $pw, $db);

  if(!$conn)
  {
    echo "DB접속 실패";
    exit;
  }
?>
