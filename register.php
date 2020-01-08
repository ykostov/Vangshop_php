<?php
 session_start();
 include "conn.php";
?>
<html>
<head>
	<title>Register page</title>
</head>
<body>
<?php
	if (isset($_POST['submit']) && 
	    $_POST['submit'] === "Register") {
		$query = 'SELECT username FROM customers WHERE username = "'.$_POST['username'].'";';
		$result = mysqli_query($con, $query);
		//echo $query;
		if (mysqli_num_rows($result)) {
?>
<p> The Username, <?php echo $_POST['username'];?> is already
in use, please choose another!</p>
<p>
<form action="register.php" method="post">
<p>Username: <input type="text" name="username" required></p>
<p>Password: <input type="password" name="password" required></p>
<p>Email: <input type="email" name="email" required
           value="<?php echo $_POST['email'];?>"></p>
<p>First name: <input type="text" name="first_name" required
           value="<?php echo $_POST['first_name'];?>"></p>
<p>Last name: <input type="text" name="last_name" required
           value="<?php echo $_POST['last_name'];?>"></p>
<p>Address line 1: <input type="text" name="add1" required
           value="<?php echo $_POST['add1'];?>"></p>
<p>Address line 2: <input type="text" name="add2" required
           value="<?php echo $_POST['add2'];?>"></p>
<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear">
</form>
</p>
<?php
		} else {
			$query = 'INSERT INTO customers ('.
				'id, username, password, first_name,'. 
				'last_name, add1, add2, email)'.
				'VALUES ( 0, "'. 
				$_POST['username']. '","'. $_POST['password']. '","'.
				$_POST['first_name'].'","'. $_POST['last_name'].'","'.
				$_POST['add1']. '","' .$_POST['add2']. '","'.
				$_POST['email'].'");';
			///echo $query;
			echo "<br>";
			
			$result = mysqli_query($con, $query);
			$_SESSION['user_logged']=1;
			$_SESSION['username'] = $_POST['username'];
			$_SESSION['password'] = $_POST['password'];
			///echo $result;
			echo "<br>";
?>
			<p>Thank you <?php echo $_POST['first_name']. "  ".
			$_POST['last_name'];?> for registering!<br>
			<?php header("Refresh: 3; URL=index.php");
			echo "Your registration is completed!".
				 "You are being sent to the home page!<br>";
			die();
		}
	} else {
?>
<p>Welcome to registration page</p>
<p>The username, password, email, first name and
last name are required</p>
<p><form action="register.php" method="post">
<p>Username: <input type="text" name="username" required></p>
<p>Password: <input type="password" name="password" required></p>
<p>Email: <input type="email" name="email" required></p>
<p>First name: <input type="text" name="first_name" required></p>
<p>Last name: <input type="text" name="last_name" required></p>
<p>Address line 1: <input type="text" name="add1"></p>
<p>Address line 2: <input type="text" name="add2"></p>
<input type="submit" name="submit" value="Register">
<input type="reset" name="reset" value="Clear">
</form>
</p>
<?php 
	} 
?>
</body>
</html>
