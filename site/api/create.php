<?php
	session_start();
	require_once '../config.php';
	$name=$_POST['cname'];
	$msg = $_POST['cmsg'];
	$id=$_POST['cid'];
	$a=$_POST['date'];
	
	$add=date("Y-m-d h:i:sa");
	$a = strtotime($add);
	$a = $a + 300;
	$print=date("Y-m-d h:i:sa",$a);
// echo "Created date is " . date("Y-m-d h:i:sa",$a);
	$sql_insert=mysqli_query($db,"INSERT INTO `message` (`id`, `courseid`, `crdate`, `coursename`, `coursemessage`) VALUES (NULL, '$id', '$print', '$name', '$msg');");

	$sql_insert1=mysqli_query($db,"INSERT INTO `complete` (`id`, `courseid`, `coursename`, `coursemessage`) VALUES (NULL, '$id', '$name', '$msg');");  //ALTER TABLE `complete` ADD `$name` INT NOT NULL
	$sql_insert2=mysqli_query($db,"INSERT INTO `coursealert` (`id`, `courseid`, `coursename`, `crdate`) VALUES (NULL, '$id', '$name', '$print');");
	if($sql_insert && $sql_insert1)
	{
		// echo "<script>alert('Message Send Successfully'); window.location.href = 'courses_staff.php';</script>";
		// echo "<script>alert('Messge Send Successfull');</script>";
		// header("Location: courses_staff.php");
	}
	else
	{
		echo mysqli_error($db);
		// exit;
	}

?>