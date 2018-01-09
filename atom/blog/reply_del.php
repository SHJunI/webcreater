<?php

require "conn.php";

if($_POST['no'] == $_POST['top_no'])
{
$sql = "delete from reply where top_no = {$_POST['top_no']}";
}
else {
  $sql = "delete from reply where no = {$_POST['no']}";
}
$result = mysqli_query($conn, $sql);

if(!$result)
{
?>
<script>
alert('삭제에 실패했습니다.');
location.href = history.back();
</script>
<?php
mysqli_close($conn);
}
else {
?>
<script>
alert('삭제 성공!');
location.href = "index.php?no=" + <?=$_POST['board_no']?>
</script>
<?php
mysqli_close($conn);
}
 ?>
