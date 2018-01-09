<?php

$name = $_POST['name'];
$email = $_POST['email'];

require "conn.php";

$sql = "select id from users where name = '{$name}' and email= '{$email}'";

$result = mysqli_query($conn, $sql);
$id = mysqli_fetch_row($result)[0];

if(!$id)
{
  echo "일치하는 정보가 없습니다.";
}
else
{
  echo "회원님의 ID는 {$id} 입니다.";
}
?>
