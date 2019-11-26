<?php
	session_start();
	if (isset($_SESSION["user_logged"])&& $_SESSION["user_logged"] == 1)
	{
		//do nothing//
	}
	else
	{
		$redirect = $_SERVER["PHP_SELF"];
	
	header("Refresh: 2; URL=user_login.php, ?redirect=$redirect");
	echo "You are being redirected to the login page!<br>";
	
	die(); ///винаги след пренасочване//
	}
	?>
	