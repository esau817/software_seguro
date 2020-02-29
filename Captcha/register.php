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
  <script src="https://www.google.com/recaptcha/api.js?render=6LfGXN0UAAAAAK_JHpXQ4kvu0NO7Oh0lr5y9Ih6c"></script>

</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
  <form method="post" action="register.php">
  	<div class="input-group">
  	  <label>User</label>
  	  <input type="text" name="username" value="<?php echo $username; ?>">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password_1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm Password</label>
  	  <input type="password" name="password_2">
  	</div>
	  <div class="input-group">
  	  <label>Full Name</label>
  	  <input type="text" name="fName">
  	</div>
	  <div class="input-group">
  	  <label>Phone Number</label>
  	  <input type="text" name="pNumber">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="submit">Registrar</button>
  	</div>
  	<p>
  	<a href="login_user.php">Cancelar</a>
  	</p>
	  <div class="g-recaptcha" data-sitekey="6LflXt0UAAAAAEDUBv1E0g1YtEpWgnl6emhBNLE7"></div>
  </form>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
