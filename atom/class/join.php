<html>
<head>
  <title>등록 페이지</title>
</head>
<body>
  <form action="join_ok.php" method="POST">
    <table border="2" align="center">
      <caption>회원가입</caption>
      <tr>
        <td>ID</td>
        <td><input type="text" name="id" placeholder="ID를 입력필수!" required></td>
      </tr>
      <tr>
        <td>비밀번호</td>
        <td><input type="password" name="pw" placeholder="비밀번호 입력필수!" required></td>
      </tr>
      <tr>
        <td>이름</td>
        <td><input type="text" name="name" placeholder="이름 입력필수!!!" required></td>
      </tr>
      <tr>
        <td>이메일</td>
        <td><input type="text" name="email" placeholder="이메일은 기입자유"></td>
      </tr>
      <tr>
        <td>나이</td>
        <td><input type="text" name="age" placeholder="나이 필수입력" required></td>
      </tr>
      <tr>
        <td>성별</td>
        <td><input type="radio" name="ses" value="0">남성 &nbsp;
          <input type="radio" name="ses" value="1">여성</td>
        </tr>
        <tr>
          <td>주소</td>
          <td><input type="text" name="addr" placeholder="신주소 필수입력요망" required></td>
        </tr>
        <tr>
          <td>연락처</td>
          <td><input type="text" name="tel" placeholder="연락처 필수입력!" required></td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="등록완료"></td>
          </tr>
        </table>
      </form>
</body>
</html>
