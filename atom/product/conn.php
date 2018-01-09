<?php

$host = "localhost";
$id = "root";
$pw = "2919369";
$db = "product";
$conn = mysqli_connect($host, $id, $pw, $db);

if(!$conn)
{
  echo "DB에 접속할 수 없습니다.";
  echo mysqli_error($conn);
  exit;
}

?>
