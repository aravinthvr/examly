<?php

session_start();
include_once '../config.php'; 
$user=$_SESSION['user'];
$a=$_POST['cid'];
//echo $user;
//echo $a;

$sql_get=mysqli_query($db,"SELECT * FROM profile"); 
while($main_result = mysqli_fetch_assoc($sql_get)): 
	$username=$main_result['username'];
	$userclick=$username."click";
	$userread=$username."read";
	$res="UPDATE complete SET ".$userclick." = '1' WHERE courseid = ".$a;
	$sql_get1=mysqli_query($db, $res);
	$res="UPDATE complete SET ".$userread." = '1' WHERE courseid = ".$a;
	$sql_get1=mysqli_query($db, $res);
	if($user == $username)
	{
		// UPDATE `complete` SET `completedstudent` = 'Aravintha Prasath V' WHERE `complete`.`courseid` = 124
		$res="UPDATE complete SET completedstudent = '".$main_result['name']."' WHERE courseid = ".$a;
		//echo $res;
		$sql_get1=mysqli_query($db, $res);
		//if($sql_get1)
			//echo"success";
	}
	//if($sql_get1)
	//echo "<script>alert('Courses Finished Successfully');</script>";

endwhile;
header("Location: ../courses.html");
?>