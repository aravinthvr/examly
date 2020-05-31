<?php 
	include_once "../config.php";
	$sql_get=mysqli_query($db,"SELECT * FROM `profile`");
  // if($sql_get)
  //   echo "success";
  while($res=mysqli_fetch_assoc($sql_get)):
    if(strcmp($res['desg'], "Student")==0||strcmp($res['desg'], "student")==0||strcmp($res['desg'], "STUDENT")==0)
    { 
      $read = "UPDATE `alert` SET `".$res['username']."` = 0";
      $result=mysqli_query($db,$read);
    }
  endwhile;
  header("Location: ../courses.html");
  ?>