<?php require "auth_check.php"; ?>
<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
 require "conn.php";

  //print_r($_POST);
  $per_page = 7;
  if(isset($_GET['page']))
  {
    $start = ($_GET['page']-1) * $per_page;
  }
  else{
    $start = 0;
  }

  if(isset($_GET['keyword']))
  {
    $sql = "select * from product where
            {$_GET['field']} = '{$_GET['keyword']}'
            limit $start, $per_page";
  }
  else
  {

    $sql = "select product.*, count(reply.no) as reply_cnt from product left join reply on
    product.no = reply.product_no group by product.no limit $start, $per_page";
  }
  $result = mysqli_query($conn, $sql); //쿼리 전송 함수
  $arr = mysqli_fetch_all($result, MYSQLI_NUM); //데이터 가져오는 함수
  $rows = mysqli_num_rows($result); // 행의 개수
  $fields = mysqli_num_fields($result); // 필드 개수
  mysqli_free_result($result); // 메모리 해제

require "admin_header.php";

  echo "<table border='1' align='center'>";
  echo "<caption>상품 목록</caption>";
  echo "<thead>
          <th>상품번호</th>
          <th>상품명</th>
          <th>재고</th>
          <th>가격</th>
          <th>상품이미지</th>
        </thead>
        <tbody>";
  for($i = 0; $i < $rows; $i++) //행의 개수 1 부터 시작
  {
    echo "<tr onclick=\"location.href='view.php?num={$arr[$i][0]}'\">";
    for($j = 0; $j < $fields-2; $j++)
    {
      if($j == 1){
        echo "<td>{$arr[$i][$j]} [{$arr[$i][6]}]</td>";
        continue;
      }
      if($j == 4 and $arr[$i][$j] != '')
      {
        echo "<td><img src='{$arr[$i][$j]}' width='50px'></td>";
        continue;
      }
      echo "<td>" . $arr[$i][$j] . "</td>";
    }
    echo "</tr>";
  }
  echo "</tbody>
        <tfoot>
         <tr>
          <form action='list.php' method='GET'>
          <td colspan='5'>
            <input type='button' value='추가' onclick=\"location.href='add.php'\">
            <select name='field'>
              <option value='name'>상품명</option>
              <option value='stock'>재고</option>
              <option value='price'>가격</option>
            </select>
            <input type='text' name='keyword'>
            <input type='submit' value='검색'>
          </td>
          </form>
        </tr>";

  echo "<tr>
          <td colspan='5'>";

  $per_block = 5; //페이지당 보여질 페이지 번호 개수
  //만약에 지금이 1 ~ 5 페이지라면 페이지리스트는 1 ~ 5
  //만약에 지금이 6 ~ 10 페이지라면 페이지리스트는 6 ~ 10
  if(!isset($_GET['page']))
  {
    $_GET['page'] = 1;
  }
  $cur_block = ceil($_GET['page'] / $per_block);
  //현재 블록 번호 확인
  $start_page = (($cur_block-1) * $per_block) + 1;
  //시작 페이지 번호
  $end_page = $cur_block * $per_block;
  //마지막 페이지 번호

  if(isset($_GET['keyword']))
  {
    $sql = "select count(*) from product where
            {$_GET['field']} = '{$_GET['keyword']}'";
  }
  else
  {
    $sql = "select count(*) from product"; //데이터 전체 개수 확인
  }

  $result = mysqli_query($conn, $sql);
  $total_list = mysqli_fetch_row($result)[0];
  //0번째 데이터(데이터 개수) 추출
  $total_page = ceil($total_list / $per_page);
  //전체 페이지 개수 구하기 = 전체 데이터 개수 / 페이지 당 표시글 개수
  //ceil() 함수 : 소수점 자리 올림
  if($end_page > $total_page)
  {
    $end_page = $total_page;
    //페이지 리스트의 마지막 페이지가 전체 페이지 개수 보다 크다면
    //페이지 리스트의 마지막 페이지를 전체 페이지 개수로 변경
  }
  $query = "";
  if(isset($_GET['keyword']))
  {
    $query = "&field={$_GET['field']}&keyword={$_GET['keyword']}";
  }

  if($cur_block > 1)
  {
    $prev_block = $start_page - $per_block;
    echo "<a href='list.php?page={$prev_block}{$query}'>이전</a>";
  }

  for($i = $start_page; $i <= $end_page; $i++)
  {
    echo "<a href='list.php?page={$i}{$query}'>{$i}</a>";
    //페이지 개수 만큼 for 반복문 실행 => 페이지 링크 표시
  }

  if(($end_page + 1) <= $total_page)
  {
    $next_block = $end_page + 1;
    echo "<a href='list.php?page={$next_block}{$query}'>다음</a>";
  }
  echo "  </td>
        </tr>
        </tfoot>";
  echo "</table>";

mysqli_close($conn);

require "admin_floot.php";
?>
