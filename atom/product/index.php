<?php
require "conn.php";

$per_page = 12;
if(!isset($_GET['page']))
{
  $_GET['page'] = 1;
}
$start = ($_GET['page'] - 1)* $per_page;
if(isset($_GET['keyword']))
{
$sql = "select *, format(price, 0) as price2 from product where name like '%{$_GET['keyword']}%' limit $start,$per_page";
}
else
{
$sql = "select *, format(price, 0) as price2 from product limit $start,$per_page";
}
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
$rows = mysqli_num_rows($result);
mysqli_free_result($result);
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
 <script>
  function enter(form)
  {
    if(form.keycode == 13)
    {
      form.submit();
    }
  }
 </script>
</head>
<body>
  <?php require "header.php" ?>
    <div class="logo">
      <img src="logo_top.gif">
    </div>
    <div class="search">
      <form action="index.php" method="get">
      <input type="search" name="keyword" size="30" onkeypress="enter(this);"
      placeholder="상품명을 입력하세요" onfocus="this.placeholder=''"
      onblur="thins.placeholder='상품명을 입력하세요'">
      </form>
    </div>
    <div class="product_list">
    <?php
      for($i = 0; $i < $rows; $i++)
      {
    ?>
      <div class="product" onclick="location.href='product_veiw.php?num=<?=$arr[$i]['no']?>'">
        <div class="product_img">
        <img src="<?=$arr[$i]['upload']?>" width="100%" height="100%">
        </div>
        <div class="product_content">
          <div><?=$arr[$i]['name']?></div><div><?=$arr[$i]['price2']?>원</div>
        </div>
      </div>
    <?php
     }
     ?>
   </div>
   <div>
     <?php
     $q = "";
     if(isset($_GET['keyword']))
     {
       $sql = "select count(no) from product where name like '%{$_GET['keyword']}%'";
       $q = "&keyword={$_GET['keyword']}";
     }
     else
     {
       $sql = "select count(no) from product";
     }
     $result = mysqli_query($conn, $sql);
     $total_list = mysqli_fetch_row($result)[0];
     //product 테이블의 데이터 개수 추출
     $total_page = ceil($total_list / $per_page);

     $per_block = 10;
     $total_block = ceil($total_page / $per_block);
     $cur_block = ceil($_GET['page'] / $per_block);
     $start_page = (($cur_block - 1) * $per_block) + 1;
     $end_page = $cur_block * $per_block;

     $end_page = ($end_page > $total_page)?$total_page:$end_page;

     if($cur_block > 1)
     {
       $prev_block = $start_page - $per_block;
       echo "<a href='index.php?page={$prev_block}{$q}'>이전</a>";
     }
     for($i = $start_page; $i <= $end_page; $i++)
     {
       echo "<a href='index.php?page={$i}{$q}'>{$i}</a>";
     }
     if(($end_page+1) <= $total_page)
     {
       $next_block = $end_page +1;
       echo "<a href='index.php?page={$next_block}{$q}'>다음</a>";
     }
     ?>
   </div>
<?php require "floot.php"; ?>
