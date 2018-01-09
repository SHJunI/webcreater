<?php
session_start();
$conn = mysqli_connect("localhost","root","2919369","product");

if(!isset($_POST['cart_no']))
{
?>
<script>
alert('선택된 상품이 없습니다.');
location.href = history.back();
</script>
<?php
exit;
}
$cart_no_count = count($_POST['cart_no']);
for($i = 0; $i < $cart_no_count; $i++)
{
  $sql = "update product set stock = stock - {$_SESSION['cart'][$_POST['cart_no'][$i]]}
  where {$_POST['cart_no'][$i]}";
  mysqli_query($conn, $sql);
  $sql = "insert into product_sales(purchar_id,product_no)
  values ('{$_SESSION['id']}',{$_POST['cart_no'][$i]})";
  mysqli_query($conn, $sql);


  unset($_SESSION['cart'][$_POST['cart_no'][$i]]);
}
$sess_count = count($_SESSION['cart']);
if(!$sess_count)
{
  unset($_SESSION['cart']);
}
?>
<script>
alert('구매가 완료되었습니다.');
location.href = 'index.php';
</script>
