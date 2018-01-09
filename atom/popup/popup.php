<html>
<head>
<title>테스트 팝업창</title>
<LINK rel="stylesheet" type="text/css" href="seoro.css">

<SCRIPT language="JavaScript">

function setCookie( name, value, expiredays )
    {
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) +
  "; path=/; expires=" + todayDate.toGMTString() + ";"
	}
function closeWin()
{
	if ( document.forms[0].Seoropop.checked )
 		setCookie( "Seoropop", "nooppop" , 1);

	self.close();
}

</SCRIPT>
</head>


<body bgcolor="#FFFFFF" text="#000000" leftmargin="0" topmargin="0">

  <?php
    $host = "127.0.0.1";
    $id = "root";
    $pass = "2919369";
    $db = "popup";

    $conn = mysqli_connect($host, $id, $pass, $db);
  $sql = "select * from popup limit 1";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_all($result, MYSQLI_NUM);
  mysqli_free_result($result);
    echo "{$arr[0][6]}년 {$arr[0][4]}월 {$arr[0][5]}일 ";
    echo "{$arr[0][1]}시 {$arr[0][2]}분 {$arr[0][3]}초 ";
    echo "이후에는 더 이상 생성되지 않습니다...<br>";
  ?>
<table border=0 align="center">
<tr>
  <td>
    <?php
    echo "<br><br><br>{$arr[0][7]}<br><br><br>";
     ?>  </td></tr>
<tr><td valign=top>
<form><input type="CHECKBOX" name="Seoropop" value="">
오늘은 더 이상 이창 안 띄우기
</td><td>
<input type=image src="/atom/popup/image/close.gif" border=0 name=button
  value="닫기" onclick=closeWin()>
</form></td></tr></table></body>
</html>
