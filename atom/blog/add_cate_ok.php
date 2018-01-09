<?php
require "conn.php";

$sql = "insert into cate(cate_name, top_no, remote_ip, album) values('{$_POST['cate_name']}',
{$_POST['top_no']},'{$_SERVER['REMOTE_ADDR']}', {$_POST['album']})";
$result = mysqli_query($conn, $sql);

//top_no 값이 0 이라면 상위 카테고리로 추가함
if(!$_POST['top_no'])
{
  $sql = "update cate set top_no = last_insert_id() where no = last_insert_id()";
  $result2 = mysqli_query($conn, $sql);
}

if(!$result or (!$_POST['top_no']) and !$result2)
{
?>
<script>
alert('카테고리 추가 실패!\n' + <?=mysqli_error($conn);?>);
location.href = history.back();
</script>
<?php
}
else
{
?>
<script>
alert('카테고리 추가 성공!');
location.href = "index.php";
</script>
<?php
}
?>
