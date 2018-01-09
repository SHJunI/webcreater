<div class="container">
  <div class="top_menu">
    <?php
    if(isset($_SESSION['admin']) and $_SESSION['admin'])
    {
    echo "<a href='admin.php'>관리자 메뉴</a>";
    }
    echo "<a href='index.php'>메인 페이지</a>";
    if(isset($_SESSION['id']))
    {
      echo "<a href='logout.php'>로그아웃</a>";
    }
    else
    {
      echo "<a href='login.html'>로그인</a>";
    }
    ?>
  </div>
  <div class="admin_menu">
    <ul>
      <li><a href="admin.php">회원 목록</a></li>
      <li><a href="list.php">상품 목록</a></li>
      <li><a href="sales_status.php">구매 현황</a></li>
    </ul>
  </div>
  <div class="admin_content">
