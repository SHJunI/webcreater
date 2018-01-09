<?php

require "conn.php";

$sql = "insert into reply(board_no, comment, writer,top_no) values({$_POST['board_no']}, '{$_POST['comment']}',
'{$_POST['writer']}', {$_POST{'top_no'}})";
$result = mysqli_query($conn, $sql);
if(!$_POST['top_no'])
{
  $sql = "update reply set top_no = last_insert_id() where no = last_insert_id()";
  mysqli_query($conn, $sql);
}

if(!$result)
{
?>
<script>
alert('댓글 등록에 실패했습니다.\n' + '<?=addslashes(mysqli_error($conn))?>');
location.href = history.back();
</script>
<?php
mysqli_close($conn);
exit;
}
else
{
?>
<script>
alert('댓글이 정상적으로 등록되었습니다.');
location.href = "index.php?no=" + <?=$_POST['board_no']?>;
</script>
<?php
}
mysqli_close($conn);
exit;
?>
