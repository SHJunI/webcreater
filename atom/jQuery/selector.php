<script src="jquery-3.2.1.js"></script>

전체선택 <input type="checkbox" name="checkAll"><br>
1번 <input type="checkbox" name="check[]"><br>
2번 <input type="checkbox" name="check[]"><br>
3번 <input type="checkbox" name="check[]"><br>

<input type="text" name="addr"><input type="checkbox" id="addr_input">위 주소와 동일
<br><input type="text" name="addr2">

<script>
$("#addr_input").click(addr_copy)
function addr_copy()
{
  if($("#addr_input").prop("checked"))
  {
  addr = $("input[name='addr']").val();
  $("input[name='addr2']").val(addr);
  }
  else
  {
    $("input[name='addr2']").val("");
  }
}
$("input[name='checkAll']").click(e_check);
function e_check()
{
  if($("input[name='checkAll']").prop("checked"))
  {
   $("input[name='check[]']").prop("checked", true);
  }
  else
  {
    $("input[name='check[]']").prop("checked", false);
  }
}
</script>
