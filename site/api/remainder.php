<?php 
include_once("../config.php");
session_start();
$sql_get1=mysqli_query($db,"SELECT * FROM message");
$printer=0; 
while($main = mysqli_fetch_assoc($sql_get1))
	{ 
		$a=$main['courseid'];
		// echo $a;
		$sql_result=mysqli_query($db,"SELECT * FROM coursealert WHERE courseid = '$a'");
		// $check=mysqli_num_rows($sql_result);
		// echo $check;
		$res=mysqli_fetch_assoc($sql_result);
		// if($sql_result)
		echo $res['coursename'];
		$print=strtotime($res['crdate']) - strtotime("now");
		$d=strtotime("now");
		
		// echo date("Y-m-d h:i:s", $d);
		// echo time();
		// echo "\t";
		// echo $res['crdate'];
		// echo "\t";
		// echo 'Aravinth_Completed';

		if($print<=150)
		{
			$printer=1;
			$sql_get=mysqli_query($db,"SELECT * FROM profile"); 
			while($main_result = mysqli_fetch_assoc($sql_get))
			{
				if(strcmp($main_result['desg'], "Student")==0||strcmp($main_result['desg'], "student")==0||strcmp($main_result['desg'], "STUDENT")==0)
		    	{
					$username=$main_result['username'];
					// echo $username;
					$res="UPDATE coursealert SET ".$username." = '1' WHERE courseid = ".$a;
					$sql_alter=mysqli_query($db, $res);
			// 		// if($sql_get1)
			// 			// echo "<script> window.location.href = 'reminder.php';</script>";
				}
			}
		}
	}
echo json_encode($printer);
?>