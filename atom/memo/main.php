<html>
<head>
</head>
<body>
  <form name="memo" action="add.php" method="post">
  <table border="0" align="center">
    <tr>
    <td colspan="2" align="center">메모를 등록하세요</td>
  </tr>
  <tr>
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
  $conn = mysqli_connect("localhost","root","2919369","board");
  $sql = "select * from memo";
  $result = mysqli_query($conn, $sql);
  $rows = mysqli_num_rows($result);
  $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

  for($i = 0; $i < $rows; $i++)
  {
    echo "<form name='memo1' action='update.php' method='post'>
    <table border='0' align='center'>
      <tr>
      <td colspan='2' align='center'>메모를 등록하세요</td>
    </tr>
    <tr>
      <input type='hidden' name='no' value='{$arr[$i]['no']}'>
      <td rowspan='2'>
        <textarea name='memo' rows='5' cols='80'>{$arr[$i]['content']}</textarea>
      </td>
      <td>
        <input type='submit' value='수정'>
      </td>
    </tr>
    <tr>
    <td>
    <input type='submit' value='삭제' formaction='del.php'>
    </td>
    </tr>
    </table>
    </form>";
  }
  ?>
</body>
</html>
