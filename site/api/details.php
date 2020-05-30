<?php 
session_start();
include_once "config.php";
$user=$_SESSION['user'];

$sql_get=mysqli_query($db,"SELECT * FROM profile WHERE username='$user'"); 
              // while($main_result = mysqli_fetch_assoc($sql_get)): 
$main_result = mysqli_fetch_assoc($sql_get);
// echo $user;

echo '<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

<div class="info">';
            // <?php
              
              
    echo '<div id="margin-content">
              <ul>  
                <li>Name &emsp;&emsp;&nbsp;&nbsp;&nbsp;:&emsp;<span class="blue">';echo $main_result['name']; 
                echo'</span></li>
                <li>Roll No.&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;<span class="blue">';echo $main_result['rollno'];
              echo'</span></li>
                <li>Department&nbsp;&nbsp;:&emsp;<span class="blue">'; echo $main_result['dept']; 
                echo '</span></li>
                <li>College&emsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&emsp;<span class="blue">';echo $main_result['clg']; 
                echo'</span></li>
                <li>Designation&nbsp;&nbsp;:&emsp;<span class="blue">'; echo $main_result['desg']; echo'</span></li>
              </ul>
            </div>
        </div>
      </div>
    </div>
</body>
</html>';

?>