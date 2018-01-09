<?php
require "conn.php";
session_start();
//pw 변경여부 확인
if($_POST['pw'] == "") //비밀번호 변경 X
{
  $pw = "'{$_POST['org_pw']}'"; // 암호화된 비밀번호(기존 비밀번호)
}
else //비밀번호변경 O
{
  $pw = "sha2('{$_POST['pw']}', 0)"; //변경된 비밀번호를 암호화
}

$sql = "update users set name='{$_POST['name']}', email='{$_POST['email']}',addr='{$_POST['addr']}'
, tel='{$_POST['tel']}', pw=$pw where id = '{$_SESSION['id']}'";
$result = mysqli_query($conn, $sql);

if($result)
{
  ?>
<script>
alert('회원정보가 수정되었습니다.');
location.href = "index.php";
</script>
  <?php
}
else
{
?>
<script>
alert('회원정보 수정 실패.');
location.href = history.back();
</script>
<?php
}
?>
