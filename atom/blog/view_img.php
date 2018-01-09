<?php
if($_GET['type'] == "image")
{
?>
<img src="<?=$_GET['img']?>">
<?php
}
else {
?>
<video src="<?=$_GET['img']?>" controls>
<?php
}
?>
