<?php
require "auth_check.php";
require "conn.php";
require "header.php";
?>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <?php
  $sql = "select * from product_sales where purchar_id = '{$_SESSION['id']}'";
  $result = mysqli_query($conn, $sql);
  $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $rows = mysqli_num_rows($result);
  ?>
  <div class="purcha_status">
  <table>
    <tr>
      <th>번호</th>
      <th>구매자ID</th>
      <th>구매상품번호</th>
      <th>리뷰작성여부</th>
      <th>구매확정여부</th>
    </tr>
    <?php
    for($i = 0; $i < $rows; $i++)
    {
     ?>
    <tr>
      <td><?=$arr[$i]['no']?></td>
      <td><?=$arr[$i]['purchar_id']?></td>
      <td><?=$arr[$i]['product_no']?></td>
      <td><button onclick="location.href='review.php?no=<?=$arr[$i]['product_no']?>'"<?=$arr[$i]['review']?"disabled":""?>>리뷰작성
      </button></td>
      <td><button onclick="location.href='confirm.php?no=<?=$arr[$i]['product_no']?>'"<?=$arr[$i]['confirm']?"disabled":""?>>구매확정
      </button></td>
    </tr>
    <?php
    }
    ?>
  </table>
</div>
<?php require "floot.php"; ?>
