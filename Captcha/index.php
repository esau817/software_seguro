<?php
   include("config.php");
   $error = '';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // enviado de usuario y contraseña
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM my_user WHERE username = '$myusername' and password_1 = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      
      //Usamos $count para verificar que haya un usuario con los datos obtenidos
      $count = mysqli_num_rows($result);

      if(isset($_POST['submit']) && $count == 1) 
      {
         $username = $_POST['username'];
         $secretKey = "6LflXt0UAAAAAM5b9cHM5ZXPq0i8TR4j9fCVyQSi";
         $responseKey = $_POST['g-recaptcha-response'];
         $userIP = $_SERVER['REMOTE_ADDR'];
   
         $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
         $response = file_get_contents($url);
         $response = json_decode($response);
         if ($response->success)
         {
             header("location: user_welcome.php");
         }
         else
         {
            echo "Verification failed! You must be a robot!";
         }
      }
      //Error de datos
      else
      {
         $error = "Your information is wrong, try again please";
      }
   }
?>
<html> 
   <head>
      <title>Inicio de sesión</title>     
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


      <!-- NO TOCAR --> <script src="https://www.google.com/recaptcha/api.js?render=6LfGXN0UAAAAAK_JHpXQ4kvu0NO7Oh0lr5y9Ih6c"></script>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div class="container jumbotron bg-white">
         <div class="row">

      <div class="p-5 col-12 ">
         <form action = "" method = "post">

         <div class="card bg-info col-6 mx-auto p-4">
            <h1 class="text-center mb-4 mt-2">Log in</h1>
            <div class="card mx-auto p-4 mb-4">
            <div class="mb-4">
                  <label >User Name:</label>
                  <input type = "text" name = "username" class="form-control">
            </div>
                  
               <div class="mb-4">
                  <label>Password  :</label> 
                  <input type = "password" name = "password" class = "form-control"/>
                  
               </div>
               
            <div class="text-center">
               <input type = "submit" name="submit" class="btn btn-primary mb-4"/>
               <div class="g-recaptcha mb-4" data-sitekey="6LflXt0UAAAAAEDUBv1E0g1YtEpWgnl6emhBNLE7"></div>
            </div>
            </div>
            
            <div class="mx-auto">
               <h1 class="text-center "><a href ="register.php" class="text-white ">Register</a></h1>
              <div><?php echo $error; ?></div>
               </div>
         </div>

         </form>

      </div>



               

            

         </div>
      </div>
   <!-- NO TOCAR -->   <script src='https://www.google.com/recaptcha/api.js'></script>
   <!-- Bootstrap -->
   <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   </body>
</html>