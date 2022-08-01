<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin Access &bull; ARK Tourism</title>
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
    #container{
      max-width: 1350px;
    }
    </style>
  </head>
  <body onmousedown="return false" onselectstart="return false">
    <?php

        //creating a session for successfull login
        session_start();

        //database connection
        require 'db_connection.php';
        //getting admin name
        $adminname =  $_SESSION['admin_name'];

        //getting users data
        $u_query = "SELECT * FROM users";
        $u_result = mysqli_query($conn, $u_query);

        //getting cities data
        $c_query = "SELECT * FROM city";
        $c_result = mysqli_query($conn, $c_query);

        //getting destinations data
        $d_query = "SELECT * FROM destinations";
        $d_result = mysqli_query($conn, $d_query);

//---------------------------------------------------------------

        //getting hotel data
        $h_query = "SELECT * FROM hotels";
        $h_result = mysqli_query($conn, $h_query);

        //getting rooms data
        $r_query = "SELECT * FROM hotels,rooms where hotels.hotelid=rooms.hotel_id ";
        $r_result = mysqli_query($conn, $r_query);

        //getting card_details data
        $cd_query = "SELECT * FROM card_details ";
        $cd_result = mysqli_query($conn, $cd_query);

        //getting booking_details data
        $bch_query = "SELECT * FROM booking_details,users,hotels WHERE booking_details.user_id=users.user_id and booking_details.hotel_id=hotels.hotelid";
        $bch_result= mysqli_query($conn, $bch_query);

    ?>
    <nav class="navbar navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="user_dashboard.php" class="navbar-brand" style="color: black;"><span class="glyphicon glyphicon-home"></span> &nbsp; ARK Tourism &nbsp;&nbsp;&nbsp;</a>
                </div>
                <div>
                    <ul class="nav navbar-nav">
                        <li class="active"><a class="navbar-brand" style="color: black;"> Admin,&nbsp; <?php echo $adminname; ?> </a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">

                        <li> <a href="logout_admin.php" style="color: black;"><span class="glyphicon glyphicon-log-out"></span> &nbsp; Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>


        <center>
        <div id="container">
          <br><br><br>
            <div class="row">
                <div><h3> ARK Tourism - Users </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>User Id</th>
                    <th>User Name</th>
                    <th>Email Id</th>
                    <th>Registration Time</th>
                    <th>Login Password</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($u_row = mysqli_fetch_array($u_result)) { ?>
                <tr>
                    <td><?php echo $u_row['user_id']; ?></td>
                    <td><?php echo $u_row['user_name']; ?></td>
                    <td><?php echo $u_row['email_id']; ?></td>
                    <td><?php echo $u_row['registration_time']; ?></td>
                    <td><?php echo $u_row['password']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Cities </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>City Id</th>
                    <th>City Name</th>
                    <th>State Name</th>
                    <th>City Discription</th>
                    <th>City Address</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($c_row = mysqli_fetch_array($c_result)) { ?>
                <tr>
                    <td><?php echo $c_row['city_id']; ?></td>
                    <td><?php echo $c_row['city_name']; ?></td>
                    <td><?php echo $c_row['city_state']; ?></td>
                    <td><?php echo $c_row['city_desc']; ?></td>
                    <td><?php echo $c_row['city_address']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Destinations </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>Dest. Id</th>
                    <th>City Id</th>
                    <th>Destination Name</th>
                    <th>Destination Description</th>
                    <th>Destination Address</th>
                    <th>Ratings</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($d_row = mysqli_fetch_array($d_result)) { ?>
                <tr>
                    <td><?php echo $d_row['destination_id']; ?></td>
                    <td><?php echo $d_row['city_id']; ?></td>
                    <td><b><?php echo $d_row['destination_name']; ?></b></td>
                    <td><?php echo $d_row['destination_desc']; ?></td>
                    <td><?php echo $d_row['destination_address']; ?></td>
                    <td><?php echo $d_row['ratings']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Hotels </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>Hotel Id</th>
                    <th>Hotel Name</th>
                    <th>Hotel Description</th>
                    <th>Hotel Address</th>
                    <th>Ratings</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($h_row = mysqli_fetch_array($h_result)) { ?>
                <tr>
                    <td><?php echo $h_row['hotelid']; ?></td>
                    <td><b><?php echo $h_row['hotel_name']; ?></b></td>
                    <td><?php echo $h_row['hotel_desc']; ?></td>
                    <td><?php echo $h_row['hotel_address']; ?></td>
                    <td><?php echo $h_row['ratings']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Rooms </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>Hotel Name</th>
                    <th>Room No.</th>
                    <th>Room Description</th>
                    <th>Room Cost</th>
                    <th>Room Status</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($r_row = mysqli_fetch_array($r_result)) { ?>
                <tr>
                    <td><?php echo $r_row['hotel_name']; ?></td>
                    <td><b><?php echo $r_row['room_number']; ?></b></td>
                    <td><?php echo $r_row['room_desc']; ?></td>
                    <td><?php echo $r_row['room_cost']; ?></td>
                    <td><?php echo $r_row['room_status']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Users Card Details </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>User Email</th>
                    <th>User Name</th>
                    <th>Card Number</th>
                    <th>CVV</th>
                    <th>Expiry Date</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cd_row = mysqli_fetch_array($cd_result)) { ?>
                <tr>
                    <td><?php echo $cd_row['email_id']; ?></td>
                    <td><b><?php echo $cd_row['cardholder_name']; ?></b></td>
                    <td><?php echo $cd_row['card_number']; ?></td>
                    <td><?php echo $cd_row['cvv']; ?></td>
                    <td><?php echo $cd_row['expiry_date']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

            <div class="row">
                <div><h3> ARK Tourism - Users Booking Details </h3></div>
            </div>
            <table class="table table-condensed table-bordered table-hover">
            <thead style="background-color: #cfcfcf;">
                <tr>
                    <th>User Name</th>
                    <th>Hotel Name</th>
                    <th>Room Number</th>
                    <th>Checkin-Date</th>
                    <th>Checkout-Date</th>
                    <th>Date-of-Booking</th>
                    <th>Total Days</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($cd_row = mysqli_fetch_array($cd_result)) { ?>
                <tr>
                    <td><b><?php echo $cd_row['email_id']; ?></td>
                    <td><?php echo $cd_row['cardholder_name']; ?></b></td>
                    <td><?php echo $cd_row['card_number']; ?></td>
                    <td><?php echo $cd_row['cvv']; ?></td>
                    <td><?php echo $cd_row['expiry_date']; ?></td>

                    <td><?php echo $u_row['customer_name']; ?></td>
                    <td><?php echo $u_row['hotel_name']; ?></td>
                    <td><?php echo $u_row['room_number']; ?></td>
                    <td><?php echo $u_row['checkin_date']; ?></td>
                    <td><?php echo $u_row['checkout_date']; ?></td>
                    <td><?php echo $u_row['date_of_booking']; ?></td>
                    <td><?php echo $u_row['total_days']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
            </table>

        </div>
    </center>
  </body>
</html>
