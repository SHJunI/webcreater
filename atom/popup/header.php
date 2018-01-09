<!-- header.php -->
<html>
<head>
<META HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=euc-kr">
<META HTTP-EQUIV="Content-Style-Type" CONTENT="text/css">
<META NAME="Description" CONTENT="팝업창 만들기 !!">
<META NAME="Keywords" CONTENT="팝업 컨트롤 php ">
<title>팝업 컨트롤 </title>
<script language="JavaScript">

function seoropop(poppage,jij) {
 seoropopwin = window.open(poppage,'',jij);
 }

</script>
</head>
<base target="main">
<?php
include "config.php";
$sql = "select * from popup limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_NUM);
mysqli_free_result($result);

//mktime : 1970.01.01 부터 괄호안의 경과한 시간을 초로 환산시
//mktime의 형식(시간, 분, 초, 월, 일, 년)

$sjtime=mktime($row[0][1],$row[0][2],$row[0][3],$row[0][4],
                $row[0][5],$row[0][6]);
//현재시간의 Timestmap 값
$nwtime=mktime();
//echo $row[0][1]." ".$row[0][2]." ".$row[0][3]." ".$row[0][4]." ".$row[0][5]." ".$row[0][6];
echo $row[0][1] . " " . $row[0][2] . " " . $row[0][3]
. " " . $row[0][4] . " " . $row[0][5] . " " . $row[0][6] . "<br>";
 echo "NWTIME " . $nwtime . "<br>";
 echo "SJTIME ". $sjtime . "<br>";




if (($row[0][0] == "y") && ($nwtime < $sjtime)) {
?>
<script language="JavaScript">

function setCookie( name, value, expiredays )
{
	var todayDate = new Date();
	todayDate.setDate( todayDate.getDate() + expiredays );
	document.cookie = name + "=" + escape( value ) +
  "; path=/; expires=" + todayDate.toGMTString() + ";"
}

function getCookie( name ){
	var seoroopCookie = name + "=";
	var i = 0;
	while ( i <= document.cookie.length )
	{
		var e = (i+seoroopCookie.length);
		if ( document.cookie.substring( i, e ) == seoroopCookie ) {
			if ( (popendCookie=document.cookie.indexOf( ";", e )) == -1 )
				popendCookie = document.cookie.length;
			return unescape( document.cookie.substring( e, popendCookie ) );
		}
		i = document.cookie.indexOf( " ", i ) + 1;
		if ( i == 0 )
			break;
	}	return "";
}
if ( getCookie( "Seoropop" ) != "nooppop" )
{
	SeoropopWindow  =  window.open('popup.php','Seoropop',
  'toolbar=no,location=no,directories=no,status=no,menubar=no, scrollbars=auto,resizable=no,width=320,height=300');
	SeoropopWindow.opener = self;
}
</script>
<?php
}
?>


<body leftmargin=0 topmargin=0>
<table border="0" cellpadding="0" cellspacing="0"
 height="25" width="1010" align="center">
<tr>
<td  border="0" align=center width="220" height="50">
 팝업 컨트롤러 페이지
</td>
</tr>
</table>
</body>
</html>
