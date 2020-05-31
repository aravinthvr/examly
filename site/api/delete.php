<?php  
	session_start();
	require_once '../config.php';
	$name=$_POST['course'];
	$sql_delete=mysqli_query($db,"DELETE FROM message WHERE courseid = '$name'");
	$sql_delete=mysqli_query($db,"DELETE FROM complete WHERE courseid = '$name'");
	$sql_delete=mysqli_query($db,"DELETE FROM coursealert WHERE courseid = '$name'");
	if($sql_delete)
	{
		//echo "<script>alert('Courses Deleted Successfully');";
		header("Location: ../courses.html");
		// echo "<script>alert('Course Deleted Successfully');</script>";
		// header("Location: courses.php");
	}
	else
	{
		echo mysqli_error($db);
		exit;
	}
	header("Location: ../courses.html");
	echo json_encode($data);
	
?>
