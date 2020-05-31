<?php 
  session_start();
  $user=$_SESSION['user'];
  include_once("config.php");
  $userread=$user."read";
  $userclick=$user."click";
  $count=0;
  //$fordesg=mysqli_query($db,"SELECT * FROM profile WHERE 'username' = '$user'");
  //$for=mysqli_fetch_assoc($fordesg);
  $desg=$_SESSION['desg'];

  if(strcmp($desg, "Student")==0||strcmp($desg, "student")==0||strcmp($desg, "STUDENT")==0)
  {
    $sql_get=mysqli_query($db,"SELECT * FROM `alert` WHERE `$user`=1");
    $check=mysqli_num_rows($sql_get);
    if($check)
      {
        echo '<a class="dropdown-item text-danger font-weight-bold" target="blank" href="#"><i class="far fa-calendar-check icon"></i> ALERT</a>';
        $count=1;
      }
  

    $sql_get1 = mysqli_query($db,"SELECT * FROM `coursealert` WHERE `$userclick`=1 ORDER BY id DESC LIMIT 2");
    if(mysqli_num_rows($sql_get1)>0)
      {
        while ($result = mysqli_fetch_assoc($sql_get1)) 
        {			
            echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="api/read_msg.php?id='.$result['courseid'].'"><strong>'.$result['coursename']."</strong><br /><small> <em> is about to start".'</em></small></a>';
            echo '<div class="dropdown-divider"></div>';
        }
        $count=1;
      }
  

    $sql_get1 = mysqli_query($db,"SELECT * FROM `message` WHERE `$userclick`=0 ORDER BY id DESC LIMIT 2");
    if(mysqli_num_rows($sql_get1)>0)
      {
        while ($result = mysqli_fetch_assoc($sql_get1)) 
        {
            echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="api/read_msg.php?id='.$result['courseid'].'"><strong>'.$result['coursename']." </strong><br /><small> <em>New Module Created".'</em></small>	</a>';
            echo '<div class="dropdown-divider"></div>';
        }
        $count=1;
      }
  }


  $sql_get1 = mysqli_query($db,"SELECT * FROM `complete` WHERE `$userclick`=1 ORDER BY id DESC LIMIT 2");
  if(mysqli_num_rows($sql_get1)>0)
  {
    while ($result = mysqli_fetch_assoc($sql_get1)) 
    {
        echo '<a class="dropdown-item text-primary font-weight-bold" target="blank" href="api/read_msg.php?id='.$result['courseid'].'"><strong>'.$result['coursename']."</strong><br /><small><em> Completed By ".$result['completedstudent']."</em></small>".'</a>';
        echo '<div class="dropdown-divider"></div>';
    }
    $count=1;
  }
  if($count==0)
  {
    echo '<a class="dropdown-item text-danger font-weight-bold" href="#"><i class="far fa-frown icon"></i>Sorry! No Messages</a>';
  }

    
?>








