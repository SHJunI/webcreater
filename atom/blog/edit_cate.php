<?php
require "conn.php";


$sql = "update cate set cate_name = '{$_GET['cate_name']}' where no = {$_GET['no']}";
$result = mysqli_query($conn, $sql);

if(!$result)
{ ?>
<script>
alert('수정 실패!\n' + '<?=addcslashes(mysqli_error($conn))?>');
location.href = histroy.back();
</script>
<?php
}
else
{
?>
<script>
alert('수정 성공!');
location.href = "add_cate.php";
</script>
<?php
}
mysqli_close($conn);
?>
