<?php
//Excluí el método md5 para evitar problemas de encriptación
session_start();
include("config.php");


$username = "";
$fName    = "";
$pNumber  = "";
$email    = "";
$errors = array(); 


if (isset($_POST['reg_user'])) {
//Recibir datos correctos de los campos
  $username = mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  $fName = mysqli_real_escape_string($conn, $_POST['fName']);
  $email = mysqli_real_escape_string($conn, $_POST['pNumber']);

//Aseguramos que los campos sean llenados correctamente
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The passwords do not match");
  }

//Verificamos duplicados 
  $user_check_query = "SELECT * FROM users WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  if (count($errors) == 0) {
  	$password =($password_1);

  	$query = "INSERT INTO my_user (username, passcode, fName, email) 
  			  VALUES('$username', '$password', '$fName', '$email')";
  	mysqli_query($conn, $query);
  	$_SESSION['username'] = $username;
  	header('location: user_welcome.php');
  }
}

// ... 