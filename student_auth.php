<?php
   session_start();
   if(!isset($_SESSION["matric_no"])){
      header("Location: login");
      exit(); 
   }
?>
