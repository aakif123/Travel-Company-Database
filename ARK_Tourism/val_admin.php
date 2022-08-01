<!DOCTYPE html>
<html>
    <head>
        <title>Admin Login &bull; Response</title>
        <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">
<style>
 @import url('https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap');
 body {
    background: url(Media/Sign-Log_img.jpg);
    font-family: 'Lora', serif;
 }

</style>
    </head>
<body onmousedown="return false" onselectstart="return false">
    <?php

    //creating a session for successfull login
    session_start();

    //database connection
    require 'db_connection.php';

    //getting data from login form
        $admin_email_id = $_POST['a_email_id'];
        $admin_password = $_POST['a_password'];

        $a_query = "SELECT * FROM admin WHERE admin_email_id = '$admin_email_id' && admin_password = '$admin_password'";
        $a_result = mysqli_query($conn, $a_query);
        if(mysqli_num_rows($a_result)>0)
          {
            $ad_query = "SELECT admin_name FROM admin WHERE admin_email_id = '$admin_email_id'";
            $ad_result = mysqli_query($conn, $ad_query);
            $ad_row = mysqli_fetch_array($ad_result);
            $_SESSION['admin_name'] = $ad_row['admin_name'];
            echo "<script>alert('Admin login to   `ARK Tourism`  Successful!');</script>";
            echo "<script>location.href ='admin_dashboard.php'</script>";
          }
        else {
            echo "<script>alert('Email-Id or Password is incorrect!');</script>";
            echo "<script>window.history.back();</script>";
          }
?>
    </body>
</html>
