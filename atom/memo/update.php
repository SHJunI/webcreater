<?php
$conn = mysqli_connect("localhost","root","2919369","board");
if(!$conn){
  echo "DB접속에 실패했습니다.";
  exit;
}
$no = $_POST['no'];
$content = $_POST['memo'];
$sql = "update memo set content='$content' where no=$no";
$result = mysqli_query($conn, $sql);

if($result == 1 ){
  echo "<script>
  alert('메모수정 성공');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('메모수정 실패');
  location.href='main.php';
  </script>";
}

mysqli_close($conn);
?>
