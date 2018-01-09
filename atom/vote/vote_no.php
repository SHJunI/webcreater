<?php
require "conn.php";
 ?>

 <html><head><title>설문조사 실행번호등록 </title></head>

 <body>
   <table border="0" width="100%">
     <tr><td><p><b>설문조사 실행번호 설정</b></p>
<?php
$sql = "select id from question where title != ''";
$result = mysqli_query($conn, $sql);
$total_rows = mysqli_num_rows($result);
if($total_rows < 1)
{
  echo "등록된 설문조사가 없습니다.";
}
else {
  $sql1 = "select * from question where title !='' order by id desc";
  $result1 = mysqli_query($conn, $sql1);
  $total_rows1 = mysqli_num_rows($result1);
  $row1 = mysqli_fetch_all($result1, MYSQLI_NUM);
  $i = 0;
  while ($i < $total_rows1) {
    echo "설문번호 :";
    echo "<b>" . $row1[$i][7] . "</b> : ";
    echo $row1[$i][1]. "&nbsp;&nbsp;";
    echo "[" . $row1[$i][4]. "~" . $row1[$i][5]. "]<br>";
    $i = $i + 1;
  }
}
 ?>
<p>
  <script LANGUAGE="JavaScript">
  function musimw_check(f)
  {
    choice = f.choice.value.length;
    if(choice== 0)
    {
      alert("설문 번호를 입력하세요.");
      f.choice.focus();
      return(false);
  }
  return(true);
}
 </script>

<?php
$sql2 = "select * from question";
$query2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_all($query2, MYSQLI_NUM);
$igroup = $row2[0][0];
 ?>
<b>&nbsp;&nbsp;설문조사 할 설문번호를 넣어주세요.</b>

<form action="vote_insert.php" method="POST" name="musimw" enctype="multipart/form-data" onsubmit="return musimw_check(this)">
  <input type="hidden" name="ljs_mod" value="josano">
  &nbsp;&nbsp;설문번호 :
  <input type="text" name="choice" size="3" value="<?=$igroup?>">
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <input type="submit" name="submit" size="10" value="등&nbsp;&nbsp;&nbsp;&nbsp;록">
  <input type="reset" name="submit" size="10" value="&nbsp;&nbsp;다 시 쓰 기&nbsp;&nbsp;">
</form>
<script>
  document.musimw.choice.focus();
</script>
     </td>
   </tr>
   </table>
 </body>
 </html>
