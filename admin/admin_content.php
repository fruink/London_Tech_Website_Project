<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
	$jobs = grabJobs();
	while($row = $jobs->fetch_array()){
		$jobRows[] = $row;
	}
	if(isset($_POST['submitSplash'])){
		$video = $_FILES['video'];
		$img = $_FILES['icon'];
		updateSplash($video,$img);
	}
	if(isset($_POST['submitAbout'])){
		$bio = $_POST['bio'];
		$img = $_FILES['aImage'];
		updateAbout($bio,$img);
	}
	if(isset($_POST['submitWhy'])){
		$wage = $_POST['wages'];
		$housing = $_POST['housing'];
		$jobs = $_POST['jobs'];
		$education = $_POST['education'];
		updateWhy($wage,$housing, $jobs, $education);
	}
	if(isset($_POST['submitNewJob'])){
		$pic = $_FILES['pic'];
		$title = $_POST['title'];
		$desc = $_POST['desc'];
		addJob($pic, $title, $desc);
	}
	if(isset($_POST['submitVideo'])){
		$video = $_FILES['mainVideo'];
		updateVideo($video);
	}
	if(isset($_POST['submitNews'])){
		$title = $_POST['title'];
		$pic = $_FILES['pic'];
		$post = $_POST['post'];
		echo 'fire1';
		updateNews($title,$pic,$post);
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
			<h2 id="indexGreeting">What Section Would You like to Change?</h2>
		</div>
		<div id="sections">
			<div id="splashContent" class="content">
				Splash Section
				<form action="admin_content.php" method="post" id="editSplashForm" enctype="multipart/form-data" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-6 cell'>
						<div class='inner'>
							<label>Select a New Video Background</label>
							<input type="file" name="video" class='contentformInput'>
						</div>
					</div>
					<div class='large-6 cell'>
						<label>Select a new Icon</label>
						<input type='file' name='icon' class='contentformInput'>
					</div>
					<input type="submit" name="submitSplash" value="Edit Splash" class='contentsubmit'>
				</div>
				</form>
			</div>
			<div id="aboutContent" class="content">
				About Section
				<form action="admin_content.php" method="post" id="editAboutForm" enctype="multipart/form-data" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-6 cell'>
						<div class='inner'>
							<label>Enter New Text</label>
							<input type='text' name="bio" placeholder = 'Enter the new about text here' class='contentformInput'>
						</div>
					</div>
					<div class='large-6 cell'>
						<label>Select a new Image</label>
						<input type='file' name='aImage' class='contentformInput'>
					</div>
					<input type="submit" name="submitAbout" value="Edit About" class='contentsubmit'>
				</div>
				</form>
			</div>
			<div id="whyContent" class="content">
				Why London Section
				<form action="admin_content.php" method="post" id="editWhyForm" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-3 cell'>
						<label>Enter New Wage Description</label>
						<textarea name="wages" class='contentformInput'></textarea>
					</div>
					<div class='large-3 cell'>
						<label>Enter New Housing Description</label>
						<textarea name="housing" class='contentformInput'></textarea>
					</div>
					<div class='large-3 cell'>
						<label>Enter New Jobs</label>
						<textarea name="jobs" class='contentformInput'></textarea>
					</div>
					<div class='large-3 cell'>
						<label>Enter New Education Description</label>
						<textarea name="education" class='contentformInput'></textarea>
					</div>
					<input type="submit" name="submitWhy" value="Edit Why" class='contentsubmit'>
				</div>
				</form>
			</div>
			<div id="hiringContent" class="content">
				Hiring Section
				<form action="admin_content.php" method="post" id="editHiringForm" enctype="multipart/form-data" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-6 cell'>
						<label>Add A job (image,title,and description)</label>
						<input type='file' name='pic' class='contentformInput'>
						<input type='text' name='title' class='contentformInput'>
						<textarea name="desc" placeholder ='Enter Job Description' class='contentformInput'></textarea>
						<input type="submit" name="submitNewJob" value="Add a Job" class='contentsubmit'>
					</div>
					<div class='large-6 cell' id='djobs'>
						<label>Delete a Job</label>
						<?php
							foreach($jobRows as $row){
								echo "
									<div class='job'>
										<h3 class='jobTitle'>{$row['job_title']}</h3>
										<a href=\"phpscripts/caller.php?caller_id=deleteJob&id={$row['job_id']}\">Delete Job Posting</a>
									</div>
								";

							}
						?>
					</div>
				</div>
				</form>
			</div>
			<div id="videoContent" class="content">
				Video Section
				<form action="admin_content.php" method="post" id="editVideoForm" enctype="multipart/form-data" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-6 cell'>
						<label>Add A New Video</label>
						<input type='file' name='mainVideo' class='contentformInput'>
						<input type="submit" name="submitVideo" value="Edit Video" class='contentsubmit'>
					</div>
				</div>
				</form>
			</div>
			<div id="newsContent" class="content">
				News Section
				<form action="admin_content.php" method="post" id="editNewsForm" enctype="multipart/form-data" class='contentForm'>
				<div class='grid-x' id='splashInner'>
					<div class='large-6 cell'>
						<label>Edit Current News Article</label>
						<input type='file' name='pic' class='contentformInput'>
						<input type='text' name='title' class='contentformInput'>
						<textarea name="post" placeholder ='Enter Post' class='contentformInput'></textarea>
						<input type="submit" name="submitNews" value="Edit News" class='contentsubmit'>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
<script src="js/admin.js"></script>
</body>
</html>
