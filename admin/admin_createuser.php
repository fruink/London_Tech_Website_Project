<?php
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$lvllist = $_POST['lvllist'];
		if(empty($lvllist)){
			$message = "Please select a user level";
		}else{
			$result = createUser($fname, $username, $email, $lvllist);
		}

	}

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Create User</title>
<link rel="stylesheet" href="../css/foundation.css">
<link rel="stylesheet" href="../css/app.css">
</head>
<body>
	<header id="loginHeader">
		<img src="../img/logo.png" alt="logo" id="loginlogo">
		<a href="../index.html" id="backLink">Back To Main Site</a>
	</header>
	<div id="logincontainer">
		<div id="createFade">
			<h2 id="createheader">Create A New User</h2>
		</div>
		<?php if(!empty($message)){echo $message;} ?>
		<div id="formFade">
			<form action="admin_createuser.php" method = "post" id="createUserForm">
				<label>First Name:</label>
				<input type="text" name= "fname" value = "" class="createInput">
				<label>Username:</label>
				<input type="text" name= "username" value = "" class="createInput">
				<label>Email:</label>
				<input type="text" name= "email" value = "" class="createInput">
				<select name="lvllist" id="lvllist">
					<option value="">Select User Level</option>
					<option value="2">Web Admin</option>
					<option value="1">Web Master</option>
				</select>
				<input type="submit" name= "submit" value="Create User" id="submitUser">
		  </form>
		</div>
	</div>

</body>
</html>
