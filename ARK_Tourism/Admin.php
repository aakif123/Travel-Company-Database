<!DOCTYPE html>
<html>
  <head>
    <title>Admin &bull; Login</title>
    <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">
    <meta charset="UTF-8" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet">
    <style type="text/css">
        * {
  box-sizing: border-box;
}
body {
  margin:0;
  height: 100vh;
  width: 100vw;
  overflow: hidden;
  font-family: 'Lato', sans-serif;
  font-weight: 700;
  display: flex;
  color:#555;
  background: #ecf0f3;
  background-image: url(Media/Admin-Log_img.png);
  background-position: -70px;
  background-repeat: no-repeat;
  background-size: 925px;
}
.login-div {
  width:430px;
  height: 650px;
  margin: 50px 0 0 800px;
  padding: 50px 35px 35px 35px;
  border-radius: 40px;
  background: #ecf0f3;
  box-shadow: 13px 13px 20px #cbced1,              -13px -13px 20px #ffffff;
  -webkit-border-radius: 40px;
  -moz-border-radius: 40px;
  -ms-border-radius: 40px;
  -o-border-radius: 40px;
}

.title {
  text-align: center;
  font-size: 28px;
  padding-top: 24px;
  letter-spacing: 1px;
}
.fields {
  width: 100%;
  padding: 50px 5px 5px 5px;
}
.fields input {
  border: none;
  outline:none;
  background: none;
  font-size: 18px;
  color: #555;
  padding:20px 10px 20px 5px;
}
.username, .password {
  margin-bottom: 30px;
  border-radius: 25px;
  box-shadow: inset 8px 8px 8px #cbced1,
              inset -8px -8px 8px #ffffff;
}
.fields svg {
  height: 22px;
  margin:0 10px -3px 25px;
}
.signin-button {
  outline: none;
  border:none;
  cursor: pointer;
  width:100%;
  height: 60px;
  border-radius: 30px;
  font-size: 20px;
  font-weight: 700;
  font-family: 'Lato', sans-serif;
  color:#fff;
  text-align: center;
  background: #24cfaa;
  box-shadow: 3px 3px 8px #b1b1b1,
              -3px -3px 8px #ffffff;
  transition: 0.5s;
}
.signin-button:hover {
  background:#2fdbb6;
}
.signin-button:active {
  background:#1da88a;
}
.link {
  padding-top: 20px;
  text-align: center;
}
.link a {
  text-decoration: none;
  color:#aaa;
  font-size: 15px;
}
    </style>
  </head>
  <body>
    <?php

    //creating a session for successfull login
    session_start();

    ?>
    <div class="login-div">
      <div class="logo">
      <center>
        <img src="Media/ark_logo.png" style="width:125px; height:125px; border-radius: 25%; box-shadow:   /* logo shadow */  0px 0px 2px #5f5f5f,  /* offset */  0px 0px 0px 5px #ecf0f3,  /*bottom right */  8px 8px 15px #a7aaaf,  /* top left */  -8px -8px 15px #ffffff  ;">
      </center>
    </div>
      <div class="title"><br>Admin Access</div>
      <form action="val_admin.php" name="form" onsubmit="return validateForm()" method="post">
      <div class="fields">
        <div class="username"><svg fill="#999" viewBox="0 0 1024 1024"><path class="path1" d="M896 307.2h-819.2c-42.347 0-76.8 34.453-76.8 76.8v460.8c0 42.349 34.453 76.8 76.8 76.8h819.2c42.349 0 76.8-34.451 76.8-76.8v-460.8c0-42.347-34.451-76.8-76.8-76.8zM896 358.4c1.514 0 2.99 0.158 4.434 0.411l-385.632 257.090c-14.862 9.907-41.938 9.907-56.802 0l-385.634-257.090c1.443-0.253 2.92-0.411 4.434-0.411h819.2zM896 870.4h-819.2c-14.115 0-25.6-11.485-25.6-25.6v-438.566l378.4 252.267c15.925 10.618 36.363 15.925 56.8 15.925s40.877-5.307 56.802-15.925l378.398-252.267v438.566c0 14.115-11.485 25.6-25.6 25.6z"></path></svg><input id="a_email_id" type="Email" class="user-input" placeholder="Enter Email" name="a_email_id" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required /></div>
        <div class="password"><svg fill="#999" viewBox="0 0 1024 1024"><path class="path1" d="M742.4 409.6h-25.6v-76.8c0-127.043-103.357-230.4-230.4-230.4s-230.4 103.357-230.4 230.4v76.8h-25.6c-42.347 0-76.8 34.453-76.8 76.8v409.6c0 42.347 34.453 76.8 76.8 76.8h512c42.347 0 76.8-34.453 76.8-76.8v-409.6c0-42.347-34.453-76.8-76.8-76.8zM307.2 332.8c0-98.811 80.389-179.2 179.2-179.2s179.2 80.389 179.2 179.2v76.8h-358.4v-76.8zM768 896c0 14.115-11.485 25.6-25.6 25.6h-512c-14.115 0-25.6-11.485-25.6-25.6v-409.6c0-14.115 11.485-25.6 25.6-25.6h512c14.115 0 25.6 11.485 25.6 25.6v409.6z"></path></svg><input id="a_password" type="password" class="pass-input" placeholder="Enter Password" name="a_password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 6 or more characters" required /></div>
      </div>
      <button type="submit" class="signin-button">Login</button>
    </form>
      <div class="link">
        <a href="Home.php">Back Home</a>
      </div>
    </div>
  </body>

</html>
