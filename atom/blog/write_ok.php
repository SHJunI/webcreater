<?php
require "conn.php";
$type = substr($_FILES['img']['type'], 0, 5);
if(($type != "image" and $type != "video") and $type)
{
?>
<script>
alert('이미지/동영상 파일이 아닙니다.');
location.href = history.back();
</script>
<?php
exit;
}

$img = $_FILES['img'];
$dbfile = "";
if(is_uploaded_file($img['tmp_name']))
{
  $folder = "c:/xampp/htdocs/atom/blog/upload/";
  $file_name = time() . "_" . $img['name'];
  $upfile = $folder . $file_name;

  if(move_uploaded_file($img['tmp_name'], $upfile))
  {
    $dbfile = "/atom/blog/upload/{$file_name}";
  }
}

$subject = mysqli_real_escape_string($conn, $_POST['subject']);
$comment = mysqli_real_escape_string($conn, $_POST['comment']);
$writer = mysqli_real_escape_string($conn, $_POST['writer']);

if($subject == '' or $comment == '' or $writer == '')
{
  echo "<script>
  alert('내용작성 후 등록해주세요!');
  location.href=history.back();
  </script>";
  mysqli_close($conn);
  exit;
}

$sql = "insert into board(subject,comment,writer,category, remote_ip,img)
values ('{$subject}','{$comment}','{$writer}',{$_POST['cate']},'{$_SERVER['REMOTE_ADDR']}','{$dbfile}')";
$result = mysqli_query($conn, $sql);
$sql = "update cate set cnt = cnt +1 where no = {$_POST['cate']}";
$result = mysqli_query($conn, $sql);


if($result)
{
  echo "<script>
  alert('등록완료!');
  location.href='index.php';
  </script>";
  mysqli_close($conn);
  exit;
}
else {
  echo "<script>
  alert('등록실패!');
  location.href= history.back();
  </script>";
}
mysqli_close($conn);
?>
