<?php
$url = isset($_GET['url']) ? $_GET['url'] : 'index';

switch ($url) {
	case 'HomePage':
	include 'home.php';
	break;

	case 'LoginPage':
	include 'login.php';
	break;

case 'CreateAccount':
	include 'create.php';
	break;

	default:
	echo "<script>window.location.href='LoginPage'</script>";
	break;
}

?>