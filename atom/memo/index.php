<html>
<head>
</head>
<body>
  <?php
  $conn = mysqli_connect("localhost", "root", "2919369", "board");

  if(isset($_POST['content']))
  {
    $mod = $_POST['content'];

    if($mod == "ins")
    {
      $sql = "insert into memo(content) values('{$_POST['content']}')";
    }
    else if($mod == "mod")
    {
      $sql = "update memo set Memo='{$_POST['content']}' where No = {$_POST['no']}";
    }
    else if($mod == "del")
    {
      $sql = "delete from memo where No = {$_POST['no']}";
    }

    mysqli_query($conn, $sql);
  }
?>
  <form name="memo" action="index.php" method="post">
  <table border="0" align="center">
    <tr>
    <td colspan="2" align="center">메모를 등록하세요</td>
  </tr>
  <tr>
    <input type="hidden" name="mod" value="ins">
    <td>
      <textarea name="memo" rows="5" cols="80"></textarea>
    </td>
    <td>
      <input type="submit" value="등록" style="height:80px; border:5px">
    </td>
  </tr>
  <br><br><br><br>
  <tr style="height:50px"></tr>
  </table>
 </form>
  <?php
  $sql = "select * from memo";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows($result);
  $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

  for($i = 0; $i < $rows; $i++)
  {
    echo "<table border=\"0\" align=\"center\">
  <form method=\"POST\" action=\"index.php\">
    <tr>
      <input type='hidden' name='no' value='{$arr[$i]['No']}'>
      <input type='hidden' name='content' value='mod'>
      <td rowspan='2'><textarea name=\"Memo\" rows=\"5\" cols=\"50\">{$arr[$i]['content']}</textarea></td>
      <td><input type=\"submit\" value=\"수정\" style=\"height:40px;border:0px\"></td>
  </form>
    </tr>
    <tr>
  <form method='POST' action='index1.php'>
      <input type='hidden' name='content' value='del'>
      <input type='hidden' name='no' value='{$arr[$i]['No']}'>
      <td><input type=\"submit\" value=\"삭제\" style=\"height:40px;border:0px\"></td>
    </tr>
  </form>
  </table>";
  }
  ?>
</body>
</html>
