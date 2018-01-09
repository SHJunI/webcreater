<?php

require "conn.php";

$sql = "insert into  product(name, price, stock) values('1',1,1)";

for($i = 0; $i < 100; $i++)
{
  $sql = $sql . ", ('1', 1,1)";
  mysqli_query($conn, $sql);
}


 ?>
