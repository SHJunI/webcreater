<?php
require "conn.php";

$sql = "insert into reply(purchar_id,product_no,comment) values ('{$_POST['id']}',{$_POST['no']},'{$_POST['comment']}')";
$result = mysqli_query($conn, $sql);

if(!$result)
{ ?>
<script>
alert('댓글등록 실패.');
location.href = history.back();
</script>
<?php
exit;
}
$sql = "update product_sales set review = 1 where purchar_id = '{$_POST['id']}' and product_no = {$_POST['no']}";
$result = mysqli_query($conn, $sql);
$sql = "update product set reply =reply + 1 where no {$_POST['no']}";
$result = mysqli_query($conn, $sql);
if(!$result)
{ ?>
<script>
alert('시스템 오류!');
location.href = history.back();
</script>
<?php
exit;
}
?>
<script>
alert('등록 성공!');
location.href = "purcha_status.php";
</script>
