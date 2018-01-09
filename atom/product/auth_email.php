<?php

session_start();

$num = rand(1, 9999);
$num = str_pad($num, 4, 0, STR_PAD_LEFT);

$to = $_POST['email'];
$subject = "인증번호 메일입니다.(김태준)";
$content = "인증번호는 {$num} 입니다.";
$from = "From: kinds2900@nate.com";

$result = mail($to, $subject, $content, $from);

if($result)
{
 $_SESSION["auth_num"] = $num;
 echo 1;
}
else {
 $_SESSION["auth_num"] = -1;
 echo -1;
}

?>
