<?php
   session_start();
   if(!isset($_SESSION["pf_number"])){
      header("Location: supervisor_login");
      exit(); 
   }
?>
