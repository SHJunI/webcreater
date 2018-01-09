<?php
require "conn.php";

$no = $_GET['no'];
$cate = $_GET['cate'];


$sql = "delete from board where no = {$no}";
$result = mysqli_query($conn, $sql);

$sql = "update cate set cnt = cnt -1 where no = {$cate}";
$result = mysqli_query($conn, $sql);

if($result)
{ ?>
<script>
alert('게시글이 삭제되었습니다.');
location.href = 'index.php';
</script>
<?php
}
?>
