<?php

$conn = mysqli_connect("localhost","root","2919369","student");
$sql = "insert into users (id,pw,name,email,age,ses,addr,tel) values ('{$_POST['id']}',sha2('{$_POST['pw']}',0),
'{$_POST['name']}','{$_POST['email']}',{$_POST['age']},{$_POST['ses']},'{$_POST['addr']}','{$_POST['tel']}')";
$result = mysqli_query($conn, $sql);


if($result)
{
  echo "<script>
  alert('등록 성공!');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('등록 실패!');
  location.href='join.php';
  </script>";
}

mysqli_close($conn);
?>
