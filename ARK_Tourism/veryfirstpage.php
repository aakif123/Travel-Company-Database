<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>User &bull; ARK Tourism</title>
    <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>

<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap');

body {
  font-family: 'Lora', serif;
}
.navbar{
        background-color: #E7E7E7;
    }
</style>

</head>
<body onmousedown="return false" onselectstart="return false">

<?php

    //creating a session for successfull login
    session_start();

    //database connection
    require 'db_connection.php';
    //getting user name
    $username =  $_SESSION['user_name'];

    $_SESSION['email_id'] = $_SESSION['email_id'];

?>

<nav class="navbar navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="veryfirstpage.php" class="navbar-brand" style="color: black;"><span class="glyphicon glyphicon-home"></span> &nbsp; ARK Tourism</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="active"><a class="navbar-brand" style="color: black;"> Hello, <?php echo $username; ?> </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black;"><span class="glyphicon glyphicon-user"></span>&nbsp; My Account</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-header">Manage Profile</li>
                        <li><a href="view_profile.php"><i class="fas fa-user-shield"></i>&nbsp; View Profile</a></li>
                        <li><a href="change_user-password.php"><i class="fas fa-user-edit"></i>&nbsp; Change Password</a></li>
                    </ul>
                    </li>

                    <li> <a href="logout_user.php" style="color: black;"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>


            <div class="container">
                <br><br><br><br>

<center>

  <div class="row">
      <div class="col-md-6">
      <div class="thumbnail">
          <a href="user_dashboard.php">
              <img src="Media/Bengaluru_City.jpg" alt="Bengaluru City" style="width:450px; height:300px;">
          <div class="caption">
              <p><b>Cities</b><br>View Destinations</p>
          </div> </a>
      </div>
    </div>
     <div class="col-md-6">
      <div class="thumbnail">
          <a href="hotels/homepage.php">
              <img src="Media/Mumbai_City.jpg" alt="Mumbai City" style="width:450px; height:300px;">
          <div class="caption">
              <p><b>Hotels</b><br>Book Rooms</p>
          </div></a>
      </div>
    </div>


  </div>
</center>
</div>
</body>
</html>
