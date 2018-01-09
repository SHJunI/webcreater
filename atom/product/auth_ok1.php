<?php

session_start();

$auth_num = $_POST["auth_num"];
$auth_num2 = $_SESSION['auth_num'];

if($auth_num == $auth_num2)
{
  echo "1";
}
else {
  echo "-1";
}
?>
