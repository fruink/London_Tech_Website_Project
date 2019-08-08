<?php
include('connect.php');
if (isset($_POST['submit'])){
  $to = 'ledc@ledc.ca';
  $subject = 'Site Contact';
  $location = $_POST['location'];
  $message = 'Name: '.$_POST['name'].' ';
  $message .='Email: '.$_POST['email'].' ';
  $message .='Message: '.$_POST['message'];

  if ($location == ""){
    $send = mail($to, $subject, $message);
  }
}



?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Thank You</title>
<link rel="stylesheet" href="css/foundation.css">
	<link rel="stylesheet" href="css/app.css">
</head>
<body>
<header id="loginHeader">
		<img src="img/logo.png" alt="logo" id="loginlogo">
		<a href="index.html" id="backLink">Back To Main Site</a>
	</header>
  <div id="logincontainer">
    <div id='contactInner'>
      <h2>Thank you for contacting us, <?php echo $_POST['name']; ?></h2>
      <h3>We will respond as soon as possible</h3>
    </div>
  </div>

</body>
</html>
