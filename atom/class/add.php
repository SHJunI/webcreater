<html>
<head>
  <title>성적 등록</title>
</head>
<form name="adds" method="post" action="add_ok.php" enctype="multipart/form-data">
  <table border="1" align="center">
    <tr>
      <td colspan="2" align="center">성적 신규등록</td>
    </tr>
    <tr>
      <td>학번</td>
      <td>
        <input type="text" name="id" size="10" maxlength="10">
      </td>
    </tr>
    <tr>
      <td>학과</td>
      <td>
        <input type="text" name="class" size="10" maxlength="10">
      </td>
    </tr>
    <tr>
      <td>이름</td>
      <td>
        <input type="text" name="name" size="10" maxlength="10">
      </td>
    </tr>
    <tr>
      <td>학점</td>
      <td>
        <input type="text" name="score" size="10" maxlength="10">
      </td>
    </tr>
    <tr>
      <td>사진</td>
      <td>
        <input type="file" name="file">
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="등록완료">
      </td>
    </tr>
  </table>
</form>
</body>
</html>
