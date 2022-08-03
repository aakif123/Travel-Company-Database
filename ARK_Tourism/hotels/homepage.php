  <!DOCTYPE html>
<html>
    <head>
        <title>User - Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>

        <style>

        @import url('https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap');

        body {
          font-family: 'Lora', serif;
        }
        .navbar{
                background-color: #E7E7E7;
            }


        </style>
    </head>
    <body>
        <?php

        //creating a session for successfull login
        session_start();

        //database connection
        require 'db_connection.php';

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

                          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black;"><span class="glyphicon glyphicon-home"></span>&nbsp; My Bookings</a>
                          <ul class="dropdown-menu">
                              <li><a href="view_bookings.php"><span class="glyphicon glyphicon-book"></span>&nbsp; View / Cancel Bookings</a></li>

                          </ul>
                          </li>

                            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: black;"><span class="glyphicon glyphicon-user"></span>&nbsp; My Account</a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">Manage Profile</li>
                                <li><a href="view_profile.php"><i class="fas fa-user-shield"></i>&nbsp; View Profile</a></li>
                                <li><a href="change_user-password.php"><i class="fas fa-user-edit"></i>&nbsp; Change Password</a></li>
                            </ul>
                            </li>

                            <li> <a href="../logout_user.php" style="color: black;"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

        <br><br><br>

            <div class="container">
                <h2><b>Famous Hotels around Cities</b></h2>

  <div class="row">
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=1">
              <img src="../Media/Hotels_img/oberoi/R.jpg" alt="The Oberoi" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>The Oberoi.</b><br>New Delhi</p>
          </div> </a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=2">
              <img src="../Media/Hotels_img/taj hotel/5.jpg" alt="The Taj Mahal Palace" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>The Taj Mahal Palace.</b><br>Mumbai</p>
          </div></a>
      </div>
    </div>
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=3">
              <img src="../Media/Hotels_img/taj faluknama/1.jpg" alt="Taj Falaknuma Palace" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>Taj Falaknuma Palace.</b><br>Hydrabad</p>
          </div></a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=4">
              <img src="../Media/Hotels_img/the oberoi amarvalis/4.jpg" alt="THE OBEROI amarvalis" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>The Oberoi Amarvilas.</b><br>Agra</p>
          </div></a>
      </div>
    </div>
      <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=5">
              <img src="../Media/Hotels_img/the park/3.jpg" alt="The park" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>The Park.</b><br>Chennai</p>
          </div></a>
      </div>
    </div>
     <div class="col-md-4">
      <div class="thumbnail">
          <a href="hotel_view.php?hotelid=6">
              <img src="../Media/Hotels_img/leela palace/3.jpg" alt="The Leela Palace" style="width:465px; height:200px;">
          <div class="caption">
              <p><b>The Leela Palace.</b><br>Bangalore</p>
          </div></a>
        </div>

          </div>

         <div class="col-md-4">
          <div class="thumbnail">
              <a href="hotel_view.php?hotelid=7">
                  <img src="../Media/Hotels_img/kolkata/1.jpg" alt="The westin kolkata rajarhat" style="width:465px; height:200px;">
              <div class="caption">
                  <p><b>The Westin Kolkata Rajarhat.</b><br>Kolkata</p>
              </div></a>

        </div>
      </div>
         <div class="col-md-4">
          <div class="thumbnail">
              <a href="hotel_view.php?hotelid=8">
                  <img src="../Media/Hotels_img/jAMMU/3.jpg" alt="radission blue" style="width:465px; height:200px;">
              <div class="caption">
                  <p><b>Radission Blue Jammu.</b><br>Jammu and kashmir</p>
              </div></a>
            </div>

        </div>
         <div class="col-md-4">
          <div class="thumbnail">
              <a href="hotel_view.php?hotelid=8">
                  <img src="../Media/Hotels_img/trident/1.jpg" alt="THE trident" style="width:465px; height:200px;">
              <div class="caption">
                  <p><b>Trident Jaipur.</b><br>Jaipur</p>
              </div></a>
          </div>
      </div>
    </div>

  </div>
</div>

    </body>
</html>
