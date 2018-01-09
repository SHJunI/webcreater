<?php
require "conn.php";

$sql = "select * from board order by no desc limit 0, 1";
if(isset($_GET['category']))
{
  $sql = "select * from board where category = {$_GET['category']} order by no desc limit 0, 1";
}
if(isset($_GET['no']))
{
 $sql = "select *from board where no = {$_GET['no']}";
}

$result = mysqli_query($conn,$sql);
$cur_item = mysqli_fetch_assoc($result);
$rows = mysqli_num_rows($result);
mysqli_free_result($result);
?>
<div class="right s_font">
  <p class="writer">
  <a href="write.php">글쓰기</a>&nbsp;
</p>
<div class="logo center">
<img src="logo.jpg">
</div>
</div>
<div class="menu s_font">
  <span class="f_left">
    <a href="index.php">블로그</a>
<?php
$sql = "select * from cate order by top_no, no";
$result = mysqli_query($conn, $sql);
$cate_list = mysqli_fetch_all($result, MYSQLI_ASSOC);
$cate_rows = mysqli_num_rows($result);

for($i = 0;$i < $cate_rows; $i++)
{
  if($cate_list[$i]['show_menu'])
  {
?>
    <a href="index.php?category='<?=$cate_list[$i][no]?>'"><?=$cate_list[$i]['cate_name']?></a>
<?php
  }
}
?>
  </span>
  <span class="f_right">
    <a href="guest_book.php">안부</a>
</div>
<div class="left_menu f_left center">
  <br>
<div class="content border">
<?php
$sql = "select * from profile";
$result = mysqli_query($conn, $sql);
$profile = mysqli_fetch_assoc($result);
?>
<div class="profile"><img src="<?=$profile['img']?>"></div>
<p>아이디(닉네임)</p>
<p><?=$profile['intro']?></p>
<p class="right"><a href="profile.php" class="s_font">프로필 수정</a></p>
</div>
<div class="s_font left category">
<p>카테고리<a href="add_cate.php" title="카테고리 추가">+</a></p>
<?php
 for($i = 0; $i < $cate_rows; $i++)
 {
   if($cate_list[$i]['no'] == $cur_item['category'])
   {
     $cur_cate = $cate_list[$i];
   }
   echo "<p><a href='index.php?category={$cate_list[$i]['no']}'>";
   if($cate_list[$i]['no'] != $cate_list[$i]['top_no'])
   {
     echo "└";
   }
   echo "{$cate_list[$i]['cate_name']}[{$cate_list[$i]['cnt']}]</a></p>";
 }
?>
</div>
</div>
