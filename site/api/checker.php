<?php
session_start();
include_once("../config.php");
$user = $_SESSION['user'];
$result=mysqli_query($db,"SELECT * FROM profile WHERE username = '$user'");
$res=mysqli_fetch_assoc($result);
$desg= $res['desg'];
$data=1;
if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
{
	$data=0;
}
echo json_encode($data);
?>