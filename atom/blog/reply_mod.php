<?php

require "conn.php";

$sql = "update reply set comment='{$_POST['comment']}' where no = {$_POST['no']}";
$result = mysqli_query($conn, $sql);


if(!$result)
{
?>
<script>
alert('수정에 실패하였습니다.');
location.href = history.back();
</script>
<?php
mysqli_close($conn);
}
else {
?>
<script>
alert('수정에 성공하였습니다.');
location.href = "index.php?no=" + <?=$_POST['board_no']?>;
</script>
<?php
mysqli_close($conn);
}
?>
