<?php
require "header.php";
$sql = "select * from board where no = {$_GET['no']}";
$result = mysqli_query($conn, $sql);
$cur_item = mysqli_fetch_assoc($result);
mysqli_free_result($result);
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="right_menu f_left">
    <div class="content">
    <h1>글 수정</h1>
    <hr>
    <br>
  <table>
  <form action="mod_ok.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="no" value="<?=$cur_item['no']?>">
    <input type="hidden" name="org_cate" value="<?=$cur_item['category']?>">
    <input type="hidden" name="otg_img" value="<?=$cur_item['img']?>">
    <tr>
      <th>작성자</th>
      <td class="subject"><input type="text" name="writer" value="<?=$cur_item['writer']?>"></td>
    </tr>
    <tr>
      <th>카테고리</th><td colspan="2">
        <select name="cate">
<?php
for($i =0; $i < $cate_rows; $i++)
{
?>
          <option value="<?=$cate_list[$i]['no']?>" <?=($cur_item['category']==$cate_list[$i]['no'])?"selected":""?>><?=$cate_list[$i]['cate_name']?></option>
<?php
}
?>
        </select>
      </td>
    </tr>
    <tr>
      <th>제목</th>
      <td><input type="text" name="subject" value="<?=$cur_item['subject']?>"></td>
    </tr>
    <tr>
      <th>내용</th>
      <td><textarea name="comment" rows="15" cols="25"><?=$cur_item['comment']?></textarea></td>
    </tr>
    <tr>
      <th>이미지 변경</th>
      <td><input type="file" name="img" value="<?=$cur_item['img']?>"></td>
    </tr>
    <tfoot class="center">
      <td colspan="2">
        <button>수정</button>
      </tfoot>
  </form>
  </table>
</div>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>
