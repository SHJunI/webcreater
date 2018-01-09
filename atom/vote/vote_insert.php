<?php
include "conn.php";
$ljs_mod = mysqli_real_escape_string($conn, $_POST['ljs_mod']);
echo ("<meta http-equiv='Content-Type' content='text/html;charset=utf-8'/>");
mysqli_query($conn, "set session character_set_connection=utf8;");
mysqli_query($conn, "set session character_set_result=utf8;");
mysqli_query($conn, "set session character_set_client=utf8;");

if($ljs_mod == "writing")
{
  //이전페이지에서 전달되어오는 값
  $title = mysqli_real_escape_string($conn, $_POST['title']);
  $sdate = mysqli_real_escape_string($conn, $_POST['sdate']);
  $edate = mysqli_real_escape_string($conn, $_POST['edate']);

  $sql = "SELECT igroup FROM question WHERE title != '' ORDER BY id DESC";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_all($result, MYSQLI_NUM);
  mysqli_free_result($result);
  $iigroup = $arr[0][0];
  $egroup = $iigroup + 1;
  $sql_insert = "insert into question values ('', '$title', '', '', '$sdate', '$edate', '', '$egroup')";
  mysqli_query($conn, $sql_insert);
  mysqli_close($conn);
//body 페이지로 이동
  echo ("<meta http-equiv='Refresh' content='0; URL=vote_body.php?igroup=$egroup'>");
}

if($ljs_mod == "bodywrite")
{
  //이전페이지에서 전달되어오는 값
  $comment = mysqli_real_escape_string($conn, $_POST['comment']);
  $igroup = $_GET["igroup"];
  $sql = "select * from question where igroup='$igroup' order by id desc limit 1";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_all($result, MYSQLI_NUM);
  mysqli_free_result($result);
  $jilmunno=$arr[0][2];
  $jilmunno= $jilmunno+1;
  $sql_insert = "insert into question(title,jilmunno,comment,igroup,sdate,edate,hit) values('','$jilmunno','$comment','$igroup','{$arr[0][4]}','{$arr[0][5]}','')";
  mysqli_query($conn, $sql_insert);
  mysqli_close($conn);
  echo ("<meta http-equiv='Refresh' content='0; URL=vote_body.php?igroup=$igroup'>");
}

if($ljs_mod=="josano")
{
  $choice = mysqli_real_escape_string($conn, $_POST['choice']);

  $sql= "select * from questionc";
  $result = mysqli_query($conn, $sql);
  $total_rows = mysqli_num_rows($result);
  if($total_rows < 1)
  {
    $sql_insert = "insert into questionc values ('$choice')";
    mysqli_query($conn, $sql_insert);
    mysqli_close($conn);
    echo ("<meta http-equiv='Refresh' content='0; URL=vote_no.php'>");
  }
  else{
    $sql_update = "update questionc set choice = '$choice'";
    mysqli_query($conn, $sql_update);
    mysqli_close($conn);
    echo ("<meta http-equiv='Refresh' content='0; URL=vote_no.php'>");
  }
}
 ?>
