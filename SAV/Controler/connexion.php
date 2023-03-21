<?php
   require 'Model/usersMgr.class.php';

   if(isset($_POST['birth_date']) && ! empty($_POST['birth_date'])) die();

   if(isset($_POST['login']) && isset($_POST['password'])){
      
      if($_SERVER['REQUEST_METHOD'] !== 'POST') die();

      if($_POST['captcha'] !== $_POST['captcha_inputs']){
         $action='wrong_captcha';
         $pre_log= $_POST['login'];
         $pre_pass= $_POST['password'];
      } 
      else{
         $login = $_POST['login'];
         $login = addslashes($login); ### SECURITY
         $login= strip_tags($login); ### SECURITY
         $pass = $_POST['password'];
      
         try{
            $user= usersMgr::getUser($login, $pass);
            $action= "logged_as_$user[branche]";
         }catch(PDOException $e){
            $action='wrong_inputs';
         }
      }
   } 
      
  