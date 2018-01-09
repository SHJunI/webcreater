<?php session_start(); ?>
<html>
<head>
  <style>
  table{
    border-collapse: collapse;
    border: center;
    text-align: center;
    margin: auto;
    border: 0px;
  }
  caption {
    font-weight: bold;
    text-decoration: underline;
    margin-bottom: 10px;
  }
  input[type='text'] , input[type='password'] {
    border: 1px solid #CCCCCC;
    border-radius: 5px;
    outline: 0px;
    padding-left: 5px;
    padding-right: 5px;
    border-width: 0px 0px 1px 0px;
    }
  input[type='submit'] {
    border: 0px;
    font-weight: bold;
  }
  </style>
  <script src="jquery-3.2.1.js"></script>
  <script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
  <script>
  $(document).ready(init_func);
  function init_func()
  {
    $("input[name='id']").keyup(id_check);
  }

  function id_check()
  {
    //1. 입력창 데이터 가져오기
    id = $("input[name='id']").val();
    //console.log(id);
    //2. ajax 사용해서 id_check.php 페이지에 데이터 전달
    $.ajax({
      type: "GET",
      url: "id_check.php",
      data: {"id":id},
      success: check_result
    });
    // 2-1. select 쿼리문 이용 동일 ID 존재 확인
    // 2-2. 있으면 "중복된 ID가 존재합니다."
    // 2-3. 없으면 "사용할 수 있는 ID 입니다."
   }
   function check_result(data)
   {
    //3. 응답 받아서 id 값이 check_result 에 응답 데이터 출력
    data = parseInt(data);
    if(data)
    {
     $("#check_result").html("중복된 ID입니다.");
     //$("input[type='submit']").prop("disabled", true);
     $("#check_result").css("color", "red", ("font-weight", "bold"));
     $("input[name='id_check']").val("0");
    }
    else {
     $("#check_result").html("사용가능한 ID입니다.");
     //$("input[type='submit']").prop("disabled", false);
     $("#check_result").css("color", "blue",("font-weight", "bold"));
     $("input[name='id_check']").val("1");
    }
   }

   function addr_search()
   {
     new daum.Postcode({
         oncomplete: function(data) {
             $("input[name='addr']").val(data.address);
             $("input[name='zipcode']").val(data.zonecode);
         }
     }).open();
   }

   function auth_mail()
   {
     email = $("input[name='email']").val();
     $.ajax({
       type: "POST",
       url: "auth_email.php",
       data: {"email":email},
       success: auth_check
     });
   }
   function auth_check(data)
   {
     console.log(data);
     $("#auth_check").html("<input type='text' name='auth_num'><button type='button' onclick='auth_ok()'>인증하기</button>");
     //1. hidden(auth_num2)에 인증번호 넣어놓고 값을 검사한다.
     //$("input[name='auth_num2']").val(data);
     //2. session 값을 검사한다.
   }
   function auth_ok()
   {
     //1. hidden(auth_num2, auth_num) 값이 일치하는지 검사한다.
     auth_num = $("input[name='auth_num']").val();
     //auth_num2 = $("input[name='auth_num2']").val();
     //if(auth_num == auth_num2)
     //{
       //$("input[name='auth_check']").val("1");
       //$("#auth_check").html("이메일 인증성공!");
       $.ajax({
         type: "POST",
         url: "auth_ok1.php",
         data: {"auth_num":auth_num},
         success:auth_ok1
       });
     }
     //2. session 값을 검사한다.
     function auth_ok1(data)
     {
       console.log(data);
       if(data == "1")
       {
         $("input[name='auth_check']").val();
         $("#auth_check").html("이메일 인증성공!");
       }
     }
  </script>
</head>
<body>
  <form action="join_proc.php" method="post">
    <input type="hidden" name="id_check" value="0">
    <input type="hidden" name="auth_check" value="0">
  <table border="1">
    <caption>회 원 가 입</caption>
    <tr>
      <td>I D</td>
      <td><input type="text" name="id" placeholder="ID를 입력하세요(4자이상,필수)" autocomplete="off" required></td>
    </tr>
    <tr>
      <td colspan="3" id="check_result"></td>
    </tr>
    <tr>
      <td>비밀번호</td>
      <td><input type="password" name="pw" placeholder="비밀번호를 입력하세요(8자리 이상,필수)" required></td>
    </tr>
    <tr>
      <td>이 름</td>
      <td><input type="text" name="name" placeholder="이름을 입력하세요" required></td>
    </tr>
    <tr>
      <td>성 별</td>
      <td>남성<input type="radio" name="ses" value="0">&nbsp;
        여성<input type="radio" name="ses" value="1">
      </td>
    </tr>
    <tr>
      <td>나 이</td>
      <td><input type="text" name="age" placeholder="나이를 입력하세요"></td>
    </tr>
    <tr>
      <td>우편번호</td>
      <td><input type="text" name="zipcode" onclick="addr_search()"></td>
    </tr>
    <tr>
      <td>주 소</td>
      <td><input type="text" name="addr" placeholder="신주소를 입력하세요"></td>
    </tr>
    <tr>
      <td>전화번호</td>
      <td><input type="text" name="tel" placeholder="전화번호를 입력하세요"></td>
    </tr>
    <tr>
      <td>이메일</td>
      <td><input type="text" name="email" placeholder="이메일을 입력하세요"></td>
    </tr>
    <tr>
      <td colspan="2" id="auth_check">
        <button type="button" onclick="auth_mail()">인증번호 발송</button>
      </td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" value="등록"></td>
    </tr>
  </table>
</form>
</body>
</html>
