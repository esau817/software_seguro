<?php include('user_register.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Agregar usuario</title>
</head>
<body>
  <div class="header">
  	<h2>Registrar nuevo usuario</h2>
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
  	  <button type="submit" class="btn" name="reg_user">Registrar</button>
  	</div>
  	<p>
  	<a href="login_user.php">Cancelar</a>
  	</p>
  </form>
</body>
</html>
