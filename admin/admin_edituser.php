<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$id = $_SESSION['user_id'];
	$tbl = "tbl_users";
	$col = "user_id";
	$popForm = getUser($tbl, $col, $id);
	$info = mysqli_fetch_array($popForm);

	if(isset($_POST['submit'])){
		$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
		$result = editUser($id, $fname, $username, $password, $email);
		$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit User</title>
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
			<h2 id="createheader">Edit Your Account</h2>
		</div>
		<?php if(!empty($message)){echo $message;} ?>
		<div id="formFade">
		<form action="admin_edituser.php" method="post" id="editUserForm">
			<label>First Name:</label>
			<input class="createInput" type="text" name="fname" value="<?php echo $info['user_fname'];  ?>"><br><br>
			<label>Username:</label>
			<input class="createInput" type="text" name="username" value="<?php echo $info['user_name'];  ?>"><br><br>
			<label>Password:</label>
			<input class="createInput" type="text" name="password" value="Leave Blank If You Would Like To Keep The Same Password"><br><br>
			<label>Email:</label>
			<input class="createInput" type="text" name="email" value="<?php echo $info['user_email'];  ?>"><br><br>
			<input type="submit" name="submit" value="Edit Account" id="submitUser">
		</form>
		<div id="formFade">
	</div>
</body>
</html>
