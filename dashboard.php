<?php
	define('__CONFIG__', true);
	require_once "inc/config.php"; 

	force_login();
	$User = new User($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">

    <title>Dashboard</title>

    <base href="/" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-beta.24/css/uikit.min.css" />
  </head>

  <body>

  	<div class="uk-section uk-container">
  		<h2>Dashboard</h2>
  		You are signed in as user: <?php echo $_SESSION['user_id']?>
      <p>Hello <?php echo $User->email; ?>, you registered at <?php echo $User->reg_time; ?></p>
      <a href="/simple-login-system/logout.php"> Logout </a>
  	</div>

  	<?php require_once "inc/footer.php"; ?> 
  </body>
</html>