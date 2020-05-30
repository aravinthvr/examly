
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/cdfac6c7af.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link rel="stylesheet" type="text/css" href="stylesheet.css">

    <title>Examly Home Page</title>
  </head>
  <body>
    <nav class="navbar sticky-top navbar-expand-lg navbar-expand-sm navbar-expand-md navbar-light bg-primary">
      <div class="container">
        <a class="navbar-brand" href="#">EXAMLY HOME PAGE</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell"></i> <span class="badge badge-danger count" id="count"></span>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <div id="dropmenu"></div>
                
                <a class="dropdown-item text-danger font-weight-bold" target="blank" href="api/showall.php"><i class="fas fa-envelope-open icon"></i>All Notification</a>
                <?php  
                if($count!=0)
                  echo '<a class="dropdown-item text-danger font-weight-bold" target="blank" href="readalls.php"><i class="fas fa-arrow-down icon"></i>  Clear All</a>';
                ?>
              </div>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="wrapper">
      <div class="sidebar">
        <h3>Menu</h3>
        <ul>
          <li><a href="home.html"><i class="fas fa-user-graduate"></i>PROFILE</a></li>
          <li class="active"><a href="#"><i class="fa fa-book"></i>COURSES</a></li>
          <li id="clock"></li>
        </ul>
      </div>
      <div class="main_content">
        <div class="header"><i class="fas fa-home"></i>/ Courses</div>
        <div id="coursemain"></div>
        <div id="forstaff">
          <div class="info">
            <div id="margin-content">
                <div>
                  <form method="post"  id="createbut">
                  <label><b>Course Name</b></label><input type="text" class="form-control" placeholder="Enter Course Name to Add" name="cname" id="cname" required>

                  <label><b>Course ID</b></label><input type="text" class="form-control" placeholder="Enter Course ID to Add" name="cid" id="cid" required>

                  <label><b>Course Message </b></label><input type="text" class="form-control" placeholder="Enter Custom Message" name="cmsg" required>
                  <button type="submit" name="createbut">Create</button>
                </form>
                </div>
                <div>
                  <form method="post" id="deletebut">
                  <label><b>Course ID</b></label><input type="text" class="form-control" placeholder="Enter Course Name to Delete" name="course">
                              
                  <button type="submit" id="deletebut" name="deletebut">Delete</button>
                </form>
                </div>
                <div>
                  <form method="post" id="trigger">                          
                    <label><b>Turn ON Trigger :</b></label><button type="submit" name="trigger">Trigger</button>
                  </form>
                  <form method="post" id="rtrigger">
                  <label><b>Turn OFF Trigger : </b></label><button type="submit"  name="rtrigger">Reset</button>
                </form>
                </div>
            </div>
        </div>;
        </div>
      </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  </body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
      $('#forstaff').hide();
      function checker()
      {
        $.ajax({
          url: "api/checker.php",
          method: "POST",
          datatype:"json",
          success:function(data)
          {
            if(data==1)
              $('#forstaff').show();
            else
            {
              $.ajax({
                  url: "api/cmain.php",
                  method: "POST",
                  datatype:"json",
                  success:function(data)
                  {
                      $('#coursemain').html(data);
                  }
              })
            }
          }
        })
      }
      checker();
      // $('#forstaff').hide();
      function counter()
      {
        $.ajax({
          url: "api/count.php",
          method: "POST",
          datatype:"json",
          success:function(data)
          {
            $('#count').text(data);
          }
        })
      }
      counter();
      function remainder()
      {
        $.ajax({
          url: "api/remainder.php",
          method: "POST",
          datatype:"json",
          success:function(data)
          {
            if(data==1)
              counter();
          }
        })
      }
      remainder();
      function clock()
      {
        $.ajax({
          url: "api/clock.php",
          method: "POST",
          datatype:"json",
          success:function(data)
          {
             $('#clock').html(data);
          }
        })
      }
      clock();

      // function courser()
      // {
      //   $.ajax({
      //     url: "api/cmain.php",
      //     method: "POST",
      //     datatype:"json",
      //     success:function(data)
      //     {
      //       $('#coursemain').html(data);
      //     }
      //   })
      // }
      // courser();

      function droper()
      {
        $.ajax({
          url: "dropper.php",
          method: "POST",
          datatype:"json",
          success:function(data)
          {
            $('#dropmenu').html(data);
          }
        })
      }
      droper();

      // $(document).on('click', '.dropdown-toggle', function(){
      //     $('.count').html('');
      //      $('.dropdown-toggle', '.click')[0].reset();
      //     var username=$('input').val();
      //     $.ajax({
      //       url:'readall.php',
      //       method:'get',
      //       data:{name:username},
      //       success:function(data)
      //       {
      //         // alert(username);
      //       }
      //     });

      // });

      $('#createbut').on('submit', function(event){
          event.preventDefault();
             var form_data = $(this).serialize();
             $.ajax({
                url:"api/create.php",
                method:"POST",
                data:form_data,
                success:function(data)
                {
                  $('#createbut')[0].reset();
                }
             });
     });
     $('#deletebut').on('submit', function(event){
          event.preventDefault();
             var form_data1 = $(this).serialize();
             $.ajax({
                url:"delete.php",
                method:"POST",
                data:form_data1,
                success:function(data)
                {
                  $('#deletebut')[0].reset();
                }
             });
     });
     $('#trigger').on('submit', function(event){
          event.preventDefault();
             var form_data1 = $(this).serialize();
             $.ajax({
                url:"api/trigger.php",
                method:"POST",
                data:form_data1,
                success:function(data)
                {
                  // $('#count').text(data);
                  $('#trigger')[0].reset();
                }
             });
     });
     $('#rtrigger').on('submit', function(event){
          event.preventDefault();
             var form_data1 = $(this).serialize();
             $.ajax({
                url:"api/rtrigger.php",
                method:"POST",
                data:form_data1,
                success:function(data)
                {
                  // $('#count').text(data);
                  $('#rtrigger')[0].reset();
                }
             });
     });
     $('#finishbut').on('submit', function(event){
          event.preventDefault();
             var form_data1 = $(this).serialize();
             $.ajax({
                url:"api/setone.php",
                method:"POST",
                data:form_data1,
                success:function(data)
                {
                  // $('#count').text(data);
                  $('#finishbut')[0].reset();
                }
             });
     });

      setInterval(function(){ 
      counter();
      droper();   
      remainder();
      clock();
     }, 1000);

  });
</script>