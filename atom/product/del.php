<?php

$conn = mysqli_connect("localhost","root","2919369","product");

if(!$conn)
{
  echo "DB 접속에 실패 했습니다.";
  exit;
}

$sql = "select upload from product where no = {$_POST['num']}";
$result = mysqli_query($conn, $sql);
$file = mysqli_fetch_row($result)[0];
//echo $file . "<br>";
unlink("c:/xampp/htdocs" . $file);

$sql = "delete from product where no= {$_POST['num']}";
$result = mysqli_query($conn,$sql);

if($result)
{
  echo "<script>
  alert('상품 삭제 성공');
  location.href='list.php';
  </script>";
}
else
{
  echo "<script>
  alert('상품 삭제 실패');
  location.href='list.php';
  </script>";
}

mysqli_close($conn);
?>
