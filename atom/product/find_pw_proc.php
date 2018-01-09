<?php
require "conn.php";

$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];

$chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
$chars_len = strlen($chars) -1;

$password = "";

for($i = 0; $i < 8; $i++)
{
  $num = rand(0, $chars_len);
  $password = $password . $chars[$num];
}

$sql = "update users set pw=sha2('{$password}',0) where id= '{$id}' and email= '{$email}'";
$result = mysqli_query($conn, $sql);
$affected = mysqli_affected_rows($conn);

if($affected)
{
  $to = $email;
  $subject = "{$id}님의 임시비밀번호 입니다.";
  $content = "{$id}님의 임시비밀번호는 {$password} 입니다.";
  $from = "From: admin@tester.com";

  mail($to, $subject, $content, $from);

  echo "임시 비밀번호를 발송하였습니다.";
}
else
{
  echo "일치하는 정보가 없습니다.";
}
?>
