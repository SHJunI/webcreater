<script>
function cart_confirm() {
  result = confirm("\n장바구니로 가시겠습니까?");
  if(result)
  {
    location.href = "./cart.php";
  }
  else
  {
    location.href = history.back();
  }
}
</script>
<?php
session_start();

if(!isset($_SESSION['cart'][$_POST['num']]))
{
  $_SESSION['cart'][$_POST['num']] = $_POST['count'];
?>
  <script>
  cart_confirm('상품이 추가되었습니다.')
  </script>
  <?php
}
else
{
 ?>
 <script>
 cart_confirm('장바구니에 상품이 없습니다.')
 </script>
 <?php
}
?>
