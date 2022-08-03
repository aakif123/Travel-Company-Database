<!DOCTYPE html>
<html>
    <head>
        <title>Booking Details</title>
        <meta charset="UTF-8">
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <style>
        body {background-image: url('../Media/Hotels_img/pa.jpg');
    font-style: italic; font-family: sans-serif; font-variant: small-caps; color: #f9f9f9; }

     td {font-family: 'Handlee', cursive; font-variant: normal; }

     h3,  p, th { color: #fcba03;}

.content{
            background-color: rgba(0,0,0,0.4);
            padding: 25px 20px;
            max-width: 1400px;
            margin-top: 50px;

        }

span.hotels{
    float: left;
}

#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 2s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 }
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom {
  from{ bottom:-100px; opacity:0 }
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>

    </head>
    <body>
        <?php

        //creating a session for successfull login
        session_start();

        //database connection
        require 'db_connection.php';

        $email_id = $_SESSION['email_id'];
        $_SESSION['email_id'] = $email_id;

        $se_query = "SELECT * FROM users WHERE email_id = '$email_id'";
        $se_result = mysqli_query($conn, $se_query) or die(mysqli_error($conn));
        $se_row = mysqli_fetch_array($se_result);
        $user_id = $se_row['user_id'];

        ?>
        <center>
    <div class="content">
        <span class="hotels"><a href="homepage.php"  class="w3-btn w3-deep-orange">Back Dashboard</a></span><br><br>
        <h3>Room Booking Details</h3><br>
             <?php
             $c_query = "SELECT * FROM `booking_details` WHERE `user_id`= '$user_id'";
             $c_result = mysqli_query($conn, $c_query);
             if(mysqli_num_rows($c_result)<1){ ?>
        <div class="alert alert-warning" style="font-size:18px; max-width: 500px;">
                     <strong> No Bookings Yet!  </strong><br> Book Rooms <a href="homepage.php" class="alert-link"> Here</a>.
        </div>

            <?php } else {?>
         <body onload="myFunction()" style="margin:0;">
                 <div id="loader"></div>
             <div style="display:none;" id="myDiv" class="animate-bottom">
             <table class="table table-bordered">
          <thead>
              <tr>
            <td><center>Room Details</center></td>
            <td><center>Hotel Name</center></td>
            <td><center>Check-in Date</center></td>
            <td><center>Check-out Date</center></td>
            <td><center>Total Stay-in Days</center></td>
            <td><center>No Of Guests</center></td>
            <td><center>Amount Paid</center></td>
             <td><center>Booking Status</center></td>
            </tr>
              </thead>
           <tbody>

           <?php $b_query = "SELECT * FROM booking_details WHERE user_id = '$user_id' ";
                $b_result = mysqli_query($conn, $b_query) or die(mysqli_error($conn));
                while ($b_row = mysqli_fetch_array($b_result)) {
                    $room_number = $b_row['room_number'];
                $r_query = "SELECT `room_images`, `room_status` FROM `rooms` WHERE `room_number` = '$room_number'";
                $r_result = mysqli_query($conn, $r_query) or die(mysqli_error($conn));
                while ($r_row = mysqli_fetch_array($r_result)) { ?>
                <tr><td><center><img class="img-rounded" src="<?php echo $r_row['room_images']; ?>" style="margin: 5px; width:225px; height:125px;"><br></center></td>


               <?php $hotelid = $b_row['hotel_id'];
                $h_query = "SELECT `hotel_name` FROM `hotels` WHERE `hotelid` = $hotelid";
                $h_result = mysqli_query($conn, $h_query) or die(mysqli_error($conn));
                while ($h_row = mysqli_fetch_array($h_result)) { ?>
               <td><center><br><br><br><?php echo $h_row['hotel_name']; ?></center></td>
               <?php } ?>

               <td><center><br><br><br><?php echo $b_row['checkin_date']; ?></center></td>
               <td><center><br><br><br><?php echo $b_row['checkout_date']; ?></center></td>
               <td><center><br><br><br><?php echo $b_row['total_days']; ?></center></td>
               <td><center><br><br><br><?php echo $b_row['number_of_guests']; ?></center></td>

               <?php $booking_id = $b_row['booking_id'];
               $p_query = "SELECT `amount_paid` FROM `payment_details` WHERE `booking_id` = $booking_id";
                       $p_result = mysqli_query($conn, $p_query) or die(mysqli_error($conn));
                       while ($p_row = mysqli_fetch_array($p_result)) { ?>
                       <td><center><br><br><br><?php echo $p_row['amount_paid']; ?></center></td> <?php }?>

             <?php $status = $r_row['room_status'];
        if($status < 1) { ?>
             <td><br><br><br><center><input type="button" class="w3-btn w3-red" value="Room Cancelled"></center></td>
        <?php } else { ?>
             <td><br><center>
                 <input type="button" class="w3-btn w3-green" value="Room Booked"><br><br><br>
                 <a href="val_view_bookings.php?rid=<?php echo $room_number;?>" class="w3-btn w3-black">Cancel Booking</a>
             </center></td> <?php } ?>
             </tr>
                   <?php } ?>
                   <?php }?>

           </tbody>
             </table><br>

             </div>
<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 2000);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>
    <?php }?>
    </div></center>
    </body>
</html>
