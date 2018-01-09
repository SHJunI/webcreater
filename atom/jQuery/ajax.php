<script src="jquery-3.2.1.js"></script>
<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
<link rel="stylesheet" href="style.css">
<input type="text" name="id">
<button onclick="id_check()">ID 체크하기</button>
<p></p>
<span></span>
<input type="text" name="email_id">@<input type="text" name="domain">
<select name="domain_box">
  <option value="">직접입력</option>
  <option value="naver.com">naver.com</option>
  <option value="daum.net">daum.net</option>
</select>

<input type="text" name="addr"><button onclick="addr_search()">주소찾기</button>

<input type="password" name="pass">
<button onclick="view_pass()" id="view_pass">패스워드 보기</button>

<div id="result">
  <table>
    <thead>
      <th>제목</th>
      <th>작성날짜</th>
      <th>조회수</th>
    </thead>
    <tbody></tbody>
    <tfoot>
      <td colspan="3">
        <a href='#' onclick='get_data(1)'>1</a>
        <a href='#' onclick='get_data(2)'>2</a>
        <a href='#' onclick='get_data(3)'>3</a>
      </td>
    </tfoot>
  </table>
</div>
<br>
<br><br><br><br><br><br>
<div>
  <div id="over">
  </div>
</div>

<div>
  <img src='upload/sa.jpg' id='slide' curid="0">
  <button id='prev_img' onclick="prev_img()"></button>
  <button id='next_img' onclick="next_img()"></button>
</div>
<br><br><br><br>

<?php

//1. 가입이 완료된 이후 이메일에 도착한 링크클릭 인증완료, 로그인 가능.
//2. 인증번호를 메일로 발송하여 그 해당한 인증번호를 입력 인증완료.
 $num = rand(1,9999);
//숫자 형태로 출력.
 echo sprintf("%04d", $num);
 //4자리 숫자로 출력, 빈공간을 0으로 채운다.
echo "<br>";
//문자형태로 출력.
 $num2 = 64;
 echo sprintf("%c", $num2);
echo "<br>";
//문자열 형태로 출력.
$str = "abcd";
echo sprintf("%s", $str);
echo "<br>";
//16진수 형태로 출력.
echo sprintf("%x", $num2);
echo "<br>";

$num3 = rand(1, 9);
echo str_pad($num3, 4, 0, STR_PAD_LEFT);
//1~45, 7자리 숫자 출력.
echo "<br>";
for($i = 0; $i < 7; $i++)
{
  echo rand(1, 45) . ", ";
}

$num4 = rand(0, 30);
echo "<br>";
//비밀번호를 찾기를 요청한 경우 랜덤한 문자열로 구성된 비밀번호 발송.
$chars = "123456789abcdefghijklmnopqrstuvywxyABCDEFGHIJKMNLOPQRSTUVYWXYZ";
$chars_len = strlen($chars) - 1;
//8자리의 임시 비밀번호를 만들어야 한다면?
$pass = "";
for($i = 0; $i < 8; $i++)
{
$nums = rand(0, 30);
$pass = $pass . $chars[$nums];
}
echo $pass;
?>

<br><br><br><br>

<?php

$to = "kinds2900@nate.com";
$subject = "테스트 메일입니다.(김태준)";
$content = "테스트 메일 발송 중 입니다.\r\n";
$from = "Content-Type: text/html\r\nFrom: test@test.com";

echo mail($to, $subject, $content, $from);

?>

<script>
  arr = ['upload/sa.jpg', 'upload/600.jpg', 'upload/bandicam.jpg']
  arr_len = arr.length;
  function next_img()
  {
    curid = $("div #slide").attr("curid");
    nextid = parseInt(curid) + 1;

    if(nextid > arr_len)
    {
      return;
    }

    $("div #slide").attr("src", arr[nextid]);
    $("div #slide").attr("curid", nextid);
  }

  function prev_img()
  {
    curid = $("div #slide").attr("curid");
    nextid = parseInt(curid) - 1;

    if(nextid < 0)
    {
      return;
    }

    $("div #slide").attr("src", arr[nextid]);
    $("div #slide").attr("curid", nextid);
  }

  get_data(1);
  function get_data(no)
  {
    $.ajax({
      type: "GET",
      url: "getdata.php",
      data: {"page":no},
      success: func2
    });
  }
  function func2(data)
  {
    $("#result tbody").html(data);
  }

  i = 1000;
  function check_time2()
  {
    $("span").text(i);
    i = i - 1;
    setTimeout(check_time2, 1000);
  }
  setTimeout(check_time2, 1000);

  function check_time()
  {
    //date = new Date();
    $.ajax({
      type: "GET",
      url: "datetime.php",
      success: func1
    });
  }
  function func1(data)
  {
    //재귀함수 2^5
    $("p").text(data);
    setTimeout(check_time, 1000);
  }
  setTimeout(check_time, 1000);

  function view_pass()
  {
    if($("input[name='pass']").attr("type") == "password")
    {
      $("input[name='pass']").attr("type","text");
      $("#view_pass").text("암호화 하기");
    }
    else
    {
      //.prop() 변수(checked), .attr(src, 이미지) <img src=''>
      $("input[name='pass']").attr("type","password");
      $("#view_pass").text("패스워드 보기");
    }
  }
  function addr_search()
  {
    new daum.Postcode({
        oncomplete: function(data) {
            $("input[name='addr']").val(data.address);
        }
    }).open();
  }
</script>


<script>
  $("select[name='domain_box']").change(change);
  function change()
  {
    //alert($("select[name='domain_box']").val());
    //console.log($("select[name='domain_box']").val());
    domain = $("select[name='domain_box']").val()
    $("input[name='domain']").val(domain);
  }
  function id_check()
  {
    id = $("input[name='id']").val();
    //동기식 sync
    //비동기식 async
    $.ajax({
      //type : 전달방식(GET/POST)
      type: "GET",
      //url : 전달할 주소(action)
      url: "ajax_test.php",
      //data : 전달 데이터{변수명:값, 변수명:값}
      data: {"id":id},
      //success : 성공 실행 함수 이름
      //HTTP status code(상태코드)
      //200 OK : 정상응답
      //204 Moved : location.href 페이지 이동
      //404 Not Found : 파일이 존재하지 않을 때
      //400 Forbidden : 접근이 거부
      //500 Internal Error : 내부 오류
      success: func
    });
  }
  //jquery 가 func 함수에 인자값을 넣어줌
  function func(response)
  {
    $("p").append(response);
  }
