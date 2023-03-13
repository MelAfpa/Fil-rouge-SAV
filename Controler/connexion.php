<?php
require '../Model/database.php';

if(isset($_POST['login']) && isset($_POST['password'])){
   $login = $_POST['login'];
   $pass = $_POST['password'];
   
   try{
      $loggedUser= getUser($login, $pass);
      header("Location:../View/view_home_$loggedUser[branche].php?n=$loggedUser[Log_name]&b=$loggedUser[branche]");    
   }catch(PDOException $e){
      header('Location: ../index.php?action=input');
   }
	
} else {
   header('Location: ../index.php?action=url');
   die();
}















//header('Location: ../View/view_home.php');