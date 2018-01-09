<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require "header.php"?>
<div class="right_menu f_right">
  <div class="content">
  <h1>새로운 글쓰기</h1>
  <hr>
  <br>
  <table>
  <form action="write_ok.php" method="post" enctype="multipart/form-data">
    <tr>
      <th>작성자</th>
      <td class="subject"><input type="text" name="writer"></td>
    </tr>
    <tr>
      <th>카테고리</th><td colspan="2">
        <select name="cate">
<?php
require "conn.php";
 $sql = "select no, cate_name from cate";
 $result = mysqli_query($conn, $sql);
 $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
 $rows = mysqli_num_rows($result);
for($i =0; $i < $rows; $i++)
{
          ?>
          <option value="<?=$arr[$i]['no']?>"><?=$arr[$i]['cate_name']?></option>
<?php
}
?>
        </select>
      </td>
    </tr>
    <tr>
      <th>제목</th>
      <td class="subject"><input type="text" name="subject"></td>
    </tr>
    <tr>
      <th>내용</th>
      <td><textarea name="comment" rows="15" cols="25"></textarea></td>
    </tr>
    <tr>
      <th>이미지</th>
      <td><input type="file" name="img" accept="image/*, video/*"></tr>
    <tfoot class="center">
      <td colspan="2"><button>작성완료</button></td>
    </tfoot>
  </form>
  </table>
</div>
</div>
</body>
</html>
