<!DOCTYPE html>
<script src="http://code.jquery.com/jquery-3.2.1.js"></script>

<form method="POST" action="popup_insert.php">
  <input type="hidden" name="ljs_mod" value="ip">
<table border="1">
  <tr><td>팝업창 설정</td>
    <td>
      <INPUT type="text" name="popupname" size=1 maxlength=1><br>
        팝업창을 띄우려면 'y'를<BR>
        팝업창을 띄우지 않으려면 'n'을 넣으세요.</td></tr>
  <tr><td width="100px">시간설정</td>
    <td>
      <INPUT type="text" name="popuptime6" size=4 maxlength=4>년
  <INPUT type="text" name="popuptime4" size=2 maxlength=2>월
  <INPUT type="text" name="popuptime5" size=2 maxlength=2>일
  <INPUT type="text" name="popuptime1" size=2 maxlength=2>시
  <INPUT type="text" name="popuptime2" size=2 maxlength=2>분
  <INPUT type="text" name="popuptime3" size=2 maxlength=2>초<br>
  팝업창을 닫을 시간을 정확하게 설정하세요.<BR>
    </td>
  </tr>
  <tr>
    <td colspan="2">팝업창 내용</td>
  </tr>
  <tr>
    <td colspan="2"><textarea name="pucomment" cols="70" rows="5"></textarea></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="글 등록"></td>
  </tr>
</table>
</form>
