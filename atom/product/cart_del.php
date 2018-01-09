<?php
 session_start();

$cart_count = count($_POST['cart_no']);
$sess_count = count($_SESSION['cart']);
if($cart_count == $sess_count)
{
  unset($_SESSION['cart']);
}
else {
  for($i = 0; $i < $cart_count; $i++)
  {
    unset($_SESSION['cart'][$_POST['cart_no'][$i]]);
  }
}
?>

<script>
alert('선택한 상품은 삭제 했습니다.');
location.href = history.back();
</script>
