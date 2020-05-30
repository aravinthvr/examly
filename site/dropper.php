<?php 
  session_start();
  $user=$_SESSION['user'];
  include_once("config.php");
  $userread=$user."read";
  $count=0;
  $fordesg=mysqli_query($db,"SELECT * FROM profile WHERE 'username' = '$user'");
  $for=mysqli_fetch_assoc($fordesg);
  $desg=$for['desg'];

  if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
  {
    $sql_get=mysqli_query($db,"SELECT * FROM `alert` WHERE `$user`=1");
    $check=mysqli_num_rows($sql_get);
    if($check)
      {
        echo '<a class="dropdown-item text-danger font-weight-bold" target="blank" href="#"><i class="far fa-calendar-check icon"></i> ALERT</a>';
        $count=1;
      }
  

    $sql_get1 = mysqli_query($db,"SELECT * FROM `coursealert` WHERE `$user`=1");
    if(mysqli_num_rows($sql_get1)>0)
      {
        while ($result = mysqli_fetch_assoc($sql_get1)) 
        {
            echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="courses.html#here'.$result['courseid'].'">'.$result['coursename']." is about to start".'</a>';
            echo '<div class="dropdown-divider"></div>';
        }
        $count=1;
      }
  

    $sql_get1 = mysqli_query($db,"SELECT * FROM `message` WHERE `$userread`=0");
    if(mysqli_num_rows($sql_get1)>0)
      {
        while ($result = mysqli_fetch_assoc($sql_get1)) 
        {
            echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="courses.html#here'.$result['courseid'].'">'.$result['coursename']." Created".'</a>';
            echo '<div class="dropdown-divider"></div>';
        }
        $count=1;
      }
  }


  $sql_get1 = mysqli_query($db,"SELECT * FROM `complete` WHERE `$user`=1");
  if(mysqli_num_rows($sql_get1)>0)
  {
    while ($result = mysqli_fetch_assoc($sql_get1)) 
    {
        echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="courses.html#here'.$result['courseid'].'">'.$result['coursename']." Completed".'</a>';
        echo '<div class="dropdown-divider"></div>';
    }
    $count=1;
  }
  if($count==0)
  {
    echo '<a class="dropdown-item text-danger font-weight-bold" href="#"><i class="far fa-frown icon"></i>Sorry! No Messages</a>';
  }

    
?>