<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require "header.php";
 $sql = "update board set hit = hit +1 where no = {$cur_item['no']}";
 mysqli_query($conn, $sql);
?>
<div class="right_menu f_right">
<?php
if($cur_item['category'] == "")
{ ?>
<div class="center b_font">
  작성된 글 내용이 없습니다.
</div>
<?php
mysqli_close($conn);
exit;
 }

$per_page = 3;
if(!isset($_GET['page']))
{
  $_GET['page'] = 1;
}

$start = ($_GET['page'] -1) * $per_page;

 $sql = "select * from board where category = {$cur_item['category']} limit $start,$per_page";
 $result = mysqli_query($conn, $sql);
 $cate_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
 $rows = mysqli_num_rows($result);
 mysqli_free_result($result);

if(!$cur_cate['album'])
{
require "board_type.php";
}
else
{
require "album_type.php";
}
?>
</div>
<?php
mysqli_close($conn);
?>
</body>
</html>
