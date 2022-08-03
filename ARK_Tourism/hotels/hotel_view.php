<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Details</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <style>

        body {background-image:url("../Media/Hotels_img/pa.jpg");
              font-style: italic; font-family: sans-serif; font-variant: small-caps; color:#f9f9f9;
        }

        p {font-size: 14px; font-family: 'Handlee', cursive; font-variant: normal; }

        .container{ width: 100%;
            background-color: rgba(0,0,0,0.6);
             border: 3px solid black;
           padding: 30px;
        }
        .data{ float: left;}
        .form{
            width:700px;
            float: right;
        }
        input{
                display:inline-block;
                margin:5px 0px;
                padding:4px 9px;
                border-radius:5px;
                font-size:16px;
                background:transparent;
                color:#fff;
                outline:none;
                 border-color:#fff;

            }

       .a, .b{
            border: 3px solid ;
        }
        span.hotels{
    float: right; }

        span.available{
            margin-left: 10px;
    float: left; }

        .mySlides {display:none;}
        </style>
        </head>
    <body>
        <?php
  session_start();
  $hotelid = $_GET['hotelid'];
  //database connection
  require 'db_connection.php';

  $_SESSION['email_id'] = $_SESSION['email_id'];

  $p_query = "SELECT * FROM hotels WHERE hotelid = '$hotelid'";
  $p_result = mysqli_query($conn, $p_query);
  $p_row = mysqli_fetch_array($p_result);

  $r_query = "SELECT * FROM rooms WHERE hotel_id = '$hotelid'";
  $r_result = mysqli_query($conn, $r_query);



  ?>
        <div class="container">
        <div class="row a">
    <div class="col-md-5">
        <div class="w3-content w3-section" style="max-width:525px">
            <?php echo $p_row['hotel_image']; ?>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}
    x[myIndex-1].style.display = "block";
    setTimeout(carousel, 2000);
}
</script>

    </div>
    <div class="col-md-7">
        <h2><?php echo $p_row['hotel_name']; ?></h2>
    <p> <?php echo $p_row['hotel_desc']; ?></p><br>
    <br>
    <h5>
    <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp; Address &nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $p_row['hotel_address']; ?><br>
    <br><i class="fas fa-star-half-alt"></i>&nbsp;&nbsp; Ratings &nbsp;&nbsp;: &nbsp;&nbsp;<?php echo $p_row['ratings']; ?><br>
    <br><i class="far fa-envelope"></i>&nbsp;&nbsp; Email &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: &nbsp;&nbsp;contact_hotel@booking.com<br>
    <br><i class="fas fa-phone-square-alt"></i>&nbsp;&nbsp; Phone &nbsp;&nbsp;&nbsp;:  &nbsp;&nbsp;+91 9876543210<br>
    </h5>
    <span class="hotels"><a href="homepage.php"  class="w3-btn w3-deep-orange">View All Hotels</a></span><br><br><br>
    </div></div>
            <br>
    <?php while ($r_row = mysqli_fetch_array($r_result)) { ?>
    <div class="row b">
    <div class="col-md-4">
    <img class="img-rounded" src="<?php echo $r_row['room_images']; ?>" style="margin: 10px; width:425px; height:325px;">
    </div>
    <div class="col-md-8">
    <?php echo $r_row['room_desc']; ?>
    <br>
    <div class="data">
    <h4>Amenities :</h4>    <h5>
        <i class="fas fa-wifi"></i>&nbsp;&nbsp;  Complimentary WiFi<br>
        <br><i class="fas fa-user-friends"></i>&nbsp;&nbsp; Up to 3 guests<br>
        <br><i class="fas fa-bed"></i>&nbsp;&nbsp;  King<br>
        <br><i class="fas fa-rupee-sign"></i>&nbsp;&nbsp; <?php echo $r_row['room_cost']; ?> / night<br></h5>
    </div>
        <?php $status = $r_row['room_status'];
        if($status < 1) { ?>


        <div class="form">
            <form  action="payments.php" method='POST'>
            <br>
            <label style="margin-left: 5px; margin-right: 75px;" for="checkin">Check-In Date :</label> <label style=" margin-right: 70px;" for="checkout">Check-Out Date :</label> <label for="guests">No Of Guests :</label><br>
            <input  style="margin-left: 5px; margin-right: 10px;" type="date" id="checkin" name="checkin_date" placeholder="select check-in date" required >
             <input style="margin-left: 5px; margin-right: 10px;" type="date" id="checkout" name="checkout_date" placeholder="select check-out date" required >
             <input list="guests" name="guests" placeholder="Select" required>
         <datalist id="guests">
             <option value="1">
             <option value="2">
             <option value="3">
         </datalist><br>

             <input type="hidden" name="roomid" value="<?php echo $r_row['room_number'];?>"><br>
            <br><span class="available"><a class="w3-btn w3-green" style="margin-right: 160px;">Available</a></span>
            <button class="w3-btn w3-blue" type="submit">Book Room</button>
        </form><br></div>
            <?php } else { ?>
    <br><span class="available"><a style="margin-left: 15px; margin-top: 120px; margin-bottom: 25px;" class="w3-btn w3-red">Unavailable</a></span>
        <?php } ?>

    </div>
    </div><br>
        <?php } ?>
 </body>
</html>
