<?php 
     session_start();

    include_once '../config.php'; 
    $name=$_POST['name'];
    $roll=$_POST['roll'];
    $dept=$_POST['dept'];
    $clg=$_POST['clg'];
    $desg=$_POST['desg'];
    $uname=$_SESSION['user'];
    $userread= $uname."read";
    $userclick= $uname."click";
    $s="UPDATE `profile` SET `name` = '$name', `rollno` = '$roll', `dept` = '$dept', `clg` = '$clg', `desg` = '$desg' WHERE `profile`.`username` = '$uname';";

    if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
    {
      $reg2="ALTER TABLE `message` ADD `$userread` INT NOT NULL";
      mysqli_query($db,$reg2);
      $reg2="ALTER TABLE `message` ADD `$userclick` INT NOT NULL";
      mysqli_query($db,$reg2);
      $reg3="ALTER TABLE `alert` ADD `$uname` INT NOT NULL";
      mysqli_query($db,$reg3);
      $reg4="ALTER TABLE `coursealert` ADD `$uname` INT NOT NULL";
      mysqli_query($db,$reg4);
    }

    $result=mysqli_query($db,$s);
    if($result)
        echo "<script>alert('Successful'); window.location.href = '../index.php';</script>";
      
    
    
?>
