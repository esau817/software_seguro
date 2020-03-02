<?php
   include("config.php");
   $error = '';
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
      // enviado de usuario y contraseña de admin
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT id FROM my_user WHERE username = '$myusername' and password_1 = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);

      //if($count == 1) 
      //{
         //$_SESSION['login_user'] = $myusername;
         //header("location: user_welcome.php");
      //}
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
             //echo "Log in successfuly.";
             header("location: user_welcome.php");
         }
         else
         {
            echo "Verification failed! You must be a robot!";
         }
      }
      else
      {
         $error = "Your information is wrong, try again please";
      }
   }
?>
<html> 
   <head>
      <title>Inicio de sesión</title>     
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
       <script src="https://www.google.com/recaptcha/api.js?render=6LfGXN0UAAAAAK_JHpXQ4kvu0NO7Oh0lr5y9Ih6c"></script>
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" name="submit"/><br />
                  <div class="g-recaptcha" data-sitekey="6LflXt0UAAAAAEDUBv1E0g1YtEpWgnl6emhBNLE7"></div>
               </form>
               <h1><a href = "register.php">Register</a></h1>
              <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
            </div>
         </div>
      </div>
         <script src='https://www.google.com/recaptcha/api.js'></script>
   </body>
</html>