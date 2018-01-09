<div class="content">
  <script>
  function popup(img, type)
  {
    window.open("view_img.php?img="+img+"&type="+type, "popup_win", "width='500', height='700', scrollbar='no', menubar='no'");
  }
  </script>
<?php
  for($i = 0; $i < $rows; $i++)
  {
?>
<div class="album_content f_left border">
  <div class="album_img center">
    <span class="img_menu">
    <a href="img_mod.php?no=<?=$cate_items[$i]['no']?>">수정</a>
    <a href="del.php?no=<?=$cate_items[$i]['no']?>&cate=<?=$cate_items[$i]['category']?>">삭제</a>
    </span>
<?php
$content_type = mime_content_type("c:/xampp/htdocs/{$cate_items[$i]['img']}");
$content_type = substr($content_type, 0, 5);
if($content_type == "image")
{
?>
    <img src="<?=$cate_items[$i]['img']?>" onclick="popup('<?=$cate_items[$i]['img']?>','<?=$content_type?>');">
<?php
}
else {
?>
    <video src="<?=$cate_items[$i]['img']?>" onclick="popup('<?=$cate_items[$i]['img']?>','<?=$content_type?>');">
<?php
}
?>
  </div>
  <div class="album_subject">
    <?=$cate_items[$i]['subject']?>
  </div>
</div>
<?php
}
?>
</div>
