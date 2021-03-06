<?php
    require_once ("model/mySession.php");
    $sesisonManage = new mySession();

    mySession::startSession();
    $sesisonManage->unsetSession();

    require_once ("site/controller/LoginController.php");
    $manager = new LoginController();
	$manager->runLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login_HelloAlumni</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="public/vendor/bootstrapv3/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="public/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="public/login/util.css">
	<link rel="stylesheet" type="text/css" href="public/login/login.css">

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-85 p-b-20">

				<form method="POST" action="index.php" class="login100-form validate-form">

					<span class="login100-form-title p-b-70">
						Welcome
					</span>
					<span class="login100-form-avatar">
						<img src="public/login/img/avatar.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username">
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn_submit">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div>
	<?php 

	 ?>
	<script src="public/vendor/jquery/jquery.min.js"></script>

	<script src="public/login/login.js"></script>

</body>
</html>