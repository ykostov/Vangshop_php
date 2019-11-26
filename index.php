<?php

	session_start();
 if (isset($_SESSION["user_logged"]) && $_SESSION["user_logged"] == 1) {
		include "logged_user.php";
 }
	else {
		include "unlogged_user.php";
	}
 ?>