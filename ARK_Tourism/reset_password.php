<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>User &bull; 🔑 Reset</title>
    <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">
    <style>

    @import url('https://fonts.googleapis.com/css2?family=Lora:ital,wght@1,500&display=swap');

     body{
      margin:0;
      color:#6a6f8c;
      font-family: 'Lora', serif;
      background: url(Media/Sign-Log_img.png);
      background-position: 600px;
      background-repeat: no-repeat;
      background-size: 925px;
    }
    *,:after,:before{box-sizing:border-box}
    .clearfix:after,.clearfix:before{content:'';display:table}
    .clearfix:after{clear:both;display:block}
    a{color: black;text-decoration:none}

    .login-wrap{
      width:100%;
      margin: 40px 0px 0px 100px;
      max-width:525px;
      min-height:650px;
      position:relative;
      box-shadow:0 12px 15px 0 rgba(0,0,0,.24),0 17px 50px 0 rgba(0,0,0,.19);
      border-radius: 5%;
    }
    .login-html{
      width:100%;
      height:100%;
      position:absolute;
      padding:50px 70px 50px 70px;
      background:rgba(255,255,255,0.0);
    }
    .login-html .sign-up-htm{
      top:0;
      left:0;
      right:0;
      bottom:0;
      position:absolute;
      transform:rotateY(180deg);
      backface-visibility:hidden;
      transition:all .4s linear;
    }
    .login-html .sign-up,
    .login-form .group .check{
      display:none;
    }
    .login-html .tab,
    .login-form .group .label,
    .login-form .group .button{
      text-transform:uppercase;
      font-family: 'Lora', serif;
    }
    .login-html .tab{
      font-size:22px;
      margin-right:15px;
      padding-bottom:5px;
      margin:0 15px 10px 0;
      display:inline-block;
      border-bottom:2px solid transparent;
    }
    .login-html .sign-up:checked + .tab{
      color:black;
      border-color:#333333;
    }
    .login-form{
      min-height:345px;
      position:relative;
      perspective:1000px;
      transform-style:preserve-3d;
    }
    .login-form .group{
      margin-bottom:15px;
    }
    .login-form .group .label,
    .login-form .group .input,
    .login-form .group .button{
      width:100%;
      color:#fff;
      display:block;
    }
    .login-form .group .input,
    .login-form .group .button{
      border:none;
      outline: none;
      padding:15px 20px;
      border-radius:25px;
      background: #ecf0f3;
      box-shadow: 13px 13px 20px #cbced1,              -13px -13px 20px #ffffff;
    }
    .login-form .group .label{
      color:black;
      font-size:13px;
    }
    .login-form .group .button{
      background:black;
    }
    .login-html .sign-up:checked + .tab + .login-form .sign-up-htm{
      transform:rotate(0);
    }
    .login-form .group .pass-text{
      color: black;
    }
    .hr{
      height:2px;
      margin:30px 0 20px 0;
      background:rgba(0,0,0,.2);
    }
    .foot-lnk{
      text-align:center;
      color: black;
    }
    .home{
      text-align: center;
    }
    .login-form .group input[placeholder]{
      color: rgba(0, 0, 0, 1.0);
      font-style: italic; font-family: 'Lora', serif;
    }
    ::placeholder {
      color: rgba(0, 0, 0, 1.0);
      font-style: italic; font-family: 'Lora', serif;
    }

    </style>
    </head>

    <body>
        <?php

        //creating a session for successfull login
        session_start();

        ?>
        <div class="login-wrap">
      <div class="login-html">
        <input id="tab-2" type="radio" name="tab" class="sign-up" checked><label for="tab-2" class="tab">Reset Password</label>
        <div class="login-form">

          <div class="sign-up-htm">
            <form action="val_reset-password.php" name="form2" onsubmit="return validateSignup()" method="post">
              <br>
            <div class="group">
              <center>
                <label class="pass-text"> Enter the name & email associated with your account to reset your login password.</label>
              </center>
            </div>
            <div class="group">
              <label for="o_user" class="label">Username</label>
              <input id="o_user" type="text" class="input" placeholder="Enter Your Full Name" name="o_username" required>
            </div>
            <div class="group">
              <label for="o_email_id" class="label">Email Id</label>
              <input id="o_email_id" type="email" class="input" placeholder="Enter Email Address" name="o_email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            </div>
            <br>
            <div class="group">
              <input type="submit" class="button" value="Submit">
            </div>
          </form>
          <div class="foot-lnk">
              <a href="Signup_Login.php">Remember Password?</a>
            </div>
            <div class="hr"></div>
            <div class="home">
              <span class="home"><a href="Home.php">Back Home</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    </body>
</html>
