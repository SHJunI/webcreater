<?php
require "auth_check.php";
require 'conn.php';
$sql = "select * from product_sales";
$result = mysqli_query($conn, $sql);
$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
$rows = mysqli_num_rows($result);
?>
<html>
<head>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<?php require "admin_header.php"; ?>
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
     <td><?=$arr[$i]['review']?"작성":"미작성"?></td>
     <td><?=$arr[$i]['confirm']?"확정":"미확정"?></td>
   </tr>
   <?php
   }
   ?>
 </table>
<?php require "admin_floot.php"; ?>
