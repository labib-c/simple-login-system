<?php 
	define('__CONFIG__', true);
	require_once "../inc/config.php"; 


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-Type: application/json');
			$array = [];

			$email = Filter::String($_POST['email']);
			$email = strtolower($email);

			$findUser = $con->prepare("SELECT user_id FROM users WHERE email = :email LIMIT 1");
			$findUser->bindParam(':email', $email, PDO::PARAM_STR);
			$findUser->execute();

			if($findUser->rowCount() == 1){
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

				$array['redirect'] = '/simple-login-system/dashboard.php';
			}


			echo json_encode($array, JSON_PRETTY_PRINT); exit;
	}else{
		exit('Invalid URL');
	}

?>