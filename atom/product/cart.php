<html>
<head>
  <script src="jquery-3.2.1.js"></script>
  <link rel="stylesheet" href="style.css">
  <script>
  $(document).ready(init_func);
  function init_func()
  {
   $("#checkAll").click(e_check);
   function e_check()
   {
    if($("#checkAll").prop("checked"))
    {
      $("input[name='cart_no[]']").prop("checked", true);
    }
    else
    {
      $("input[name='cart_no[]']").prop("checked",false);
    }
   }
}
  </script>
</head>
<body>
<?php require "header.php"; ?>
  <div class="cart_subject">
    <img src="cart.png">
    <p>장바구니</p>
  </div>
  <div class="cart_list">
  <table>
    <tr>
      <th>선택<br><input type="checkbox" id="checkAll"></th>
      <th>상품번호</th>
      <th>상품<br>
        이미지</th>
      <th>상품명</th>
      <th>구매수량</th>
      <th>상품가격</th>
    </tr>
<?php
    if(!isset($_SESSION['cart']))
    {
?>
      <tr>
        <td colspan="6">장바구니에 저장된 상품이 없습니다</td>
      </tr>
    </table>
    <div class="cart_purcha">
      <button type="button" onclick="location.href='index.php'">
        상품 목록</button>
    </div>
<?php
    }
    else
    {
      $list = implode(",", array_keys($_SESSION['cart']));
      $conn = mysqli_connect("localhost", "root", "2919369", "product");
      $sql = "select *, format(price, 0) as price2
                from product where no IN ({$list})";
      $result = mysqli_query($conn, $sql);
      $arr = mysqli_fetch_all($result, MYSQLI_ASSOC);
      $rows = mysqli_num_rows($result);
?>
      <form action="cart_del.php" method="POST">
<?php
      for($i = 0; $i < $rows; $i++)
      {
?>
        <tr>
          <td rowspan="2"><input type="checkbox" name="cart_no[]" id="cart_no" value="<?=$arr[$i]['no']?>"></td>
          <td rowspan="2"><?=$arr[$i]['no']?></td>
          <td rowspan="2"><img src="<?=$arr[$i]['upload']?>"></td>
          <td rowspan="2"><?=$arr[$i]['name']?></td>
          <td rowspan="2"><?=$_SESSION['cart'][$arr[$i]['no']]?></td>
          <td><?=$arr[$i]['price2']?> 원</td>
        </tr>
        <tr>
          <td><?=number_format($_SESSION['cart'][$arr[$i]['no']] * $arr[$i]['price'])?> 원</td>
        </tr>
<?php
        }
?>
  </table>
  <div>
    <button type="submit">선택된 상품삭제</button>
  </div>
  <div class="cart_purcha">
    <button type="button" onclick="location.href='index.php'">상품 목록</button>
    <button type="submit" formaction="purcha.php">구매하기</button>
  </div>
  </form>
<?php
    }
?>
  </div>
<?php require "floot.php"; ?>
