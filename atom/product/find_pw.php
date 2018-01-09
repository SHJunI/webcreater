<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <script src="jquery-3.2.1.js"></script>
  <script>
  function find_pw()
  {
    id = $("input[name='id']").val();
    name = $("input[name='name']").val();
    email = $("input[name='email']").val();
    $.ajax({
      type: "POST",
      url: "find_pw_proc.php",
      data: {"name":name, "email":email, "id":id},
      success: set_result
    });
  }
  function set_result(data)
  {
    $("#result").text(data);
  }
  </script>
</head>
<body>
  <div class="container">
    <div class="login_container">
       <ul>
         <li><label>I D</label><input type="text" name="id"></li>
         <li><label>이름</label><input type="text" name="name"></li>
         <li><label>이메일</label><input type="text" name="email"></li>
       <ul>
       <button onclick="find_pw()">찾기</button>
    </div>
  </div>
</body>
</html>
