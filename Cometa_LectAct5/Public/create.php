<?php
session_start();
include "../private/createcss.php";
include "../private/config.php";


?>
<html>
<head>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
<div class="login-container">
<div class="login-form">
<form action="#" method="post">
	<h2>Username</h2>
	<input type="text" name="usernames"></br>
	<h2>Password</h2>
	<input type="password" name="passwords"></br>
	<h2>Confirm Password</h2>
	<input type="password" name="passwords2"></br>
	<br><div class="g-recaptcha" data-sitekey="6LfZqVIqAAAAAGaR3lFK3qYHk7EbcEH6h1Rn6qEP"></div>

	<input type="submit" name="register" value="Register"></br>
	<?php
	$error="";
	/*if (isset($_POST['register'])){
	$Q = mysqli_query($con, "SELECT * from accounts where user='".$_POST['usernames']."' and pass='".$_POST['passwords']."'");
	$QR= mysqli_num_rows($Q);

	if (!empty($_POST['usernames']) && !empty($_POST['passwords']) && !empty($_POST['passwords2'])){
		$Encry=md5($_POST['passwords2']);
		if ($_POST['passwords'] = $_POST['passwords2']){
		if ($QR<1){	
			$querymove=mysqli_query($con,"INSERT INTO accounts(user,pass) VALUES ('".$_POST['usernames']."','".$Encry."')");
				echo "<script>alert('Account Successfuly Created')</script>";
				echo "<script>window.location.href='LoginPage'</script>";
		}
		else{
			$error= "Username/Password already exists";
		}
	}
	else{
		$error= "Password and confirm password doesnt match";
	}
	}
	}*/

if (isset($_POST['register'])){
	$use = $_POST['usernames'];
	$pass = md5($_POST['passwords2']);
	$pass1 = $_POST['passwords'];
	$pass2= $_POST['passwords2'];
	$secret = '6LfZqVIqAAAAAB3Ebvdos8k1QiaSykd3xrG5T7kv';
	$recapRes = $_POST['g-recaptcha-response'];
	$remote = $_SERVER['REMOTE_ADDR'];
	$url ='https://www.google.com/recaptcha/api/siteverify';
	$datas = ['secret' => $secret, 'response' => $recapRes, 'remoteip' => $remote];
	$options = [
		'http' =>[
			'header' => "Content-type: application/x-www-form-urlencoded",
			'method' => 'POST',
			'content' => http_build_query($datas),]];
	$context = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$resKeys=json_decode($result,true);
if ($resKeys["success"]){
		$Q = mysqli_query($con, "SELECT * from accounts where user='".$use."' and pass='".$pass."'");
	$QR= mysqli_num_rows($Q);
	if (!empty($_POST['usernames']) && !empty($_POST['passwords']) && !empty($_POST['passwords2'])){
	if ($_POST['passwords'] == $_POST['passwords2']){
		if ($QR<1){
			$querymove=mysqli_query($con,"INSERT INTO accounts(user,pass) VALUES ('$use','$pass')");
			echo "<script>alert('successfuly Registered')</script>";
		//	echo "<script>window.location.href='LoginPage'</script>";
		}
		else{
			echo "<script>alert('User Already Exists')</script>";
		}
	}
	else{
		echo "<script>alert('Password and Confirm Passwords Dont Match')</script>";
	}
}
	else{
		echo "<script>alert('Please Fill-Out Empty Fields')</script>";
	}


	}
	else{
		echo "<script>alert('reCaptcha Verification failed')</script>";
	}
}

if ($error !=""){ ?>
	<p class="error">
		<?= $error ?></p>
	<?php }

	?>
</div>
</div>
</form>

</body>
</html>
