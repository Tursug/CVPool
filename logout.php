<?php
	$who = $_REQUEST['name'];
	
	session_start();
	unset($_SESSION["username"]);
	unset($_SESSION["adminusername"]);
	if($who == 'kullanici'){
		header("Location: login.php");
	}else if($who == 'yonetici'){
		header("Location: AdminLogin.php");
	}
?>