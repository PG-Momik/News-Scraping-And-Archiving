<?php 
	session_start();
	if(isset($_SESSION['username']) ){
		$uname = $_SESSION["username"];
		if($_SESSION["priority"] > 0){
			$user_type = 1;
		}
		else{
			$user_type = 0;
		}
	}
	else{
		$uname = "";
	}
	
?>