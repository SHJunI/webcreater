<?php

$conn = mysqli_connect("localhost","root","2919369","board");

if(!$conn)
{
  echo "DB접속에 실패하였습니다.";
  exit;
}
$no = $_POST['no'];
$sql = "delete from memo where no=$no";
$result = mysqli_query($conn, $sql);


if($result == 1)
{
  echo "<script>
  alert('삭제 성공');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('삭제 실패');
  location.href='main.php';
  </script>";
}
mysqli_close($conn);
?>
