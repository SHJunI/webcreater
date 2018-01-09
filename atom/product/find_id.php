<html>
<head>
  <link rel="stylesheet" href="style.css">
  <script src="jquery-3.2.1.js"></script>
  <script>
  function find_id()
  {
    name = $("input[name='name']").val();
    email = $("input[name='email']").val();
    $.ajax({
      type: "POST",
      url: "find_id_proc.php",
      data: {"name":name, "email":email},
      success: set_id
    });
  }
  function set_id(data)
  {
    $("#result").text(data);
  }
  </script>
</head>
<body>
  <div class="container">
    <div class="login_container">
       <ul>
         <li><label>이름</label><input type="text" name="name"></li>
         <li><label>이메일</label><input type="text" name="email"></li>
       <ul>
       <p style="text-align:center" id="result"></p>
       <button onclick="find_id()">찾기</button>
    </div>
  </div>
</body>
</html>
