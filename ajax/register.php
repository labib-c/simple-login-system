<?php 
	define('__CONFIG__', true);
	require_once "../inc/config.php"; 


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-Type: application/json');
			$array = [];

			$email = Filter::String($_POST['email']);
			$email = strtolower($email);

			if(User::find($email)){
				//user exists
				$array['error'] = 'You already have an account';
			}else{
				//user does not exist
				$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

				$addUser = $con->prepare("INSERT INTO users(email, password) VALUES(:email, :password)");
				$addUser->bindParam(":email", $email, PDO::PARAM_STR);
				$addUser->bindParam(":password", $password, PDO::PARAM_STR);
				$addUser->execute();

				$user_id = $con->lastInsertId();

				$_SESSION['user_id'] = (int) $user_id;

				$array['redirect'] = '/simple-login-system/dashboard.php?message=welcome';
			}


			echo json_encode($array, JSON_PRETTY_PRINT); exit;
	}else{
		exit('Invalid URL');
	}

?>