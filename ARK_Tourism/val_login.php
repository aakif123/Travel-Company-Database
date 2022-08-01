<!DOCTYPE html>
<html>
    <head>
        <title>Login &bull; Response</title>
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
        $email_id = $_POST['l_email_id'];
        $password = $_POST['l_password'];

    $e_query = "SELECT * FROM users WHERE email_id = '$email_id'";
    $e_result = mysqli_query($conn, $e_query);
    if(mysqli_num_rows($e_result) === 0)
      {
        echo "<script>alert('User with email  `$email_id`  dosn`t exists!');</script>";
        echo "<script>alert('Sign-Up to  `ARK Tourism`');</script>";
        echo "<script>location.href ='Signup_Login.php'</script>";
      }
    elseif(mysqli_num_rows($e_result)>0)
      {
          $ep_query = "SELECT * FROM users WHERE email_id = '$email_id' && password = '$password'";
          $ep_result = mysqli_query($conn, $ep_query);
          if(mysqli_num_rows($ep_result)>0)
          {
                $se_query = "SELECT user_name FROM users WHERE email_id = '$email_id'";
                $se_result = mysqli_query($conn, $se_query);
                $se_row = mysqli_fetch_array($se_result);
                $user_name = $se_row['user_name'];
                $_SESSION['user_name'] = $user_name;
                $_SESSION['email_id'] = $email_id;

              echo "<script>alert('Welcome `$user_name`, Login to  `ARK Tourism`  Successful!');</script>";
              echo "<script>location.href ='veryfirstpage.php'</script>";
          }
          else {
              echo "<script>alert('Email id or Password is incorrect!');</script>";
              echo "<script>window.history.back();</script>";
          }
      }
?>
        </form>
    </body>
</html>
