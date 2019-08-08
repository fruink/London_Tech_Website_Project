<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	date_default_timezone_set('America/Toronto');
  $thetime = date("H:i:s");
  $greeting = "";
	$name = $_SESSION['user_name'];
  if($thetime > "17:00:00"){

    $greeting = "Good evening ";

  } elseif ("05:00:00" > $thetime && $thetime > "0:00:00"){

    $greeting = "Good morning ";

  } elseif ("12:00:00" > $thetime && $thetime > "05:00:00"){

    $greeting = "Good morning ";

  } elseif ("17:00:00" > $thetime && $thetime > "12:00:00"){

    $greeting = "Good Afternoon ";

  }else {
    $greeting ="we are experiencing time related errors ";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Welcome To Your CMS Panel</title>
	<link rel="stylesheet" href="../css/foundation.css">
	<link rel="stylesheet" href="../css/app.css">
</head>
<body>
	<header id="loginHeader">
		<img src="../img/logo.png" alt="logo" id="loginlogo">
		<a href="../index.html" id="backLink">Back To Main Site</a>
	</header>
	<div id="logincontainer">
		<div id="indexFader">
		<?php echo "<h2 id=\"indexGreeting\">{$greeting}{$name}, what would you like to do today?</h2>"; ?>
		</div>
		<div class="linkContainer fadebox">
			<a href="admin_createuser.php">Create A New User</a>
			<p>Create a new adminstrative account for the site.</p>
	  </div>
		<div class="linkContainer fadebox">
			<a href="admin_edituser.php">Edit Your Account</a>
			<p>Update Your Account Information</p>
		</div>
		<div class="linkContainer fadebox">
			<a href="admin_content.php">Update Site Content</a>
			<p>Add, Change, or Delete Content Found on The Site</p>
		</div>
		<div class="linkContainer fadebox">
			<a href='admin_dashboard.php'>View Metrics Dashboard</a>
			<p>View Social Media and Google Analytics Metrics</p>
		</div>
		<div class="linkContainer fadebox" id="signout">
		<a href="phpscripts/caller.php?caller_id=logout">Sign Out</a>
		</div>
	</div>

</body>
</html>
