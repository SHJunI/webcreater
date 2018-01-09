<?php
  require "config.php";

  $ljs_mod = mysqli_real_escape_string($conn, $_POST['ljs_mod']);
  $popupname = mysqli_real_escape_string($conn, $_POST['popupname']);
  $popuptime1 = mysqli_real_escape_string($conn, $_POST['popuptime1']);
  $popuptime2 = mysqli_real_escape_string($conn, $_POST['popuptime2']);
  $popuptime3 = mysqli_real_escape_string($conn, $_POST['popuptime3']);
  $popuptime4 = mysqli_real_escape_string($conn, $_POST['popuptime4']);
  $popuptime5 = mysqli_real_escape_string($conn, $_POST['popuptime5']);
  $popuptime6 = mysqli_real_escape_string($conn, $_POST['popuptime6']);
  $pucomment =  mysqli_real_escape_string($conn, $_POST['pucomment']);

if($ljs_mod="ip"){
  $sql = "INSERT INTO popups VALUES('$popupname','$popuptime1',
     '$popuptime2', '$popuptime3', '$popuptime4', '$popuptime5',
     '$popuptime6','$pucomment')";
    mysqli_query($conn, $sql);
    mysqli_close($conn);
  echo ("<meta http-equiv='Refresh' content='0; URL=popup_ip.php'>");
}
if($ljs_mod="sp")
{

}
?>
