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
                <a href="user_dashboard.php" class="navbar-brand" style="color: black;"><span class="glyphicon glyphicon-home"></span> &nbsp; ARK Tourism</a>
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
                <br><br><h2><b>Famous Cities in India</b></h2>

  <div class="row">
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=1&city_name=Bengaluru">
              <img src="Media/Bengaluru_City.jpg" alt="Bengaluru City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Bengaluru</b><br>City in Karnataka</p>
          </div> </a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=2&city_name=Mumbai">
              <img src="Media/Mumbai_City.jpg" alt="Mumbai City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Mumbai</b><br>City in Maharashtra</p>
          </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=3&city_name=Kashmir">
              <img src="Media/Kashmir_City.jpg" alt="Kashmir City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Kashmir</b><br>City in Jammu & Kashmir</p>
          </div></a>
      </div>
    </div>
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=4&city_name=Hyderabad">
              <img src="Media/Hyderabad_City.jpg" alt="Hyderabad City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Hyderabad</b><br>City in Telangana</p>
          </div></a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=5&city_name=Kolkata">
              <img src="Media/Kolkata_City.jpg" alt="Kolkata City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Kolkata</b><br>City in West Bengal</p>
          </div></a>
      </div>
    </div>
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=6&city_name=Agra">
              <img src="Media/Agra_City.jpg" alt="Agra City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Agra</b><br>City in Uttar Pradesh</p>
          </div></a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=7&city_name=Chennai">
              <img src="Media/Chennai_City.jpg" alt="Chennai City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Chennai</b><br>City in Tamil Nadu</p>
          </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=8&city_name=Jaipur">
              <img src="Media/Jaipur_City.jpg" alt="Jaipur City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Jaipur</b><br>City in Rajasthan</p>
          </div></a>
      </div>
    </div>
    <div class="col-md-4">
      <div class="thumbnail">
          <a href="city_view.php?city_id=9&city_name=Delhi">
              <img src="Media/Delhi_City.jpg" alt="Delhi City" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>New Delhi</b><br>Capital of India</p>
          </div></a>
      </div>
    </div>

  </div>
</div>
</body>
</html>
