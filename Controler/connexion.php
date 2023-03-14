<?php
require 'Model/database.php';

 if(isset($_POST['login']) && isset($_POST['password'])){
   $login = $_POST['login'];
   $pass = $_POST['password'];

   try{
      $user= getUser($login, $pass);
      $action= "logged_as_$user[branche]";
   }catch(PDOException $e){
      $action='wrong_inputs';
   }
} 















//header('Location: ../View/view_home.php');