<?php
$no = $_GET['no'];

$conn = mysqli_connect("localhost","root","2919369","student");
$sql = "select * from school where no = $no";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_assoc($result);
?>
<html>
<head>
  <title>상세보기</title>
</head>
<body>
  <form name="view" action="edit.php" method="post">
    <input type="hidden" name="no" value="<?=$_GET['no']?>">
    <input type="hidden" name="file_name" value="<?=$arr['upload']?>">
    <table border="2" align="center">
      <tr>
        <td colspan="2" align="center">정보 상세보기</td>
      </tr>
      <tr>
        <td>학번</td>
        <td><input type="text" name="id" value="<?=$arr['id']?>" disabled></td>
      </tr>
      <tr>
        <td>학과</td>
        <td><input type="text" name="class" value="<?=$arr['class']?>" disabled></td>
      </tr>
      <tr>
        <td>이름</td>
        <td><input type="text" name="name" value="<?=$arr['name']?>" disabled></td>
      </tr>
      <tr>
        <td>학점</td>
        <td><input type="text" name="score" value="<?=$arr['score']?>"></td>
      </tr>
      <tr>
        <td>사진</td>
        <td><?php if($arr['upload'] != '')
        {
          echo "<img src = '{$arr['upload']}' width ='80px'>" . "<br>";
          echo "<a href ='{$arr['upload']}' download>다운로드</a> ";
        }
          ?></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="수정">&nbsp;
          <input type="submit" formaction="main.php" value="메인으로">&nbsp;
          <input type="submit" formaction="del.php" value="삭제">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
<?php
mysqli_close($conn);
?>
