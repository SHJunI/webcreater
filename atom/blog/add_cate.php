<html>
<head>
  <link rel="stylesheet" href="style.css">
  <script>
  function edit_cate(src, no)
  {
    cate_name = document.getElementById('cate_name'+no).innerHTML;
    if(!cate_name)
    {
      alert('내용이 입력되지 않았습니다.');
      document.getElementById('cate_name'+no).innerHTML = '카테고리 이름';
      return false;
    }
    location.href = 'edit_cate.php?cate_name=' + cate_name + '&no=' + no;
  }
  function del_cate(no, top_no)
  {
    if(confirm('카테고리를 삭제하시겠습니까?'))
    {
      location.href = 'del_cate.php?no=' + no + '&top_no=' + top_no;
    }
  }
  </script>
</head>
<body>
  <?php require "header.php"; ?>
  <div class="right_menu f_right">
  <div class="content">
    <h1>카테고리 관리</h1>
    <hr>
    <br>
    <form action="add_cate_ok.php" method="post">
    <p class="center">
    <select name="top_no">
      <option value="0">상위카테고리</option>
<?php
for($i = 0; $i < $cate_rows; $i++)
{
  if($cate_list[$i]['no'] == $cate_list[$i]['top_no'])
  {
?>
      <option value="<?=$cate_list[$i]['no']?>"><?=$cate_list[$i]['cate_name']?></option>
<?php
  }
}
?>
    </select>
    <select name="album">
      <option value="0">게시판 형태</option>
      <option value="1">갤러리 형태</option>
    </select>
    <input type="text" name="cate_name" placeholder="카테고리 이름"
    onfocus="this.placeholder=''" onblur="this.placeholder='카테고리 이름'">
    <button>추가</button>
   </p>
   </form>
   <hr>
<?php
for($j = 0; $j < $cate_rows; $j++)
{
  if($cate_list[$j]['no'] == $cur_item['category'])
  {
    $cur_cate = $cate_list[$j];
  }?>
<p class='del_cate'><input type="checkbox" form="edit_menu" name="cate[]" value="<?=$cate_list[$j]['no'] ?><?=$cate_list[$j]['show_menu']?"checked":""?>">
<?php
  if($cate_list[$j]['no'] != $cate_list[$j]['top_no'])
  {
    echo "└";
  }?>
<span contentEditable='true' id="cate_name<?=$cate_list[$j]['no']?>"><?=$cate_list[$j]['cate_name']?></span>(<?=$cate_list[$j]['cnt']?>)
<a href="#" onclick="del_cate(<?=$cate_list[$j]['no']?>,<?=$cate_list[$j]['top_no']?>)">삭제</a>
<a href="#" onclick="edit_cate(this, <?=$cate_list[$j]['no']?>)">수정</a></p>
<?php
}
?>
<div class="center">
  <form action="edit_menu.php" method="post" id="edit_menu">
    <button>메뉴 수정</button>
  </form>
</div>
  </div>
  </div>
</body>
<html>
