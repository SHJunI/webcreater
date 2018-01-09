<?php
require "auth_check.php";
require 'conn.php';
$sql = "select * from users";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
$rows = mysqli_num_rows($result);
?>
<html>
<head>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require "admin_header.php"; ?>
  <form action="delete.php" method="get">
  <table>
    <caption>회원목록</caption>
    <tr>
      <td>선택</td>
      <td>번호</td>
      <td>ID</td>
      <td>이름</td>
      <td>성별</td>
      <td>나이</td>
      <td>주소</td>
      <td>이메일</td>
      <td>관리자여부</td>
    </tr>
    <?php
    for($i = 0; $i < $rows; $i++)
    {
    ?>
    <tr>
      <td><input type="checkbox" name="check[]" value="<?=$arr[$i]['no']?>"></td>
      <td><?=$arr[$i]['no']?></td>
      <td><?=$arr[$i]['id']?></td>
      <td><?=$arr[$i]['name']?></td>
      <td><?=($arr[$i]['ses'])?"여":"남"?></td>
      <td><?=$arr[$i]['age']?></td>
      <td><?=$arr[$i]['addr']?></td>
      <td><?=$arr[$i]['email']?></td>
      <td>
       Y<input type="radio" name="<?=$arr[$i]['admin']?>" <?php if($arr[$i]['admin']) { ?> checked<?php } ?>>&nbsp;
       N<input type="radio" name="<?=$arr[$i]['admin']?>" <?php if(!$arr[$i]['admin']) { ?> checked<?php } ?>>
      </td>
    </tr>
    <?php
     } ?>
     <tr>
       <td colspan="9" align="center">
         <input type="submit" value="탈퇴">&nbsp;
         <input type="submit" formaction="index.php" value="돌아가기">
       </td>
     </tr>
  </table>
</form>
<?php
require "admin_floot.php";
?>
