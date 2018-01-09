<?php
require "header.php";
$sql = "select * from board where no = {$_GET['no']}";
$result = mysqli_query($conn, $sql);
$arr2 = mysqli_fetch_assoc($result);
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
  <form action="mod_ok.php" method="post">
    <input type="hidden" name="no" value="<?=$arr2['no']?>">
    <input type="hidden" name="org_cate" value="<?=$arr2['category']?>">
    <tr>
      <th>작성자</th>
      <td class="subject"><input type="text" name="writer" value="<?=$arr2['writer']?>"></td>
    </tr>
    <tr>
      <th>카테고리</th><td colspan="2">
        <select name="cate">
<?php
for($i =0; $i < $cate_rows; $i++)
{
?>
          <option value="<?=$cate_list[$i]['no']?>" <?=($arr2['category']==$cate_list[$i]['no'])?"selected":""?>><?=$cate_list[$i]['cate_name']?></option>
<?php
}
?>
        </select>
      </td>
    </tr>
    <tr>
      <th>제목</th>
      <td><input type="text" name="subject" value="<?=$arr2['subject']?>"></td>
    </tr>
    <tr>
      <th>내용</th>
      <td><textarea name="comment" rows="15" cols="25"><?=$arr2['comment']?></textarea></td>
    </tr>
    <tfoot class="center">
      <td colspan="2">
        <button>수정</button>
      </tfoot>
    </tr>
  </form>
  </table>
</div>
</div>
</body>
</html>
<?php
mysqli_close($conn);
?>
