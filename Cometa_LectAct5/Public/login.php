<?php
session_start();
include "../private/logincss.php";
include "../private/config.php";
$_SESSION['times']=time();
$_SESSION['logintime'] = date("h:i:s"); 

?>

<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 50%;transform: translate(-50%, -50%);position: fixed">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 30%;transform: translate(-50%, -50%);position:fixed ">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:100%;left: 70%;transform: translate(-50%, -50%);position: fixed;">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:85%;left: 85%;transform: translate(-50%, -50%);position: fixed;">
<img src="277-2770756_flower-flowers-tumblr-aesthetic-watercolor-flowers-transparent-background-removebg-preview.png" alt="flowers" style="margin: 0; position: absolute; top:85%;left: 10%;transform: translate(-50%, -50%);position: fixed;">

<div class="login-container">
<div class="login-form">
<form action='#' method='post'>

<?php

	if (!isset($_SESSION['errorcnt'])){
	$_SESSION['errorcnt'] = 0;
}
if (!isset($_SESSION['last_time'])){
	$_SESSION['last_time'] = 0;
}
	$error="";
$attempt=0;?>
	<h2>Username</h2>
	<input type="text" name="usernames"></br>
	<h2>Password</h2>
	<input type="password" name="passwords"></br>
	<a href="CreateAccount">Create Account</a>
<?php?>
	<?php
	if ($_SESSION['errorcnt']>=5){
	$total1 =  $_SESSION['times'] - $_SESSION['last_time'];
		echo    "<br><input value='Login' type='submit' name='log' disabled></br>";
		$error= "Max Attempts please try again in $total1/60";
		$timer = $_SESSION['times'];
	}
		else{
echo    "<br><input value='Login' type='submit' name='log'></br>";
	}
	$_SESSION['total'] =  $_SESSION['times'] - $_SESSION['last_time'];
	if ($_SESSION['total'] >= 60){
		$_SESSION['last_time']=0;
		$_SESSION['errorcnt']=0;
	}
	if ($error !=""){ ?>
	<p class="error">
		<?= $error ?></p>
	<?php }

if (isset($_POST['log'])){
	$_POST['usernames'] = htmlspecialchars($_POST['usernames']);
	$_POST['passwords'] = htmlspecialchars($_POST['passwords']);
	$_POST['passwords'] = md5($_POST['passwords']);
	$Q = mysqli_query($con, "SELECT * from accounts where user='".$_POST['usernames']."' and pass='".$_POST['passwords']."'");
	$QR= mysqli_num_rows($Q);

	if (!empty($_POST['usernames']) && !empty($_POST['passwords'])){
		$R2 = mysqli_fetch_array($Q);
		if ($R2['pass'] =$_POST['passwords']){
	if ($QR>=1){
		$R = mysqli_fetch_array($Q);
			$_SESSION['anti1'] = "1";
			$_SESSION['errorcnt'] = 0;	
			$_SESSION['last_time'] = 0;
		echo "<script>alert('redirecting to homepage page')</script>";
		echo "<script>window.location.href='HomePage'</script>";
		
	}
	else{
		$error="Username or Password Incorrect";
		$_SESSION['errorcnt']++;
		$_SESSION['last_time']= time();
		
	}
}
else{

}
}
else{
	$error= "Please Fill-Out Empty Fields";
}
}

	?>
</form>
</div>
</div>
