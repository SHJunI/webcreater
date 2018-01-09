<?php


$nos = implode(",", $_GET['check']);

$conn = mysqli_connect("localhost","root","2919369","product");
$sql = "delete from users where no IN({$nos})";
$result = mysqli_query($conn, $sql);
if($result)
{
  echo "<script>
  alert('삭제 성공!')
  location.href='list.php';
  </script>";
}
else
{
  echo "<script>
  alert('삭제 실패!');
  location.href='list.php';
  </script>";
}
mysqli_close($conn);

?>
