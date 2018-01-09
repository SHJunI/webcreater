<?php
$no = $_POST['no'];
$conn = mysqli_connect("localhost","root","2919369","student");

$dbfile = "";
if($_FILES['file']['size'])
{
  if(is_uploaded_file($_FILES['file']['tmp_name']))
  {
    $updir = "c:\\xampp\\htdocs\\atom\\class\\upload\\";
    $file = time() . "_" . $_FILES['file']['name'];
    $upfile = $updir . $file;
    if(move_uploaded_file($_FILES['file']['tmp_name'], $upfile))
    {
      $dbfile = "/atom/class/upload/" . $file;
    }
  }
   $sql = "update school set class='{$_POST['class']}',name='{$_POST['name']}',score={$_POST['score']},upload='{$dbfile}'
   where no=$no";
   if($_POST['file_name'] != "")
   {
    unlink("c:/xapp/htdocs" . $_POST['file_name']);
   }
}
else
{
  $sql = "update school set class='{$_POST['class']}',name='{$_POST['name']}',score={$_POST['score']}
  where no=$no";
}

$result = mysqli_query($conn, $sql);

if($result)
{
  echo "<script>
  alert('수정 성공');
  location.href='main.php';
  </script>";
}
else
{
  echo "<script>
  alert('수정실패');
  location.history.back();
  </script>";
}
mysqli_close($conn);
?>
