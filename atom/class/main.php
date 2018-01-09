<?php
session_start();

$conn = mysqli_connect("localhost","root","2919369","student");

$per_page = 5;
if(!isset($_GET['page']))
{
  $start = 0;
}
else {
  $start = ($_GET['page']-1) * $per_page;
}

if(isset($_GET['keyword']))
{
  $sql = "select * from school where {$_GET['field']} = '{$_GET['keyword']}'
  limit $start, $per_page";
}
else {
  $sql = "select * from school limit $start, $per_page";
}

$result = mysqli_query($conn, $sql);
$rows = mysqli_num_rows($result);
$arr = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>
<html>
<head>
  <style>
  input[type="text"]{
    padding-left: 20px;
    background-position: left center;
    background-size:  contain;
    background-repeat: no-repeat;
  }
  </style>
  <title>학교 성적 관리 프로그램</title>
</head>
<body>
    <table border="1" align="center">
     <form name="class" method="post" action="add.php">
      <?php
      if(!isset($_SESSION['id']))
      {
        echo "<table border='1' align='center'>
        <tr>
          <td>ID</td>
          <td><input type='text' name='id'></td>
        </tr>
        <tr>
          <td>PW</td>
          <td><input type='password' name='pw'></td>
        </tr>
        <tr>
          <td colspan='2' align='center'>
            <input type='submit' formaction='join.php' value='회원가입'>
            <input type='submit' formaction='login.php' value='로그인'>
          </td>
        </tr>
        </table>";
        exit;
      } ?>
      <caption>학생 성적표</caption>
      <?php
      if(isset($_SESSION['admin']))
      {
        echo "<p colspan='6' align= left><a href='admin.php'>관리자 메뉴</a></p>";
      }
      ?>
      <tr>
        <p colspan="6" align ="right">
          <?=$_SESSION['id']?>님 환영합니다. &nbsp; <a href="logout.php">로그아웃</a>
        </p>
      </tr>
      <tr>
        <td>번호</td>
        <td>학번</td>
        <td>학과</td>
        <td>이름</td>
        <td>학점</td>
        <td>사진</td>
      </tr>
      <?php
      for($i = 0; $i < $rows; $i++)
      {
       ?>
      <tr>
        <td><a href="view.php?no=<?=$arr[$i]['no']?>"><?=$arr[$i]['no']?></a></td>
        <td><?=$arr[$i]['id']?></td>
        <td><?=$arr[$i]['class']?></td>
        <td><?=$arr[$i]['name']?></td>
        <td><?=$arr[$i]['score']?></td>
        <td><img src="<?=$arr[$i]['upload']?>" width="80px"></td>
        <?php
       } ?>
      </tr>
      <tr>
        <td colspan="6" align="center">
          <?php
          if(isset($_GET['keyword']))
          {
            $sql = "select count(*) from school where
            {$_GET['field']} = '{$_GET['keyword']}'";
          }
          else {
            $sql = "select count(*) from school";
          }
          $result = mysqli_query($conn, $sql);
          $total_list = mysqli_fetch_row($result)[0];
          $total_page = ceil($total_list / $per_page);

          $per_block = 5;
          if(!isset($_GET['page']))
          {
            $_GET['page'] = 1;
          }
          $cur_block = ceil($_GET['page'] / $per_page);
          $start_page = (($cur_block-1) * $per_page)+1;
          $end_page = $cur_block * $per_block;
          if($end_page > $total_page)
          {
            $end_page = $total_page;
          }

          $query = "";
          if(isset($_GET['keyword']))
          {
           $query = "&field={$_GET['field']}&keyword={$_GET['keyword']}";
          }

          if($cur_block > 1)
          { //6 - 5 = 1 이전 블록 첫 페이지 1, 11 - 5 = 6 이전 블록 첫 페이지 6
           $prev_block = $start_page - $per_block; ?>
           <a href='main.php?page=<?=$prev_block?><?=$query?>'>이전</a>
         <?php  }
          for($i = $start_page; $i <= $end_page; $i++)
          { ?>
           <a href='main.php?page=<?=$i?><?=$query?>'><?=$i?></a>
          <?php }
          if(($end_page+1) <= $total_page)
          {
           $next_block = $end_page + 1; ?>
           <a href='main.php?page=<?=$next_block?><?=$query?>'>다음</a>
         <?php  }
          ?>
      </td>
      </tr>
      <tr>
        <td colspan="6" align="center">
          <input type="submit" value="신규등록">&nbsp;
          <input type="submit" formaction="main.php" value="원래대로">
        </td>
      </tr>
    </form>
      <tr>
        <form action ="main.php" method="get">
        <td colspan="6" align="center">
          <select name="field">
            <option value="name">이름</option>
            <option value="class">학과</option>
            <option value="id">학번</option>
          </select>
          <input type='text' name='keyword'>
          <input type="submit" formaction="main.php" value="검색">
        </td>
      </form>
      </tr>
    </table>
</body>
</html>
