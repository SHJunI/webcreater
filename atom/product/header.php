<?php @session_start(); ?>
<div class="container">
  <div class="top_menu">
    <?php
    echo "<a href='index.php'>처음으로</a>";
    if(isset($_SESSION['admin']) and $_SESSION['admin'])
    {
    echo "<a href='admin.php'>관리자 메뉴</a>";
    }
    echo "<a href='cart.php'>장바구니</a>";
    if(isset($_SESSION['id']))
    {
      echo "<a href='user_info.php'>회원정보</a>";
      echo "<a href='purcha_status.php'>주문현황</a>";
      echo "<a href='logout.php'>로그아웃</a>";
    }
    else
    {
      echo "<a href='login.html'>로그인</a>";
    }
    ?>
  </div>
