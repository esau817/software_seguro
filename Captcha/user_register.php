<?php
//Excluí el método md5 para evitar problemas de encriptación
session_start();
include("config.php");


$username   = "";
$password_1 = "";
$fName      = "";
$pNumber    = "";
$errors = array(); 


if (isset($_POST['reg_user'])) {
//Recibir datos correctos de los campos
  $username   =   mysqli_real_escape_string($conn, $_POST['username']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
  $fName      =   mysqli_real_escape_string($conn, $_POST['fName']);
  $pNumber    =   mysqli_real_escape_string($conn, $_POST['pNumber']);

//Aseguramos que los campos sean llenados correctamente
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
    $PHPtext = "Your PHP alert!";
  }

//Verificamos duplicados 
  $user_check_query = "SELECT * FROM my_user WHERE username='$username' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }
  }

  if (count($errors) == 0) {
  	$password =($password_1);

  	$query = "INSERT INTO my_user (username, password_1, fName, pNumber) 
  			  VALUES('$username', '$password', '$fName', '$pNumber')";
  	mysqli_query($conn, $query);
  	header('location: login_user.php');
  }
}

// ... 