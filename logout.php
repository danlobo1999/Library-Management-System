<?php
   session_start();
   
   if(session_destroy()) {
      header("Location: Loginphp.php");
   }
?>