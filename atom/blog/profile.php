<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
require "header.php";
?>
<div class="right_menu f_right">
  <div class="content">
    <h1>프로필 수정</h1>
    <hr>
    <br>
    <table>
      <form action="profile_ok.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="org_img" value="<?=$profile['img']?>">
      <tr>
        <th>프로필 사진</th>
        <td class="subject"><input type="file" name="img"></td>
      </tr>
      <tr>
        <th>블로그 소개</th>
        <td><textarea name="intro"></textarea></td>
      </tr>
      <tfoot>
        <td colspan="2" class="center">
          <button>프로필 수정</button>
        </td>
      </tfoot>
      <</form>
    </table>
  </div>
</div>
</body>
</html>
