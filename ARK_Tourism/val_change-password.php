<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password &bull; Response</title>
  </head>
  <body onmousedown="return false" onselectstart="return false">
    <?php

    //creating a session for successfull login
    session_start();

    //database connection
    require 'db_connection.php';

    //getting data from signup form
        $email_id = $_SESSION['email_id'];
        $password = $_POST['s_password'];

    $e_query = "SELECT * FROM users WHERE email_id = '$email_id'";
    $e_result = mysqli_query($conn, $e_query);

    $password_query = "UPDATE users SET `password` = '$password' WHERE email_id = '$email_id'";
    $password_reult = mysqli_query($conn, $password_query) or die(mysqli_error($conn));

        echo "<script>alert('Password changed Successfully!');</script>";
        echo "<script>location.href ='Signup_Login.php'</script>";
    ?>
  </body>
</html>
