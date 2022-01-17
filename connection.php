<?php

$db=mysqli_connect("localhost","root","","mydb");

$result=mysqli_query($db,"SELECT * from mytable");

while($row=mysqli_fetch_array($result))
{

	echo "<br>";
}
?>
