<html><head><title>홈페이지 삽입형</title></head>
<body>
  <form action="vote_answer.php" method="POST" name="musimso" onsubmit="return musimno_check(this);">
    <table width="250" border="0" cellpadding="1" cellspacing="1" bgcolor="#E4F7EE">
      <tr>
        <td width="250" height="20" align="center">
          <b>:::::: 설문 &nbsp;&nbsp; 조사 ::::::</b>
          <span style="font-size:5pt;">&nbsp;</span><br>
          <table align="center" width="95%" border="0" cellpadding="1" cellspacing="1" bgcolor="#E4F7EE">
            <tr><td height="20">
              <?php
              require "conn.php";

              //questionc 테이블로 부터 choice 값을 가져와
              //현재 관리자가 몇번째 설문을 원하는지 번호를 가져와
              //$igroup에 저장
              $sql = "SELECT * FROM questionc";
              $result = mysqli_query($conn, $sql);
              $arr = mysqli_fetch_all($result,MYSQLI_NUM);
              mysqli_free_result($result);
              $igroupnum = $arr[0][0];

              $sql1 = "SELECT * FROM question WHERE title !='' AND igroup='$igroupnum' ORDER BY id DESC";
              $result1 = mysqli_query($conn, $sql1);
              $arr1 = mysqli_fetch_all($result1, MYSQLI_NUM);
              mysqli_free_result($result1);
              echo "   " . $arr1[0][1];
              ?>
              <span style="font-size:5pt;">&nbsp;</span><br>
            </td></tr></table>
  </td></tr></table>
  <?php
  $sql2 = "SELECT * FROM question WHERE title = '' AND igroup='$igroupnum' ORDER BY id ASC";
  $result2 = mysqli_query($conn, $sql2);
  $total_rows2 = mysqli_num_rows($result2);
  $row2 = mysqli_fetch_all($result2, MYSQLI_NUM);
  $i = 0;
  while ($i < $total_rows2) {
    $jilmunno = $row2[$i][2];
    $comment = $row2[$i][3];
    echo "<input type='radio' name='jilmunno' value=".$jilmunno.">".$comment."<br>";
    $i = $i + 1;
  }
   ?>
   <script language="JavaScript">
   function winopen()
   {
     window.open('vote_view.php?igroup=<?php echo $arr[0][0]; ?>', '_box', 'width=340 height=400, scrollbars=yes');
   }
   </script>
   <input type="hidden" name="ljs_mod" value="mainjosa">
   <input type="hidden" name="igroup" value="<?php echo $arr[0][0]; ?>">
   <input type="submit" name="submit" size="10" value="투 &nbsp;&nbsp;&nbsp;표">
   &nbsp;&nbsp;&nbsp;
   <input type="button" value="결&nbsp;&nbsp;과" onclick="winopen()">
 </form>
</body></html>
