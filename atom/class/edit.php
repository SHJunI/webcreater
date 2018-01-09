<?php
$no = $_POST['no'];

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
  <form name="view" action="edit_ok.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="no" value="<?=$_POST['no']?>">
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
        <td><input type="text" name="class" size="15" maxlength="15" value="<?=$arr['class']?>"></td>
      </tr>
      <tr>
        <td>이름</td>
        <td><input type="text" name="name" size="10" maxlength="10" value="<?=$arr['name']?>"></td>
      </tr>
      <tr>
        <td>학점</td>
        <td><input type="text" name="score" value="<?=$arr['score']?>"></td>
      </tr>
      <tr>
        <td>사진 변경</td>
        <td><input type="file" name="file"></td>
      </tr>
      <tr>
        <td colspan="2" align="center">
          <input type="submit" value="수정완료">
        </td>
      </tr>
    </table>
  </form>
</body>
</html>
<?php
mysqli_close($conn);
?>
