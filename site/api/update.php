<?php 
include_once '../config.php'; 
session_start();
$a=$_SESSION['user'];
$aclick=$a."click";
$aread=$a."read";
  $main_id=$_GET['id'];
  $sql_update=mysqli_query($db,"UPDATE message SET `$aclick`= 0 where id='$main_id'"); 
  $sql_update=mysqli_query($db,"UPDATE message SET `$aread`= 0 where id='$main_id'"); 
header("Location: showall.php");

?>
