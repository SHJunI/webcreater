<?php
require "header.php";
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="right_menu f_right">
  <div class="content">
      <br>
      <h1>안부 게시판</h1>
      <hr>
      <br>
    <form action="guest_ok.php" method="post">
      <textarea name="comment"></textarea>
      <p class="right"><span><button>등록하기</button></span></p>
    </form>
    <br>
<?php
$sql = "select * from guest_book";
$result = mysqli_query($conn, $sql);
$guest_item = mysqli_fetch_all($result, MYSQLI_ASSOC);
$guest_rows = mysqli_num_rows($result);
for($i = 0; $i < $guest_rows; $i++)
{
?>
    <div class="guest_list">
      <td><?=$guest_item[$i]['comment']?></td>
      <td><?=$guest_item[$i]['regdate']?></td>
    </div>
    <hr>
<?php
}
?>
  </div>
</div>
</body>
</html>
