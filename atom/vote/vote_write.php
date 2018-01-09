<html>
<head><title>설문조사</title></head>

<body>
  <table border="0" width="100%">
    <tr>
      <td>
        <b>설문조사진행사항</b><br>
<?php include "conn.php";
//question 테이블로 부터 id를 가져오며 타이틀이 비어있지 않는 갯수
$sql = "select id from question where title != ''";
if(mysqli_num_rows(mysqli_query($conn,$sql)) < 1)
{
  echo "등록된 설문이 없습니다.";
}
else {
  $sql = "select * from question where title != '' order by id desc";
  $result = mysqli_query($conn, $sql);
  $total_rows = mysqli_num_rows($result);
  $row = mysqli_fetch_all($result, MYSQLI_NUM);
  $i = 0;
  while ($i < $total_rows) {
    echo "설문" . $row[$i][7]. ":";
    echo $row[$i][1] . "&nbsp;&nbsp;";
    echo "[" . $row[$i][4]. "~" .$row[$i][5]. "]";
    ?>
    <a href = "JavaScript:seoropop('vote_view.php?igroup=<?=$row[$i][7]?>',' width=340, height=400, scrollbars=yes, status=yes')"> 결과보기</a>
    <?php
    echo "&nbsp;&nbsp; <a href = vote_del.php?igroup= {$row[$i][7]} > 삭제 </a><br> ";
    $i = $i + 1;
  }
  //설문조사 있을때
}
?>
<script language = "JavaScript">
function musimw_check(f)
{
  title = f.title.value.length;
  if(title < 1){
    alert("타이틀을 입력하세요.");
    f.title.focus();
    return (false);
  }
  return(true);
}
</script>
새로운 설문조사를 시작하려면 타이틀과 기간을 넣어 주시기 바랍니다.<br>
<form action = "vote_insert.php" method="POST" name = "musimw" enctype="multipart/form-data" onSubmit="return musimw_check(this);">
<input type="hidden" name=ljs_mod value="writing">
<p align = "left">
  제목 : <input type="text" name="title" size=60><br>
  기간 : <input type="text" name="sdate" size=12> ~
          <input type="text" name="edate" size=12><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ex) 2018-01-01 </p>
<p align = "left">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" name="submit" size=10 value="등&nbsp;&nbsp;&nbsp;록">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="reset" name="submit" size=10 value="다시쓰기">
</form>
<script>
document.musimw.title.focus();
</script>
      </td>

    </tr>
  </table>
</body>
</html>
