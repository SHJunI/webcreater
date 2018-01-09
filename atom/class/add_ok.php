<?php

if($_POST['id'] == "" or $_POST['class'] == "" or $_POST['name'] == "")
{
  echo "<script>
  alert('학번,학과,이름은 넣어주세요 ^ㅡ^');
  location.href=history.back();
  </script>";
}



$conn = mysqli_connect("localhost","root","2919369","student");


$dbfile = "";
if(is_uploaded_file($_FILES['file']['tmp_name']))
{
  $updir = "c:\\xampp\\htdocs\\atom\\class\\upload\\";
  $file = time() . "_" . $_FILES['file']['name'];
  $upfile = $updir . $file;
  if(move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
  {
    $dbfile = "/atom/class/upload/" . $file;
  }
}

$sql = "insert into school(id,class,name,score,upload) values ('{$_POST['id']}','{$_POST['class']}',
'{$_POST['name']}',{$_POST['score']},'{$dbfile}')";
$result = mysqli_query($conn, $sql);

if($result)
{
  echo "<script>
  alert('등록 성공');
  location.href='main.php';
  </script>";
}
else {
  echo "<script>
  alert('등록 실패\\n쿼리구문 오류');
  location.history.back();
  </script>";
}
mysqli_close($conn);
?>
