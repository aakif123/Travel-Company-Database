<!DOCTYPE html>
<html>
    <head>
        <title>Sign up &bull; Response</title>
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

    //getting data from signup form
        $user_name = $_POST['s_username'];
        $email_id = $_POST['s_email_id'];
        $password = $_POST['s_password'];

    $e_query = "SELECT * FROM users WHERE email_id = '$email_id'";
    $e_result = mysqli_query($conn, $e_query);
    if(mysqli_num_rows($e_result)>0)
        {
        echo "<script>alert('This Email-id already associated with another account!');</script>";
        echo "<script>window.history.back();</script>";
        }
    else {
    $users_signup_query = "insert into users (user_name, email_id, password) values ('$user_name', '$email_id', '$password' )";
    $users_signup_submit = mysqli_query($conn, $users_signup_query) or die(mysqli_error($conn));

        echo "<script>alert('You have successfully Loged-In to  `ARK Tourism`');</script>";
        echo "<script>alert('Log-In into your account using same credentials.');</script>";
        echo "<script>window.location.href ='Signup_Login.php'</script>";
        }
?>
        </form>
    </body>
</html>
