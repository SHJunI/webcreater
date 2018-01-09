<?php

require "conn.php";

if($_POST['org_img'])
{
  unlink("c:/xampp/htdocs/atom/blog/{$_POST['org_img']}");
}

$dbfile = "";
if(is_uploaded_file($_FILES['img']['tmp_name']))
{
  echo "파일이 정상 업로드 됨.";
  $folder = "C:\\xampp\\htdocs\\atom\\blog\\upload\\";
  $file_name = $_FILES['img']['name'];
  $upfile = $folder . $file_name;
  if(move_uploaded_file($_FILES['img']['tmp_name'], $upfile))
  {
    echo "파일이동 성공!";
    $dbfile = "./upload/{$file_name}";
  }
}
if(!$dbfile)
{
?>
<script>
alert('파일 업로드에 실패했습니다.');
location.href = history.back();
</script>
<?php
mysqli_close($conn);
exit;
}

$sql = "update profile set img='{$dbfile}', intro='{$_POST['intro']}'";
$result = mysqli_query($conn, $sql);

if($result)
{
?>
<script>
alert('프로필이 수정되었습니다.');
location.href = 'index.php';
</script>
<?php
}
else
{
?>
<script>
alert('프로필 수정 실패!');
location.href = history.back();
</script>
<?php
}
mysqli_close($conn);
?>
