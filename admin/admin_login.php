<?php
	require_once('phpscripts/config.php');
	$ip = $_SERVER['REMOTE_ADDR'];
  if(isset($_POST['submit'])){
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		if($username !== "" && $password !== ""){
			$result = logIn($username, $password, $ip);
			$message = $result;
		}else{
			$message = "Please fill out the required fields.";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Login</title>
	<link rel="stylesheet" href="../css/foundation.css">
	<link rel="stylesheet" href="../css/app.css">
</head>
<body>
	<header id="loginHeader">
		<img src="../img/logo.png" alt="logo" id="loginlogo">
		<a href="../index.html" id="backLink">Back To Main Site</a>
	</header>
	<div id="logincontainer">
		<div id="greetings">
			<div id="fader">
				<h2 id="logingreeting">Welcome</h1>
				<h3 id="loginsubgreeting">Please Enter Your Login Credentials Below</h3>
			</div>
		</div>
		<?php if(!empty($message)){ echo $message;} ?>
		<div id="fader2">
			<form action="admin_login.php" method="post" id="loginform">
				<label id="userloginlabel">Username</label>
				<br>
				<input id="userlogininput" type="text" name="username" value="">
				<br>
				<label id="passwordloginlabel" >Password</label>
				<br>
				<input id="passwordlogininput" type="password" name="password" value="">
		 		<br><br>
				<input type="submit" name="submit" value="Login" id="submitButton">
	 		</form>
 		</div>
</div>
</body>
</html>
