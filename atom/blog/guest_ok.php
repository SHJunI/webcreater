<?php

require "conn.php";

$sql = "insert into  guest_book(comment) values('{$_POST['comment']}')";
$result = mysqli_query($conn, $sql);

if(!$result)
{
?>
<script>
alert('등록에 실패했습니다.');
location.href = history.back();
</script>
<?php
mysqli_close($conn);
exit;
}
else {
?>
<script>
alert('등록에 성공하였습니다.');
location.href = "guest_book.php";
</script>
<?php
mysqli_close($conn);
}
?>
