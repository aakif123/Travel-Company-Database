<?php

    //creating a session for successfull login
    session_start();

    //database connection
    require 'db_connection.php';

    $city_id = $_GET['city_id'];
    $city_name = $_GET['city_name'];

    $_SESSION['email_id'] = $_SESSION['email_id'];

    $c_query = "SELECT * FROM city WHERE city_id = '$city_id'";
    $c_result = mysqli_query($conn, $c_query);
    $c_row = mysqli_fetch_array($c_result);

    $p_query = "SELECT * FROM destinations WHERE city_id = '$city_id'";
    $p_result = mysqli_query($conn, $p_query);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?php echo $city_name; ?> City &bull; ARK Tourism</title>
    <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style type="text/css">

@import url('https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap');

body {
    font-family: 'Lora', serif;
    color:black;
}
h1, h2, h3, h4, h5, h6 {
    font-family: 'Lora', serif;
}

.a, .b{ border: 2px solid ;
    border-radius: 10px;
        }
span.hotels{
    float: right; }

.container{
    width: 100%;
    padding: 30px;
}
span.hotels{
    float: left; }

</style>
</head>

<body onmousedown="return false" onselectstart="return false">
    <div class="container">
    <div class="row a">
    <div class="col-md-5">
    <div class="w3-content w3-section" style="min-width:525px">
            <?php echo $c_row['city_images']; ?></div>

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
            <center><h3><?php echo $c_row['city_name']; ?></h3><h4><?php echo $c_row['city_state']; ?></h4></center>
    </div>
    <div class="col-md-7">
    <br><p> <?php echo $c_row['city_desc']; ?></p>
    <br>
    <h5><?php echo $c_row['city_gmap']; ?>
    <i class="fas fa-route"></i>&nbsp;&nbsp; Address &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;<?php echo $c_row['city_address']; ?>
    <br><br><i class="fas fa-cloud-sun"></i>&nbsp;&nbsp; Weather &nbsp;&nbsp; : &nbsp;&nbsp;<?php echo $c_row['city_weather']; ?>
    </h5>
    <br><br><span class="hotels"><a href="user_dashboard.php"  class="w3-btn w3-black">View All Cities</a></span><br>
    </div>
</div><br>

<?php while ($p_row = mysqli_fetch_array($p_result)) { ?>
    <div class="row b">
    <?php if ($city_id==3) { ?>
    <div class="col-md-4">
    <video loop muted controls autoplay width="450px" height="300px" style=" margin:15px 0 0 0;">
    <source src="<?php echo $p_row['destination_images']; ?>" type="video/mp4"></video>
    <center><h4><u><?php echo $p_row['destination_name']; ?></u></h4></center>
    </div>
    <?php } else { ?>
    <div class="col-md-4">
    <img class="img-rounded" src="<?php echo $p_row['destination_images']; ?>" style="margin: 15px 0 0 0; width:450px; height:300px;">
    <center><h4><u><?php echo $p_row['destination_name']; ?></u></h4></center>
    </div>
    <?php } ?>
    <div class="col-md-8">
    <br><p><?php echo $p_row['destination_desc']; ?></p>

    <div class="data">
    <h6>
      <i class="fas fa-business-time"></i>&nbsp; Timings Open &nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp; 10:00 AM - 05:30 PM<br>
      <br><i class="fas fa-hourglass-start"></i>&nbsp;&nbsp;&nbsp; Time Required &nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Approx &nbsp; 2 - 3 hours<br>
      <br><i class="fas fa-star-half-alt"></i>&nbsp;&nbsp; Ratings &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $p_row['ratings']; ?> &nbsp; | &nbsp; 5<br>
      <br><i class="fas fa-map-marked-alt"></i>&nbsp;&nbsp; Addresss &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $p_row['destination_address']; ?>
    </h6>
    </div>
        <!-- <?php $status = $p_row['room_status'];
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

             <input type="hidden" name="roomid" value="<?php echo $p_row['room_number'];?>"><br>
            <br><span class="available"><a class="w3-btn w3-green" style="margin-right: 160px;">Available</a></span>
            <button class="w3-btn w3-blue" type="submit">Book Room</button>
        </form><br></div>
            <?php } else { ?>
    <br><span class="available"><a style="margin-left: 15px; margin-top: 120px; margin-bottom: 25px;" class="w3-btn w3-red">Unavailable</a></span>
        <?php } ?>
     //-->
</div></div><br>
        <?php } ?>
</div>
</body>
</html>
