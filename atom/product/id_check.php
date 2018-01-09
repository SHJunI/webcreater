<?php

require "conn.php";

$id = $_GET['id'];
$id = mysqli_real_escape_string($conn, $id);

$sql = "select id from users where id = '{$id}'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);

if($rows)
{
  echo "1";
}
else
{
  echo "0";
}
?>
