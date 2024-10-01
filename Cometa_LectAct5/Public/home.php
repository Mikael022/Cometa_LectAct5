<?php
session_start();
include '../private/logincss.php';
include '../private/config.php';
?>
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 50%;transform: translate(-50%, -50%);position: fixed">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 30%;transform: translate(-50%, -50%);position:fixed ">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 70%;transform: translate(-50%, -50%);position: fixed;">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:85%;left: 85%;transform: translate(-50%, -50%);position: fixed;">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:85%;left: 10%;transform: translate(-50%, -50%);position: fixed;">
<style>
    h1{font-size: 150px}
</style>
<form action='#' method='post'>
    <h1 style="margin: 0; position: absolute; top: 20%;left: 25%; transform: translate(-50%, -50%>;">HOME PAGE</h1>
<div class="login-form">
<input type='submit' name='logout' value='Logout'>
</div>

</form>
<?php

if (isset($_POST['logout'])){
    echo "<script>alert('Successfully Logged-out')</script>";
    echo "<script>window.location.href='LoginPage'</script>";
    $_SESSION['last_time'] = 0;
    session_destroy();
}
if ($_SESSION['anti1'] != "1"){
    echo "<script>alert('Please Login first!')</script>";
    echo "<script>window.location.href='LoginPage'</script>";
}




?>