<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Welcome &bull; ARK Tourism</title>
    <link rel="icon" type="image/x-icon" href="Media/ark_favicon.png">

    <meta http-equiv="refresh" content="3; url=http://localhost/ARK_Tourism/Home.php"/>

    <style>
      .scanner{
        max-width: 500px;
        margin: auto;
        padding: 50px;
        background: white;
      }
      .scanner h3{
        color: grey;
        font-size: 2rem;
        position: absolute;
      }
      .scanner h3::before{
        content: "Welcome__to__ARK__Tourism!";
        position: absolute;
        top: 0;
        left: 0;
        width: 0;
        height: 100%;
        border-right: 3px solid rgba(0,172,193,1);
        box-shadow: 0 0 4px 4px rgba(0,172,193,1);
        overflow: hidden;
        color: rgba(0,172,193,1);
        animation: scan 3s linear infinite;
      }
      @keyframes scan{
        0%, 10%, 100%{
          width: 0;
        }
        60%, 80%{
          width: 100%;
        }
      }
    </style>
  </head>
  <body onmousedown="return false" onselectstart="return false">
    <div class="scanner">
      <h3>Welcome__to__ARK__Tourism!</h3>
    </div>
  </body>
</html>
