<?php
    session_start();
    include_once "../config.php";
    $user=$_SESSION['user'];
    $desg=$_SESSION['desg'];
    $userread=$user."read";
    // echo $desg;
    $sql_get=mysqli_query($db,"SELECT * FROM `complete` WHERE `$user`=1");
    $count=mysqli_num_rows($sql_get);
    if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
    {
    	$sql_get=mysqli_query($db,"SELECT * FROM `message` WHERE `$userread`=0");
    	$count1=mysqli_num_rows($sql_get);
    	$count=$count+$count1;
        $sql_get=mysqli_query($db,"SELECT * FROM `coursealert` WHERE `$user`=1");
        $count1=mysqli_num_rows($sql_get);
        $count=$count+$count1;
    	// echo "here";
    }
    echo json_encode($count);
?>