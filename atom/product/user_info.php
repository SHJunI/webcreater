<?php
require "auth_check.php";
require "conn.php";
require "header.php";
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  $sql = "select * from users where id = '{$_SESSION['id']}'";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_assoc($result);
  ?>
  <div class="user_info">
  <table>
    <form action="user_mod.php" method="post">
      <input type="hidden" name="org_pw" value="<?=$arr['pw']?>">
    <tr>
      <th>I D</th><td><input type="text" name="id" value="<?=$arr['id']?>" readonly></td>
    </tr>
    <tr>
      <th>PW 변경</th><td><input type="password" name="pw"></td>
    </tr>
    <tr>
      <th>이름</th><td><input type="text" name="name" value="<?=$arr['name']?>"></td>
    </tr>
    <tr>
      <th>이메일</th><td><input type="text" name="email" value="<?=$arr['email']?>"></td>
    </tr>
    <tr>
      <th>주소</th><td><input type="text" name="addr" value="<?=$arr['addr']?>"></td>
    </tr>
    <tr>
      <th>전화번호</th><td><input type="text" name="tel" value="<?=$arr['tel']?>"></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><button type="submit">회원정보 수정</button>&nbsp;&nbsp;
      <button type="button" onclick="location.href='index.php';">이전</button></td>
    </tr>
  </form>
  </table>
</div>
<?php require "floot.php"; ?>
