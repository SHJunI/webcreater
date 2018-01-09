<?php
  session_start();

 $user_url_list = array("/atom/product/user_info.php",
  "/atom/product/purcha_status.php");

$url_list_cnt = count($user_url_list);
$found = 0;
for($i = 0; $i < $url_list_cnt; $i++)
{
 if($_SERVER['REQUEST_URI'] == $user_url_list[$i])
  {
    if(!isset($_SESSION['id']))
    {
      ?>
      <script>
      alert('비정상적인 접근입니다.');
      location.href = history.back();
      </script>
      <?php
      exit;
    }
        $found = 1;
  }
}
if(!$found) //사용자 정보페이지가 아닌경우
{
  // 관리자여부 체크
  if(!isset($_SESSION['admin']) or !$_SESSION['admin'])
  {
?>
<script>
alert('비정상적인 접근입니다.');
location.href = history.back();
</script>
<?php
   exit;
  }
}
 ?>
