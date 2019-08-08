<?php
  require_once('config.php');

  if(isset($_GET['caller_id'])){
    $dir = $_GET['caller_id'];
    if($dir == "logout"){
      logged_out();
    }else if($dir =="deleteJob"){
			$id = $_GET['id'];
			deleteJob($id);
		}else{
      echo "Caller id was passed incorrectly";
    }
  }
?>
