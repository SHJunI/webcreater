<?php

require "conn.php";

$dbfile = "";
if(isset($_FILES['img']))
{
if($_FILES['img']['size'])
{
  unlink("c:/xampp/htdocs/{$_POST['org_img']}");
}

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

$sql = "update board set subject='{$subject}', comment='{$comment}', writer='{$writer}',category={$_POST['cate']},
img = '{$dbfile}' where no = {$_POST['no']}";
$result = mysqli_query($conn, $sql);
if($_POST['cart'] != $_POST['org_cate'])
{
  $sql = "update cate set cnt = cnt +1 where no = {$_POST['cate']}";
  $result = mysqli_query($conn, $sql);
  $sql = "update cate set cnt = cnt -1 where no = {$_POST['org_cate']}";
  $result = mysqli_query($conn, $sql);
}

if($result)
{
?>
<script>
  alert('수정 완료!');
  location.href='index.php?no=' + <?=$_POST['no']?>;
  </script>
<?php
  mysqli_close($conn);
  exit;
}
else {
  echo "<script>
  alert('수정 실패!');
  location.href= history.back();
  </script>";
}
mysqli_close($conn);
?>

?>
