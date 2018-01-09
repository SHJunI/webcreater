<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
  $conn = mysqli_connect("localhost", "root", "2919369", "product");
  $sql = "select *, format(price, 0) as price2 from product where no = {$_GET['num']}";
  $result = mysqli_query($conn, $sql);
  //$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
  $arr = mysqli_fetch_assoc($result);
 require "header.php";
?>
    <div class="product_view_subject">
      <?=$arr['name']?>
    </div>
    <div class="product_view_img">
      <img src="<?=$arr['upload']?>">
    </div>
    <div class="product_view_content">
      <table>
        <tr>
          <td>상품명</td><td><?=$arr['name']?></td>
        </tr>
        <tr>
          <td>가격</td><td><?=$arr['price2']?> 원</td>
        </tr>
        <tr>
          <td>재고</td><td><?=$arr['stock']?> 개</td>
        </tr>
        <form action="cart_proc.php" method="post">
        <tr>
          <td>구매수량</td><td><input name="count" type="number" value="1" min="1" max="<?=$arr['stock']?>"></td>
        </tr>
      </table>
      <input type="hidden" name="num" value="<?=$arr['no']?>">
      <button type="submit" <?=($arr['stock'] < 1)?"class='disabled' disabled":""?>>장바 구니</button><button <?=($arr['stock'] < 1)?"class='disabled' disabled":""?>>구매 하기</button>
    </form>
  </div>
  <div class="cart_purcha">
  <button type="button" onclick="location.href='index.php'" align="center">상품목록</button>
  </div>
  <table>
    <caption>상품리뷰</caption>
    <tr>
      <th>작성자</th><th>내용</th><th>작성일</th>
    </tr>
    <?php
    $sql = "select *from reply where product_no = {$_GET['num']}";
    $result = mysqli_query($conn, $sql);
    $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $rows = mysqli_num_rows($result);
    for($i = 0; $i < $rows; $i++)
    {
     ?>
    <tr>
      <td><?=$arr[$i]['purchar_id']?></td>
      <td><?=$arr[$i]['comment']?></td>
      <td><?=$arr[$i]['regdate']?></td>
    </tr>
    <?php
    }
    ?>
  </table>
<?php require "floot.php"; ?>
