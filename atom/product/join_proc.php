<?php

$id_check = $_POST['id_check'];
if(!$id_check)
{
?>
<script>
alert("ID 중복검사를 완료해주세요.");
location.href = history.back();
</script>
<?php
exit;
}


$conn = mysqli_connect("localhost","root","2919369","product");
$sql ="insert into users (id,pw,name,age,ses,addr,tel,email) values ('{$_POST['id']}',sha2('{$_POST['pw']}',0),
'{$_POST['name']}',{$_POST['age']},{$_POST['ses']},'{$_POST['addr']}','{$_POST['tel']}','{$_POST['email']}')";
$result = mysqli_query($conn, $sql);


if($result)
{
 echo "<script>
 alert('회원가입 성공!');
 location.href='index.php';
 </script>";
}
else
{
  echo "<script>
  alert('회원가입 실패!');
  location.href='index.php';
  </script>";
}

mysqli_close($conn);
?>
