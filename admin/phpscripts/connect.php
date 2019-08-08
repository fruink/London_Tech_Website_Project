<?php
	// Set up connection credentials
	$user = "root";
	$pass = "root";
	$url = "localhost";
	$db = "db_ledc";

	$link = mysqli_connect($url, $user, $pass, $db, '8889'); //Mac
	//$link = mysqli_connect($url, $user, $pass, $db); //PC

	/* check connection */
	if(mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	if ((isset($_GET["splash"]))){
		$myQuery = "SELECT * FROM tbl_splash";
	  $result = mysqli_query($link, $myQuery);
	  $rows = array();
	  while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	  }
	  echo json_encode($rows);
	}

	if ((isset($_GET["about"]))){
		$myQuery = "SELECT * FROM tbl_about";
	  $result = mysqli_query($link, $myQuery);
	  $rows = array();
	  while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	  }
	  echo json_encode($rows);
	}

	if ((isset($_GET["why"]))){
		$myQuery = "SELECT * FROM tbl_why";
	  $result = mysqli_query($link, $myQuery);
	  $rows = array();
	  while($row = mysqli_fetch_assoc($result)) {
	    $rows[] = $row;
	  }
	  echo json_encode($rows);
	}

	if ((isset($_GET["video"]))){
		$myQuery = "SELECT * FROM tbl_video";
	  $result = mysqli_query($link, $myQuery);
	  $row = mysqli_fetch_assoc($result);
	  echo json_encode($row);
	}

	if ((isset($_GET["news"]))){
		$myQuery = "SELECT * FROM tbl_news";
	  $result = mysqli_query($link, $myQuery);
	  $row = mysqli_fetch_assoc($result);
	  echo json_encode($row);
	}



?>
