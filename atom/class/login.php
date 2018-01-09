<?php
session_start();

$conn = mysqli_connect("localhost","root","2919369","student");
$sql = "select name,id,admin from users where id='{$_POST['id']}' and pw=sha2('{$_POST['pw']}',0)";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_row($result);

if($arr)
{
  $_SESSION['id'] = $arr[1];
  $_SESSION['name'] = $arr[2];
  $_SESSION['admin'] = $arr[0];
  echo "<script>
  alert('로그인 성공!');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('로그인 실패!');
  </script>";
}
?>
