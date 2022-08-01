<?php
session_start();

// unset session variable
session_unset();

// destroy session
session_destroy();

echo "<script>alert('User logout of  `ARK Tourism`  Successful!');</script>";
echo "<script>location.href ='Home.php'</script>";
?>
