<?php 
session_start();
$a=$_SESSION['user'];
include_once "../config.php";
$userread=$a."read";
$sql_get=mysqli_query($db,"SELECT * FROM `message`");
while($res=mysqli_fetch_assoc($sql_get))
{
	$read=mysqli_query($db,"UPDATE `message` SET `$userread` = '1'");
}
$sql_get=mysqli_query($db,"SELECT * FROM `complete`");
while($res=mysqli_fetch_assoc($sql_get))
{
	$read=mysqli_query($db,"UPDATE `complete` SET `$userread` = '0'");
}
$sql_get=mysqli_query($db,"SELECT * FROM `coursealert`");
while($res=mysqli_fetch_assoc($sql_get))
{
	$read=mysqli_query($db,"UPDATE `coursealert` SET `$userread` = '0'");
}

 ?>
 
 