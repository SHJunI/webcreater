<?php

$conn= mysqli_connect("localhost","root","2919369","product");

if(!$conn)
{
  echo "DB 접속에 실패 했습니다.";
  exit;
}
$dbfile = "";
if($_FILES['file']['size'])
{
  $dbfile = "";
  if(is_uploaded_file($_FILES['file']['tmp_name']))
  {
    echo "파일 업로드 성공";
    $updir = "c:\\xampp\\htdocs\\atom\\product\\upload\\";
    $file = time() . "_" . $_FILES['file']['name'];
    $upfile = $updir . $file;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
      echo "파일이동 성공";
      $dbfile = "/atom/product/upload/" . $file;
    }
  }
  $sql= "update product set name='{$_POST['name']}',stock={$_POST['stock']},price={$_POST['price']}, upload='{$dbfile}'
  where no={$_POST['num']}";
  unlink("c:/xampp/htdocs" . $_POST['file_name']);
}
else
{
  $sql= "update product set name='{$_POST['name']}',stock={$_POST['stock']},price={$_POST['price']}
  where no={$_POST['num']}";
}


$result = mysqli_query($conn, $sql);

if($result)
{
  echo "<script>
  alert('상품 수정 성공');
  location.href='list.php';
  </script>";
}
else {
  echo "<script>
  alert('상품 수정 실패');
  location.href='list.php';
  </script>";
}
?>
