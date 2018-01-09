<?php

$id =  $_GET['id'];

if($id == "admin")
{
  echo "<font color='red'>존재하는 ID 입니다.</font>";
}
else
{
  echo "<font color='blue'>사용가능한 ID 입니다.</font>";
}
?>
