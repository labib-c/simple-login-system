<?php
	function force_login(){
		if(isset($_SESSION['user_id'])){

		}else{
			header("Location: /simple-login-system/login.php"); exit;
		}
	}

	function force_dashboard(){
		if (isset($_SESSION['user_id'])){
			//automatically redirect
			header("Location: /simple-login-system/dashboard.php");
		}else{}
	}


?>
