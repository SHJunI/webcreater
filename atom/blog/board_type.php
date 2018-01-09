<script>
  function show_input(no)
  {
    if(document.getElementById("reply_input"+no).style.display == "table-row")
    {
    document.getElementById("reply_input"+no).style = "display: table-none";
    document.getElementById("reply_button"+no).innerHTML = "댓글입력";
    }
    else {
    document.getElementById("reply_input"+no).style = "display: table-row";
    document.getElementById("reply_button"+no).innerHTML = "댓글닫기";
    }
  }
</script>
<script src="jquery-3.2.1.js"></script>
<script>
function page(page, per_page)
{
  if(!per_page)
  {
    per_page = 3;
  }
  $.ajax({
    type: "GET",
    url: "board_paging.php",
    data: {"page":page, "category":"<?=$cur_item['category']?>" , "no":"<?=$cur_item['no']?>", "per_page":per_page},
    success: view_cate_list
  });
}
function view_cate_list(data)
{
  $("#cate_list").html(data);
}
page(1, 0);
function per_page()
{
  page_in_list = $("select[name='per_page']").val();
  page(1, page_in_list);
}
function show_cate()
{
  open = $("#show_cate_tag").attr("open_val");
  if(open == 1)
  {
  $("#show_cate_tag").text("목록열기");
  $("#show_cate_tag").attr("open_val", "0");
  $("#cate_list").css("display", "none");
  }
  else
  {
    $("#show_cate_tag").text("목록닫기");
    $("#show_cate_tag").attr("open_val", "1");
    $("#cate_list").css("display", "table");
  }
}
</script>
<div>
  <p class="center"><span class="s_font" onclick="show_cate()" id="show_cate_tag" open_val="1">목록닫기</span></p>
<table class="s_font" id="cate_list">
  <input type="hidden" name="no" value="<?=$cur_item['no']?>">
  <input type="hidden" name="cate" value="<?=$cur_item['category']?>">
</table>
</div>
<div class="content">
  <p><span class="f_left b_font bold">
 <?=$cur_item['subject']?>
  </span>
  <span class="f_right s_font">
    <a href="mod.php?no=<?=$cur_item['no']?>">수정</a>&nbsp;
    <a href="del.php?no=<?=$cur_item['no']?>&cate=<?=$cur_item['category']?>">삭제</a>
  </span>
  </p>
  <br>
 <p>
   <span class="f_left"><?=$cur_item['writer']?></span>
   <span class="f_right"><?=$cur_item['regdate']?></span>
 </p>
 <br>
 <hr>
 <p><pre><?=$cur_item['comment']?></pre></p>
</div>
<p class="right"><a href="#">▲ top</a></p>
<div class=" content">
  <table class="reply_table">
    <caption>댓글 등록</caption>
    <form action="reply_add.php" method="post">
      <input type="hidden" name="board_no" value="<?=$cur_item['no']?>">
      <input type="hidden" name="top_no" value="0">
    <tr>
      <td><input type="text" name="writer"></td>
      <td class="subject"><textarea  class="reply_comment" name="comment"></textarea></td>
      <td><button>댓글 등록</button></td>
    </tr>
    </form>
  </table>
  <table class="reply_table">
    <caption>등록된 댓글</caption>
<?php
$sql = "select *from reply where board_no = {$cur_item['no']} order by top_no";
$result = mysqli_query($conn, $sql);
$reply_items = mysqli_fetch_all($result, MYSQLI_ASSOC);
$reply_rows = mysqli_num_rows($result);

for($i = 0; $i < $reply_rows; $i++)
{
?>
    <tr>
      <form action="reply_mod.php" method="post">
        <input type="hidden" name="no" value="<?=$reply_items[$i]['no']?>">
        <input type="hidden" name="top_no" value="<?=$reply_items[$i]['top_no']?>">
        <input type="hidden" name="board_no" value="<?=$reply_items[$i]['board_no']?>">
      <td>
<?php
if($reply_items[$i]['no'] != $reply_items[$i]['top_no'])
{
echo "└";
}
?>
        <input type="text" name="writer" value="<?=$reply_items[$i]['writer']?>" readonly></td>
      <td class="subject"><textarea  class="reply_comment" name="comment"><?=$reply_items[$i]['comment']?></textarea></td>
      <td><button>수정</button><button formaction="reply_del.php">삭제</button>
      </form>
<?php
if($reply_items[$i]['no'] == $reply_items[$i]['top_no'])
{
?>
       <button type="button" onclick="show_input(<?=$reply_items[$i]['top_no']?>)" id="reply_button<?=$reply_items[$i]['top_no']?>">댓글입력</button>
<?php
}
?>
      </td>
    </tr>
<?php
if($reply_items[$i]['no'] == $reply_items[$i]['top_no'])
{
?>
    <form action="reply_add.php" method="post">
      <input type="hidden" name="top_no" value="<?=$reply_items[$i]['no']?>">
      <input type="hidden" name="board_no" value="<?=$cur_item['no']?>">
      <tr id="reply_input<?=$reply_items[$i]['no']?>">
        <td>└<input type="text" name="writer"></td>
        <td class="subject"><textarea class="reply_comment" name="comment"></textarea></td>
        <td><button>댓글 등록</button></td>
      </tr>
    </form>
<?php
}
}
?>
  </table>
</div>
