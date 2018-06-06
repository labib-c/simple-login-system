<?php 
	define('__CONFIG__', true);
	require_once "inc/config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="robots" content="follow">
	<title>Page Title</title>

	<!-- UIkit CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.5/css/uikit.min.css" />
</head>
<body>
	<div class="uk-section uk-container">
		<div class="uk-grid uk-child-width-1-3@s uk-child-width-1-1" uk-grid="">

			<form class="uk-form-stacked js-register">
				<h2>Register</h2>
			
				<div class="uk-margin">
					<label class="uk-form-label" for="form-stacked-text">Email</label>
					<div class="uk-form-controls">
						<input class="uk-input" type="email" id="form-stacked-text" required="required" placeholder="Enter email here">
					</div>
				</div>

				<div class="uk-margin">
					<label class="uk-form-label" for="form-stacked-text">Password</label>
					<div class="uk-form-controls">
						<input class="uk-input" type="password" id="form-stacked-text" required="required" placeholder="Enter password here">
					</div>
				</div>
				<div class="uk-margin uk-alert uk-alert-danger js-error"></div>

				<div class="uk-margin">
					<button class="uk-button uk-button-default" type="submit">Register</button>
				</div>
			</form>
		</div>
	</div>
	<?php require_once "inc/footer.php"; ?>
</body>
</html>
