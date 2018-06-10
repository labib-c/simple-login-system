<?php 
	define('__CONFIG__', true);
	require_once "../inc/config.php"; 


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
			header('Content-Type: application/json');
			$array = [];

			$email = Filter::String($_POST['email']);
			$email = strtolower($email);
			$password = $_POST['password'];

			$findUser = $con->prepare("SELECT user_id, password FROM users WHERE email = :email LIMIT 1");
			$findUser->bindParam(':email', $email, PDO::PARAM_STR);
			$findUser->execute();

			if($findUser->rowCount() == 1){
				//user exists - sign in
				$User = $findUser->fetch(PDO::FETCH_ASSOC);
				$user_id = (int) $User['user_id'];
				$hash = $User['password'];
				if(password_verify($password, $hash)){
					$array['redirect'] = '/simple-login-system/dashboard.php';
					$_SESSION['user_id'] = $user_id;
				}else{
					$array['error'] = "Incorrect password or email";
				}

				
			}else{
				//user does not exist - refer back to register
				$array['error'] = "You do not have an account. <a href='simple-login-system/register.php'> Register here </a>";

			}


			echo json_encode($array, JSON_PRETTY_PRINT); exit;
	}else{
		exit('Invalid URL');
	}

?>