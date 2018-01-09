<?php
require "conn.php";

if($_GET['no'] == $_GET['top_no'])
{
  $sql = "delete from reply where board_no IN (select no from board
  where category IN (select no from cate where top_no = {$_GET['no']}))";
  $result = mysqli_query($conn, $sql);
  $sql = "delete from board where category IN (select no from cate
  where top_no= {$_GET['no']})";
  $result = mysqli_query($conn, $sql);
  $sql = "delete from  cate where top_no = {$_GET['no']}";
  $result = mysqli_query($conn, $sql);
}
else
{
  $sql = "delete from reply where board_no IN (select no from cate
  where top_no= {$_GET['no']})";
  $result = mysqli_query($conn, $sql);
  $sql = "delete from board where category IN (select no from cate
  where top_no= {$_GET['no']})";
  $result = mysqli_query($conn, $sql);
  $sql = "delte from cate where no = {$_GET['no']}";
  $result = mysqli_query($conn, $sql);
}

if(!$result)
{
?>
<script>
alert('삭제 실패하였습니다.\n' + <?=mysqli_error($conn)?>);
location.href = histroy.back();
</script>
<?php
}
else
{
?>
<script>
alert('삭제 성공하였습니다.');
location.href = "index.php";
</script>
<?php
}
mysqli_close($conn);
?>
