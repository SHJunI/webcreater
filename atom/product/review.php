<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php require "header.php"; ?>
  <table>
    <form action="review_proc.php" method="post">
      <input type="hidden" name="no" value="<?=$_GET['no']?>">
      <tr>
        <th>작성자</th>
        <td><input type="text" name="id" value="<?=$_SESSION['id']?>"></td>
      </tr>
      <tr>
        <th>내 용</th>
        <td><textarea name="comment" rows="20" cols="50" maxlength="1000"></textarea></td>
      </tr>
      <tr>
        <td colspan="2"><button>등록하기</button></td>
      </tr>
    </form>
    </table>
<?php require "floot.php"; ?>
