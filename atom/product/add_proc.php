<?php

if($_POST['name'] == "" or $_POST['stock'] == "" or $_POST['price'] == "")
{
  echo "<script>
  alert('내용이 입력되지 않았습니다.');
  location.href=history.back();
  </script>";
}



$conn = mysqli_connect("localhost", "root", "2919369", "product");

$name = mysqli_escape_string($conn, $_POST['name']);
$stock = (int)$_POST['stock'];
$price = (int)$_POST['price'];

if(!$conn)
{
  echo "DB 접속에 실패 했습니다.";
  exit;
}
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


$sql = "insert into product(name, stock, price,upload)
values ('{$_POST['name']}', {$_POST['stock']}, {$_POST['price']}, '{$dbfile}')";
$result = mysqli_query($conn, $sql);


if($result)
{
  //echo "상품등록 성공";
  echo "<script>
  alert('상품등록 성공');
  location.href='list.php';
  </script>";
}
else {
//  echo "상품등록 실패";
  //echo mysqli_error($conn);
  echo "<script>
  alert('상품등록 실패\\n쿼리구문 오류');
  location.history.back();
  </script>";
}

mysqli_close($conn);
?>
