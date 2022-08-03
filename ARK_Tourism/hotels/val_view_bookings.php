<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cancel Booking</title>
        <link rel="icon" type="image/x-icon" href="../Media/ark_favicon.png">
    </head>
    <body>
        <?php

        //creating a session for successfull login
        session_start();

        //database connection
        require 'db_connection.php';

        $room_number = $_GET['rid'];

        $rs_query = "UPDATE `rooms` SET `room_status`= '0' WHERE `room_number` = '$room_number'";
        $rs_result = mysqli_query($conn, $rs_query) or die(mysqli_error($conn));

         echo "<script>location.href ='view_bookings.php'</script>";
        ?>
    </body>
</html>
