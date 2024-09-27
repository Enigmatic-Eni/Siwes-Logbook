<?php
   session_start();
   if(!isset($_SESSION["reg_number"])){
      header("Location: supervisor_login");
      exit(); 
   }
?>
