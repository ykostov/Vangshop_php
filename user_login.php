<?php
	session_start();
	$_SESSION["user_logged"] = 0;
	if (isset($_POST["submit"]) && $_POST["username"]=="admin"
	    && $_POST["password"]=="1234")
	{
		$_SESSION["user_logged"] = 1;	
		header("Refresh: 2; URL=index.php");
		echo "You are  being redirected to the home page";
		die();
	}
	if (isset($_POST["submit"]))
	{
?>
<html>
<head>
<title>LOGIN</title>
</head>
<body>
<p>Invalid username or/and password!</p>
<form action="user_login.php" method="post" name="loginform">
<label>Username:</label> <input type="text" name="username">
<br>
<label>Password:</label> <input type="password" name="password">
<input type="submit" name="submit" value="Login!">
</form>
</body>
</html>
<?php
	}
	if (!isset($_POST["submit"]))
	{
?>
<html>
<head>
<title>LOGIN</title>
</head>
<body>
<p>You must log to view this page</p>
<form action="user_login.php" method="post" name="loginform">
<label>Username: </label><input type="text" name="username">
<br>
<label>Password: </label><input type="password" name="password">
<input type="submit" name="submit" value="Login!">
</form>
<?php
	}
?>
