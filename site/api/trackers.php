<?php
	session_start();
    include_once "../config.php";
    $user=$_SESSION['user'];
    $desg=$_SESSION['desg'];
    $userread=$user."read";
	$userclick=$user."click";
	$sql_get=mysqli_query($db,"SELECT * FROM `complete` WHERE `$userread`=0");
    $count=mysqli_num_rows($sql_get);
	if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
    {
    	$sql_get=mysqli_query($db,"SELECT * FROM `message` WHERE `$userread`=1");
    	$count1=mysqli_num_rows($sql_get);
    	$count=$count+$count1;
        $sql_get=mysqli_query($db,"SELECT * FROM `coursealert` WHERE `$userread`=0");
        $count2=mysqli_num_rows($sql_get);
        $count=$count+$count2;
    }
	echo "_Read Tracker: ".$count."_";
	$sql_get=mysqli_query($db,"SELECT * FROM `complete` WHERE `$userclick`=0");
    $count=mysqli_num_rows($sql_get);
	if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
    {
    	$sql_get=mysqli_query($db,"SELECT * FROM `message` WHERE `$userclick`=1");
    	$count1=mysqli_num_rows($sql_get);
    	$count=$count+$count1;
        $sql_get=mysqli_query($db,"SELECT * FROM `coursealert` WHERE `$userclick`=0");
        $count2=mysqli_num_rows($sql_get);
        $count=$count+$count2;
    }
	echo " _Click Tracker: ".$count."_";
?>