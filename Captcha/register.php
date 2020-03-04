<?php 
	if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $secretKey = "6LflXt0UAAAAAM5b9cHM5ZXPq0i8TR4j9fCVyQSi";
        $responseKey = $_POST['g-recaptcha-response'];
        $userIP = $_SERVER['REMOTE_ADDR'];

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
        $response = file_get_contents($url);
        $response = json_decode($response);
        if ($response->success)
            echo "Registrarion successfuly. Your username is: $username";
        else
            echo "Verification failed! You must be a robot!";
    }
 ?>
<?php include('user_register.php') 
 ?>
<!DOCTYPE html>
<html>

<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<!-- NO TOCAR -->
	<script src="https://www.google.com/recaptcha/api.js?render=6LfGXN0UAAAAAK_JHpXQ4kvu0NO7Oh0lr5y9Ih6c"></script>

</head>

<body style="background: #F9F9F9">
	<div class="header row justify-content-center p-3" style="background: #15A4B2">
		<h2 style="color: white" class="text-uppercase font-weight-bold">Register</h2>
	</div>
	<div class="row justify-content-center pt-5" style="">
		<form method="post" class="col-8 border border-secondary rounded" action="register.php">
			<div class="input-group row my-2">
				<div class="col-4"><label>User: </label></div>
				<div class="col-8"><input type="text" class="form-control" name="username"
						value="<?php echo $username; ?>"></div>
			</div>
			<div class="input-group row my-2">
				<div class="col-4"><label>Password: </label></div>
				<div class="col-8"><input type="password" class="form-control" name="password_1"></div>
			</div>
			<div class="input-group row my-2">
				<div class="col-4"><label>Confirm Password: </label></div>
				<div class="col-8"><input type="password" class="form-control" name="password_2"></div>
			</div>
			<div class="input-group row my-2">
				<div class="col-4"><label>Full Name: </label></div>
				<div class="col-8"><input type="text" class="form-control" name="fName"></div>
			</div>
			<div class="input-group row my-2">
				<div class="col-4"><label>Phone Number: </label></div>
				<div class="col-8"><input type="text" class="form-control" name="pNumber"></div>
			</div>
			<div class="g-recaptcha row my-4 justify-content-center"
				data-sitekey="6LflXt0UAAAAAEDUBv1E0g1YtEpWgnl6emhBNLE7"></div>

			<div class="row my-2 justify-content-center">
				<div class="input-group col-2">
					<button type="submit" class="btn btn-primary" name="submit">Registrar</button>
				</div>
				<div class="col-2">
					<a href="index .php" class="btn btn-outline-primary">Cancelar</a>
				</div>
			</div>


		</form>
	</div>
	<!-- NO TOCAR -->
	<script src='https://www.google.com/recaptcha/api.js'></script>
</body>

</html>