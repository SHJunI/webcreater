<?php
include "conn.php";

$jilmunno = mysqli_real_escape_string($conn, $_POST['jilmunno']);
$igroup = mysqli_real_escape_string($conn, $_POST['igroup']);

$sql = "SELECT * FROM question WHERE title !='' AND igroup='$igroup' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_all($result, MYSQLI_NUM);
mysqli_free_result($result);
$vdate = $arr[0][0];
$today = date("Y-m-d");

if($vdate > $today)
{
  if($jilmunno)
  {
    $sql1 = "SELECT hit FROM question WHERE jilmunno='$jilmunno' AND igroup='$igroup'";
    $result1 = mysqli_query($conn, $sql1);
    $arr1 = mysqli_fetch_all($result1, MYSQLI_NUM);
    mysqli_free_result($result1);
    $hitdata = $arr[0][0] + 1;
    $sql_update = "UPDATE question SET hit=$hitdata WHERE jilmunno='$jilmunno' AND igroup='$igroup'";
    mysqli_query($conn, $sql_update);
    mysqli_close($conn);
    echo ("<script> alert('투표가 완료 되었습니다');</script>");
    echo ("<meta http-equiv='refresh'content='0; URL=vote_start.php'>");
  }
}
?>
