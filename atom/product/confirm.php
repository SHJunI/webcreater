<?php
session_start();
require "conn.php";

$sql = "update product_sales set confirm = 1 where product_no = {$_GET['no']} and purchar_id = '{$_SESSION['id']}'";
$result = mysqli_query($conn, $sql);

if($result)
{ ?>
<script>
alert('구매확정 되었습니다.');
location.href = history.back();
</script>
<?php
}
?>
