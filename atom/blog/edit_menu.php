<?php

require "conn.php";

$sql = "update cate set show_menu = 0";
mysqli_query($conn,$sql);

$cate_list = implode(",", $_POST['cate']);
$sql = "update cate set show_menu = 1 where no IN ({$cate_list})";
$result = mysqli_query($conn, $sql);

if($result)
{
?>
<script>
alert('수정되었습니다.');
location.href= "index.php";
</script>
<?php
}
mysqli_close($conn);
?>
