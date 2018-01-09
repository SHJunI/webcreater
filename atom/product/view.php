<?php
require "auth_check.php";
?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  require "conn.php";
  $sql = "select * from product where no = {$_GET['num']}";
  $result = mysqli_query($conn,$sql);
  $arr = mysqli_fetch_assoc($result);
  require "admin_header.php";
?>
  <form action="update.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="num" value="<?=$_GET['num']?>">
    <input type="hidden" name="file_name" value="<?=$arr['upload']?>">
    <table border="1" align="center">
      <tr>
        <td>상품명</td>
        <td><input type="text" name="name" value="<?=$arr['name']?>"></td>
      </tr>
      <tr>
        <td>재고</td>
        <td><input type="text" name="stock" value="<?=$arr['stock']?>"></td>
      </tr>
      <tr>
        <td>가격</td>
        <td><input type="text" name="price" value="<?=$arr['price']?>"></td>
      </tr>
      <tr>
        <td>이미지 변경</td>
        <td><input type="file" name="file"></td>
      </tr>
      <tr>
        <td>상품이미지</td>
        <td><?php if($arr['upload'] != '')
        {
          echo "<img src = '{$arr['upload']}' width='50px'>";
        }?></td>
      </tr>
      <tr>
        <td>이미지 다운로드</td>
        <td><?php if($arr['upload'] != '')
        {
          echo "<a href = '{$arr['upload']}' download>다운로드</a>";
        }?></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" value="수정">
          <input type="submit" value="삭제" formaction="del.php">
        </td>
      </tr>
    </table>
  </form>
  <table>
    <caption>상품리뷰</caption>
    <tr>
      <th>작성자</th><th>내용</th><th>작성일</th>
    </tr>
    <?php
    $sql = "select *from reply where product_no = {$_GET['num']}";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $rows = mysqli_num_rows($result);
    for($i = 0; $i < $rows; $i++)
    {
     ?>
    <tr>
      <td><?=$arr[$i]['purchar_id']?></td><td><?=$arr[$i]['comment']?></td><td><?=$arr[$i]['regdate']?></td>
    </tr>
    <?php
    }
    ?>
  </table>
<?php
require "admin_floot.php";
?>
