<?php
   session_start();
   //Simple redireccionamiento
   if(session_destroy()) {
      header("Location:login.php");
   }
?>