### Build a Scalable In-App Notification System

  Here, the simple login page is created along with the In-App Notification System. There is bell like icon on the top-right corner of the screen with the count of notifications. 
  The notification includes, course starting, course finished by either of the batchmates and Alert Trigger by staffs.
    Here, it is divided into several subcategories.
    
### Category 1: Login & Signin:
  => While signing in, the data of the user is get and according the space in the database is created.
  => In this, classification is, staff or student.
  => Because, Staff have the access to trigger alert and start new course.
  => All other notification is to the Students.
  
### Category 2: Home or Profile:
  => Here, the user's detail fetched during the signup is displayed.
  => Along with that, there will be a header for notification Section.
  => Both, student and staff will have a same action for this page.
  
### Category 3: Courses or Form Action:
  => Here, there will be jQuery to select the content to be displayed on the screen.
  => Because, for Student there will be course tile and for staff there will be actions like create course, delete course, trigger alert etc.,
  => Here, there will be a finish button to finish all the courses.
  
### Category 4: Notification Bell:
  => This is the Bell icon on the top-right corner of the screen. It will display the count of the notification.
  => While clicking, there will be dropdown box showing the notification.
  => Here, the API and the Algorithms or Methods used are listed below.
  
#### Methods
## Read Tracker:
  => Here, AXAX and JQUERY is used to prevent the page from loading for a small bit of data.
  => Here, Count and Notification Toggle are created with certain IDs to refer.
  => Whenever, the user click the bell button, jQuery will trigger and all the notifications will be marked as read in the database.
  
## Click Tracker:
  => Here, the click tracker is used to find whether the user reads full notification or just viewed its outer.
  => In this, we make the message as read when the user click on the notification.
  => In addition, it will go to the course tile in course page when he clicks. For more information, he can click the tile for redirecting the page with information.
  => Same like Read Tracker, here also AJAX along jQuery is triggered (pointing to php file) and make that notification to be marked as read in the database.
  
## Time Trigger:
  => Here, the custom time is given as starting time. Here, we used as 10 minutes from the time of creation.
  => The alert will be generated, when it is 2:30 minutes before the time of start and it will be the setpoint.
  +> It is based on the algorithm that, the starting date and the current date is get subtracted. For this, the time and date is converted into UNIX (i.e. Number of Seconds) and when it is 150(i.e. 2:30 minutes in Seconds) or below, it will mark as mark as alert in the database.

              ###################################################################################
#### Main Algorithms:
##Summary:
  => Mark Read when user clicks Bell Buttton.
  => Mark Click when user clicks Notification.
  => Mark Trigger when subtracted value between Start and Current meets the Setpoint.
  => Trigger Signal from Staff when Trigger Button actuates.
  
   All the above are done with the help of AJAX and jQuery along with php language. Here, the used the AJAX method is Google AJAX. All are tested in Local Servers (like Xampp Servers) and also in Online servers like azure. 
   
   Here, we are using Azure Databases and Azure Servers. The server is a Fre-Tier one. So, please Wait for Some times, if containers of page is loadin in the webpage. Sorry for this inconvenience and may work fast is the server is Good Maintained One.
   
   The codes and the Database Export file also includes and check for your concern.
