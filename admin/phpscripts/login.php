<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_users WHERE user_name='{$username}' ";
		$user_set = mysqli_query($link, $loginstring);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			$verified = $founduser['user_verified'];
			$encryptedpass = $founduser['user_pass'];
			if (password_verify($password, $encryptedpass)){
				if ($verified == 'yay'){
					redirect_to("admin_index.php");
				}else if ($verified == 'suspended'){
					$message = "You have failed to use the correct log in credentials to many times, your account has been suspended for 24 hours";
					return $message;
				}else{
					redirect_to("admin_edituser.php");
				}
			}else{
				echo 'the information you entered is not correct.';
			}
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
			}
		}else{
			$message = "Your log in credentials are incorrect";
			return $message;
		}

		mysqli_close($link);
	}
?>
