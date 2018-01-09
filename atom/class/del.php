<?php

$no = $_POST['no'];

$conn = mysqli_connect("localhost","root","2919369","student");

$sql = "select upload from school where no = $no";
$result = mysqli_query($conn, $sql);
$file = mysqli_fetch_row($result)[0];
unlink("c:/xampp/htdocs" . $file);

$sql2 = "delete from school where no = $no";
$result2 = mysqli_query($conn, $sql2);

if($result2)
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
  location.history.back();
  </script>";
}

mysqli_close($conn);
?>
