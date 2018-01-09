<html>
<head>
<SCRIPT LANGUAGE=JAVASCRIPT>
function content_check(f) {
popupname = f.popupname.value.length;

if ( popupname < 1 ) {
	alert("설정을 입력하세요.");
	f.popupname.focus();
	return (false);
}
return (true);
}
</SCRIPT>
</head>
<body>
<form action=popup_insert.php?ljs_mod=sj method=post  name=moosim onSubmit='return content_check(this)'>
<span style=font-size:8pt;>&nbsp;</span><br>
<table width=550 border=0><tr>
<td width=550 height=25 class=shop_bgc_table >
<font class=shop_fontcolor><B>타이머 및 내용 수정</B></font>
</td></tr></table>
<span style=font-size:8pt;>&nbsp;<br></span>
<?
require "config.php";
$query="select * from popup";
$result=mysql_query($query);
$row=mysql_fetch_array($result);
$scomment= htmlspecialchars($row[comment]);
?>
<span style=font-size:8pt;>&nbsp;</span><br>
<table width=550 border=0><tr><td width=550>
<b>현재내용</b>
<p>
<? echo $scomment; ?>
<p>
</td></tr></table>
<TABLE border=1 cellpadding=0 cellspacing=0 bordercolor=white bordercolorlight=white>
<TR><TD width=100 height=20 align=left class=ljs_bgc_d>팝업창 설정</TD>
<TD width=450 height=20 align=left>
<INPUT type=text name=popupname size=1 maxlength=1 value=<? echo $row[choice]; ?>><br>
  팝업창을 띄우려면 'y'를<BR>
  팝업창을 띄우지 않으려면 'n'을 넣으세요.<br>
<span style="font-size:5pt;">&nbsp;</span><br>
</TD></TR>
<TR><TD width=100 height=20 align=left class=ljs_bgc_d>시간설정</TD>
<TD width=450 height=20 align=left>
<INPUT type=text name=popuptime6 size=4 maxlength=4 value=<? echo $row[time6]; ?>>년
<INPUT type=text name=popuptime4 size=2 maxlength=2 value=<? echo $row[time4]; ?>>월
<INPUT type=text name=popuptime5 size=2 maxlength=2 value=<? echo $row[time5]; ?>>일
<INPUT type=text name=popuptime1 size=2 maxlength=2 value=<? echo $row[time1]; ?>>시
<INPUT type=text name=popuptime2 size=2 maxlength=2 value=<? echo $row[time2]; ?>>분
<INPUT type=text name=popuptime3 size=2 maxlength=2 value=<? echo $row[time3]; ?>>초<br>
팝업창 닫을 시간을 정확하게 설정하세요.<BR>
<span style="font-size:5pt;">&nbsp;</span><br>
</TD></TR>
<TR>
<TD width=100 height=20 align=left class=ljs_bgc_d>수정내용</TD>
<TD width=450 height=20 align=left>
<TEXTAREA name=pucomment cols=60 rows=16 style="background-image:url('./image/text_line.gif');font-family:돋움; line-height:130%;"></TEXTAREA>
</TD>
</TR>
<TR><TD width=100 height=20></TD><TD width=450 height=20></TD></TR>
<TR><TD>&nbsp;</TD><TD>
<INPUT type=submit name=submit size=10 value="등록">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<INPUT type=reset size=10 value="다시쓰기">
</form></TD></TR></TABLE>
</body>
</html>
