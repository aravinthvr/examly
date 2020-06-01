<?php 
    
    session_start();

    include_once '../config.php'; 
    if(isset($_POST['submitbut']))
    {
        $name=$_POST['user'];
        $pass=$_POST['password'];
        $read=$name."read";
		$click=$name."click";
        $s="SELECT * FROM profile WHERE username='$name'";

        $result=mysqli_query($db,$s);

        $num=mysqli_num_rows($result);
        if($num==1)
        {
            echo "<script>alert('User Already Exist'); window.location.href = 'signup.html';</script>";
        }
        else
        {
            $_SESSION['user']=$name;
            $reg="INSERT INTO profile(username,password) VALUES ('$name','$pass')";
            mysqli_query($db,$reg);
            $reg2="ALTER TABLE `complete` ADD `$read` INT NOT NULL";
            mysqli_query($db,$reg2);
			$reg2="ALTER TABLE `complete` ADD `$click` INT NOT NULL";
            mysqli_query($db,$reg2);
            

            header("Location: signup1.html");
        }
    }
?>
