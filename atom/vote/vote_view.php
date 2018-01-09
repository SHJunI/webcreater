<?php
include 'conn.php';
$igroup = $_GET['igroup'];
?>
<html>
<head><title> 설문조사 결과</title></head>
<body>
  <table width="300" border="1" cellpadding="0" cellspacing="0">
    <tr><td width="300" valign="middle">
      <table width="300" cellpadding="0" cellspacing="0">
        <tr><td width="300" height="30">
          <table width="300" border="1" cellpadding="1" cellspacing="1" bgcolor="#E4F7EE">
            <tr><td width="300" height="25" align="center">
              <b>:::::: 설문 조사 결과 ::::::</b>
            </td></tr></table>
          </td></tr>
          <tr><td>&nbsp;</td></tr></table>
          <table border="1">
<?php
$sql = "SELECT * FROM question WHERE title != '' AND igroup='$igroup' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_all($result, MYSQLI_NUM);
echo "<b>" . $row[0][1] . "</b>";

$sql_delete = "DELETE FROM questiont";
mysqli_query($conn,$sql_delete);
$sql_insert_qt = "INSERT INTO questiont VALUES('','0','$igroup')";
mysqli_query($conn, $sql_insert_qt);

$sql1 = "SELECT hit FROM question WHERE hit > 0 AND igroup='$igroup'";
$result1 = mysqli_query($conn, $sql1);
$row1 = mysqli_fetch_all($result1, MYSQLI_NUM);
$total_rows1= mysqli_num_rows($result1);
$i = 0;
while ($i < $total_rows1) {
  $hit_count = $row1[$i][0];
  $sql_update = "UPDATE questiont SET jilmunno=jilmunno+$hit_count";
  mysqli_query($conn, $sql_update);
  $i = $i + 1;
}

$sql2 = "SELECT * FROM questiont";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_all($result2, MYSQLI_NUM);
$total_rows2 = mysqli_num_rows($result2);
$i = 0;
while ($i < $total_rows2) {
  $vote_count = $row2[$i][1];
  echo "<tr><td><b> 총 투표자";
  echo number_format($vote_count);
  echo "명</b></td></tr>";
  $i = $i + 1;
}

echo ("<tr><td width='300' height='25' align='left' bgcolor='gray'>");

$sql3 = "SELECT * FROM question WHERE title='' AND igroup='$igroup' ORDER BY id ASC";
$result3 = mysqli_query($conn, $sql3);
$row3 = mysqli_fetch_all($result3, MYSQLI_NUM);
$total_rows3 = mysqli_num_rows($result3);
$i = 0;
while ($i < $total_rows3) {
  $comment = $row3[$i][3];
  echo $comment . "<br>";
  if($vote_count && (int)$row3[$i][6])
  {
    $percent = (int)(100 * $row3[$i][6]/$vote_count);
    echo ("<img src=image/semimg.gif width=$percent height=8> &nbsp;&nbsp;");
  }
  else {
    $percent = 0;
  }
  echo ("<b>{$row3[$i][6]}명 ($percent %)</b><br><br>");
  $i = $i + 1;
}
?>
</table>
</body>
</html>
