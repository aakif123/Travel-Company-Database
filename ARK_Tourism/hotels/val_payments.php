
        <?php
        require'db_connection.php';
        session_start();
        $room_number = $_SESSION['room_number'];
        $email_id = $_SESSION['email_id'];
        $cardholder = $_POST['card_name'];
        $cardnumber = mysqli_real_escape_string($conn, $_POST['card_no']);
        $expirydate = mysqli_real_escape_string($conn, $_POST['expiry_date']);
        $CVV = $_POST['cvv'];
        $total_days =  $_SESSION['$days'];
        $amount_paid =  $_SESSION['cost'];
        $checkin_date = $_SESSION['checkin'];
        $checkout_date = $_SESSION['checkout'];
        $guests = $_SESSION['guests'];

        $se_query = "SELECT * FROM users WHERE email_id = '$email_id'";
        $se_result = mysqli_query($conn, $se_query) or die(mysqli_error($conn));
        $se_row = mysqli_fetch_array($se_result);
        $user_id = $se_row['user_id'];

        $r_query = "SELECT * FROM rooms WHERE room_number = '$room_number'";
        $r_result = mysqli_query($conn, $r_query);
        $r_row = mysqli_fetch_array($r_result);
        $hotelid = $r_row['hotel_id'];

        $roomstatus_query = "UPDATE `rooms` SET `room_status`= '1' WHERE `room_number` = '$room_number' ";
        $roomstatus_result = mysqli_query($conn, $roomstatus_query) or die(mysqli_error($conn));

        $card_query="INSERT INTO card_details(email_id, cardholder_name, card_number, cvv, expiry_date) VALUES ('$email_id','$cardholder','$cardnumber','$CVV','$expirydate')";
        $card_result=mysqli_query($conn,$card_query) or die(mysqli_error($conn));

        $booking_query = "INSERT INTO `booking_details`( `checkin_date`, `checkout_date`, `total_days`, `hotel_id`, `room_number`, `number_of_guests`, `user_id`) VALUES ('$checkin_date', '$checkout_date', '$total_days', '$hotelid', '$room_number', '$guests', '$user_id' )";
        $booking_result=mysqli_query($conn,$booking_query) or die(mysqli_error($conn));

        if ($booking_result) {
        $booking_id = mysqli_insert_id($conn);
}
        $payment_query = "INSERT INTO payment_details(user_id, amount_paid, booking_id) VALUES ('$user_id', '$amount_paid', '$booking_id')";
        $payment_result = mysqli_query($conn,$payment_query) or die(mysqli_error($conn));

        ?>

        <!DOCTYPE html>
<html>
    <head>
        <title>Payment &bull; Response</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    </head>

    <style>

        body {background: url('../Media/Hotels_img/pa.jpg');
              font-style: italic; font-family: sans-serif; font-variant: small-caps; color: #f9f9f9;
        }

        #content{
            background-color: rgba(0,0,0,0.4);
            max-width: 600px;
            padding: 25px 20px;
            margin-top: 50px;
        }

        .container {
    max-width: 500px;
  padding: 12px; }

/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 160px;
  height: 160px;
  margin: -76px 0 0 -76px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  -webkit-animation: spin 1s linear infinite;
  animation: spin 1s linear infinite;
}
#loade {
  position: absolute;
  left: 35%;
  top: 65%;
  font-size: 16px; background-color: rgba(0,0,0,0.4);
  font-style:normal; font-family: 'Handlee', cursive; font-variant: normal;
  }

@-webkit-keyframes spin {
  10% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  10% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
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

#content{
            background-color: rgba(0,0,0,0.4);
            max-width: 600px;
            padding: 25px 20px;
            margin-top: 50px;
        }

        .container {
    max-width: 500px;
  padding: 12px;
}
</style>
</head>
<body onload="myFunction()" style="margin:0;">

<div id="loader"></div>
<div id="loade">&nbsp; Payment processing... &nbsp;Please don't go back or refresh the page. &nbsp;</div>

<div style="display:none;" id="myDiv" class="animate-bottom">
 <center> <div id="content">
            <h2 style="font-size:26px;">Room Booked Successfully.</h2>
            <h4 style="font-size:18px;">Payment Successful.</h4>
        <div class="alert alert-success">
            Your room has been booked successfully.<br><strong>Thank You</strong> visit again.
        </div><br><br>
        <div class="container">
            <span><a href="homepage.php" class="w3-btn w3-deep-orange">Back To Homepage</a></span>
    </div>
        </div></center>
</div>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(showPage, 3500);
}

function showPage() {
  document.getElementById("loader").style.display = "none";
  document.getElementById("loade").style.display = "none";
  document.getElementById("myDiv").style.display = "block";
}
</script>

    </body>
</html>
    </body>
</html>
