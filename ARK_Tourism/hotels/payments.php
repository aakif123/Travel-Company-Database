<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Payments</title>
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <style>
body {background-image: url('../Media/Hotels_img/pa.jpg');
    font-style: italic; font-family: sans-serif; font-variant: small-caps; color: #f9f9f9; }

     td {font-family: 'Handlee', cursive; font-variant: normal; }

     h3,  p, th { color: #fcba03;}

#content {
        background-color: rgba(0,0,0,0.4);
        max-width: 850px;
        min-height: 550px;
        padding: 25px 20px;
        margin-top: 100px;
        margin-left: 400px;
        margin-bottom: 40px;
    }

    input[type=text], input[type=tel] {
  padding: 6px 16px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  border-radius: 2px;
  background-color: #ffffff;
  color: #191919; font-style: italic; font-family: sans-serif; font-variant: normal;
}

span.cancel{
    float: right;
}

span.continue{
    float: left;
}

</style>

        <title>payments</title>
    </head>
    <body>
        <?php
        session_start();
  $room_number = $_POST['roomid'];
  //database connection
  require 'db_connection.php';

  $_SESSION['email_id'] = $_SESSION['email_id'];
  $date1 = $_POST['checkin_date'];
  $date2 = $_POST['checkout_date'];
  $guests = $_POST['guests'];

function dateDiffInDays($date1, $date2)
{
    if(strtotime($date2) <= strtotime($date1)){
        echo "<script>alert('Check-out date must be after Check-in date');</script>";
        echo "<script>window.history.back();</script>";

    } else {
	// Calculating the difference in timestamps
	$diff = strtotime($date2) - strtotime($date1);

	// 1 day = 24 hours
	// 24 * 60 * 60 = 86400 seconds
    return abs(round($diff / 86400)); }
}
// Function call to find date difference
$dateDiff = dateDiffInDays($date1, $date2);

$r_query = "SELECT * FROM rooms WHERE room_number = '$room_number'";
  $r_result = mysqli_query($conn, $r_query);
  $r_row = mysqli_fetch_array($r_result);
  $cost = $dateDiff * $r_row['room_cost'];
  $hotel_id = $r_row['hotel_id'];

  $_SESSION['room_number'] = $room_number;
  $_SESSION['checkin'] = $date1;
  $_SESSION['checkout'] = $date2;
  $_SESSION['$days'] = $dateDiff;
  $_SESSION['cost'] = $cost;
  $_SESSION['guests'] = $guests;
?>
             <div id="content">
        <form action="val_payments.php" method="post">

            <center><h3>Payment Details</h3></center><br>

            <label for="fname" style="margin-left:10px; font-size: 18px;">Accepted Cards &nbsp; &nbsp;</label>
            <img src="../Media/Hotels_img/cards.png" class="w3-round-small" alt="Norway" style="height:30px;"><br><br>
            <label for="card_name" style="margin-left:10px">Name on Card</label>
            <input style="margin-left:15px" type="text" name="card_name" placeholder="Enter Name" maxlength="30" size="25" required>

            <label for="card_number" style="margin-left:10px">Card number</label>
            <input style="margin-left:20px" type="text" placeholder="1111-2222-3333-4444" name="card_no" maxlength="19" size="22" pattern="[0-9]+-[0-9]+-[0-9]+-[0-9]{4,4}$"
                   title="Must contain 16 digit card number in 1111-2222-3333-4444 format only." required><br><br>

            <label for="expiry_date" style="margin-left:15px">Expiry Date</label>
            <input style="margin-left:75px" type="text" name="expiry_date" placeholder="MM/YY" maxlength="5" size="6" pattern="[0-9]+/[0-9]{2,2}$"
             title="Must contain expiry date in MM/YY format only." required>

            <label for="cvv" style="margin-left:75px">CVV</label>
            <input style="margin-left:10px" type="text" name="cvv" placeholder="123" maxlength="3" size="5" pattern="[0-9]{3,3}"
                   title="Must contain 3 digit cvv number only." required><br><br>

            <label for="days" style="margin-left:15px">Total Days Selected</label>
            <input style="margin-left:10px" type="text" name="days"  value="<?php echo "$dateDiff"; ?>" size="5" disabled>

            <label for="total_cost" style="margin-left:15px">Total Cost</label>
            <input style="margin-left:10px" type="text" name="total_cost" value="<?php echo "$cost"; ?>" size="10" disabled>

            <label for="guests" style="margin-left:15px">No Of Guests</label>
            <input style="margin-left:10px" type="text" name="guests" value="<?php echo "$guests"; ?>" size="5" disabled><br><br>

            <hr/>

            <center><button class="w3-btn w3-black" type="submit">Confirm Booking</button></center>
      </form>
            <br>
            <div>
                <span class="cancel"><a href="homepage.php" class="w3-btn w3-blue">Cancel Booking</a></span>
                <span class="continue"><a href='hotel_view.php?hotelid=<?php echo "$hotel_id";?>' class="w3-btn w3-deep-orange">Change Dates</a></span>
            </div>
            <br>
    </div>

    </body>
</html>
