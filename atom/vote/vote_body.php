<?php
require "conn.php";
$igroup = $_GET['igroup'];
 ?>

 <html>
 <head><title>설문조사항목등록</title></head>
   <body>
     <table border="0" width="100%">
       <tr>
         <td>
           <p>&nbsp;</p>
           <b>현재등록중인 설문조사</b>
           <p>
 <?php
$sql = "select * from question where title !='' order by id desc limit 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_NUM);
echo "[".$row[0][1]."]";
echo "&nbsp;&nbsp;[".$row[0][4]."~".$row[0][5]."]<br>";

$sql1 = "select * from question where igroup='$igroup' order by id asc";
$result1 = mysqli_query($conn, $sql1);
$total_rows = mysqli_num_rows($result1);
$row1 = mysqli_fetch_all($result1, MYSQLI_NUM);
$i = 0;
while ($i < $total_rows) {
  echo $row1[$i][3] . "<br>";
  $i = $i+1;
}
  ?>
</p>
    <script language="JavaScript">
    function musimw_check(f)
    {
      comment = f.comment.value.length;
      if(comment < 1)
      {
        alert("항목을 입력하세요.");
        f.comment.focus();
        return (false);
      }
      return(true);
    }
    </script>

    항목을 넣어주세요. (먼저 기록한 항목이 상위에 위치합니다.)<br>
    <FORM action="vote_insert.php?igroup=<?php echo $igroup; ?>" method="POST" name="musimw" enctype="multipart/form-data" onsubmit="return musimw_check(this);">
      <input type="hidden" name="ljs_mod" value="bodywrite">

      <p align="letf">&nbsp;&nbsp;항목 :
        <input type="text" name="comment" size="60"></p>
      <p align="letf">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" name="submit" size="10" value="등&nbsp;&nbsp;&nbsp;록">
        <input type="reset" name="submit" size="10" value="다 시 쓰 기">
        <input type="button" size="10" onclick="location.href='vote_write.php'" value="돌아가기">
      </p>
    </FROM>
    <script>
    document.musimw.comment.focus();
    </script>

   </td>
 </tr>
</table>
</body>
</html>
