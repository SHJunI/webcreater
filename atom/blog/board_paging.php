<?php
//카테고리 번호
$category = $_GET['category'];
$no = $_GET['no'];
$per_page = $_GET['per_page'];
if(!isset($_GET['page']))
{
  $_GET['page'] = 1;
}

$start = ($_GET['page'] -1) * $per_page;

require "conn.php";

$sql = "select cate_name, cnt from cate where no = {$category}";
$result = mysqli_query($conn, $sql);
$cur_cate = mysqli_fetch_assoc($result);

$sql = "select * from board where category = {$category} limit $start,$per_page";
$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
$cate_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<thead>
  <th class="subject left"><?=$cur_cate['cate_name']?>(<?=$cur_cate['cnt']?>)</th>
  <th class="date left">작성 날짜</th>
  <th class="left">조회수</th>
</thead>
<tbody>
<?php
for($i = 0; $i < $rows; $i++)
{?>
 <tr>
   <td><a href="index.php?no=<?=$cate_items[$i]['no']?>"><?=$cate_items[$i]['subject']?></a></td>
   <td><?=$cate_items[$i]['regdate']?></td><td><?=$cate_items[$i]['hit']?></td>
 </tr>
<?php
}
?>
</tbody>
<tfoot class="center">
<td colspan="2">
  <?php
  $sql = "select count(no) from board where category = {$category}";
  $result = mysqli_query($conn, $sql);
  $total_list = mysqli_fetch_row($result)[0];
  $total_page = ceil($total_list/ $per_page);

  $per_block = 2;
  $cur_block = ceil($_GET['page'] / $per_block);
  $start_page = (($cur_block-1) * $per_block)+1;
  $end_page = $cur_block * $per_block;

  if($end_page > $total_page)
  {
    $end_page = $total_page;
  }

  if($cur_block > 1)
  {
    $prev_block = $start_page - $per_block;
    echo "<a href='#' onclick='page({$prev_block}, {$per_page})'>◀ 이전</a>";
  }

  for($i = $start_page; $i <= $end_page; $i++)
  {
  ?>
  <a href="#" onclick="page(<?=$i?>, <?=$per_page?>)"><?=$i?></a>
  <?php
  }
  if(($end_page+1) <= $total_page)
  {
    $next_block = $end_page + 1;
    echo "<a href='#' onclick='page({$next_block}, {$per_page})'>다음 ▶</a>";
  }
  ?>
  <select name="per_page" class="f_right" onchange="per_page()">
    <option value="1" <?=($per_page==1)?"selected":""?>>1개씩 보기</option>
    <option value="2" <?=($per_page==2)?"selected":""?>>2개씩 보기</option>
    <option value="3" <?=($per_page==3)?"selected":""?>>3개씩 보기</option>
  </select>
</td>
</tfoot>
