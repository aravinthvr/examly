<?php
    include_once "../config.php";
    session_start();
    $user=$_SESSION['user'];

       $sql_get=mysqli_query($db,"SELECT * FROM profile WHERE username='$user'"); 
      // while($main_result = mysqli_fetch_assoc($sql_get)): 
      $main_result = mysqli_fetch_assoc($sql_get);
      $desg=$main_result['desg'];
      echo '<div class="info">';
         
            // $sql_get=mysqli_query($db,"SELECT * FROM profile WHERE username='$user'"); 
            // // while($main_result = mysqli_fetch_assoc($sql_get)): 
            // $main_result = mysqli_fetch_assoc($sql_get)
         
            echo '<div id="margin-content">
              <section class="row">';
             
                $sql_get=mysqli_query($db,"SELECT * FROM message"); 
                while($main_result = mysqli_fetch_assoc($sql_get)): 
             
                echo '<div class="col-md-4 col-sm-6 col-xs-12">
                    <a id="here'; echo $main_result['courseid']; echo'" href="api/read_msg.php?id='; echo $main_result['id']; echo '" target="blank">
                      <div class="course-tile">
                         <img src="../images/course.png" width="300" height="300" alt="courses">
                         <span>';echo $main_result['coursename']; echo '</span>
                      </div>
                    </a>
                    <form method="post" action="api/setone.php">                              
                      <input type="hidden" name="cid" value="';echo $main_result['courseid']; echo '">
                      <button type="submit" class="btn btn-danger" id="finishbut" name="finishbut">Finish Course</button>
                    </form>
                </div>';
              endwhile;
                echo '</section>
        </div>';
  
    ?>
