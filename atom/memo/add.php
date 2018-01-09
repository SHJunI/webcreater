<?php

$conn = mysqli_connect("localhost","root","2919369","board");

if(!$conn){
  echo "DB접속에 실패했습니다.";
  exit;
}

$content =$_POST['memo'];

$sql = "insert into memo (content) values ('$content')";
$result = mysqli_query($conn, $sql);


if($result == 1 ){
  echo "<script>
  alert('메모등록 성공');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('메모등록 실패');
  location.href='main.php';
  </script>";
}

mysqli_close($conn);
?>
