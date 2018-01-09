<?php

require "conn.php";

$page = $_GET['page'];
$per_page = 2;
$start = ($page - 1)* $per_page;

$sql = "select * from board where category = 1 limit {$start},{$per_page}";
$result = mysqli_query($conn, $sql);
$cate_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
$rows = mysqli_num_rows($result);
mysqli_free_result($result);

for($i =0; $i < $rows; $i++)
{
?>
<tr>
 <td><?=$cate_items[$i]['subject']?></td>
 <td><?=$cate_items[$i]['regdate']?></td>
 <td><?=$cate_items[$i]['hit']?></td>
</tr>
<?php
}
?>
