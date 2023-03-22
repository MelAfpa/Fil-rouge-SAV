<?php
   require '../Model/usersMgr.class.php';
	session_start();
   $action='';
   $wrong_inputs= '';
   $pre_log='Vasseur';
   $pre_pass='Evan-Vasseur';
   $msg='...';
   if(isset($_POST['birth_date']) && ! empty($_POST['birth_date'])) die();

   if(isset($_POST['login']) && isset($_POST['password'])){
      
      if($_SERVER['REQUEST_METHOD'] !== 'POST') die();

    /*   if($_POST['captcha'] !== $_POST['captcha_inputs']){
         $action='wrong_captcha';
         $pre_log= $_POST['login'];
         $pre_pass= $_POST['password'];
      }  */

      else{
         $login = $_POST['login'];
         $login = addslashes($login); ### SECURITY  
         $login= strip_tags($login); ### SECURITY  htmlspecialchars($login)
         $pass = $_POST['password'];

        // if(password_verify($pass, $row->password))
      
         try{
            $user= usersMgr::getUser($login, $pass);

            switch($user['branche']){

               case 'admin':
                  $_SESSION['dept'] = 0;
               break;

               case 'sav':
                  $_SESSION['dept'] = 1;
               break;
                  
               case 'hotline':
                  $_SESSION['dept'] = 2;
               break;
            }

            $user= usersMgr::getUser($login, $pass);
            $action= "logged_as_$user[branche]";


         }catch(PDOException $e){
            $action='wrong_inputs';
         }
      }
   } 

   switch($action){
		case 'logged_as_sav': 
         setConnexion($user['Log_name'], $user['password'], $user['branche']);
			//require '../View/view_home.php';
         header("Location: ../indexTickets.php?action=accueil");
		break;

		case 'logged_as_hotline': 
         setConnexion($user['Log_name'], $user['password'], $user['branche']);
			//require '../View/view_home.php';
         header("Location: ../indexTickets.php?action=accueil");
		break;

		case 'logged_as_admin': 
         setConnexion($user['Log_name'], $user['password'], $user['branche']);
			require '../View/view_home.php';
		break;

		case 'wrong_inputs':
			$wrong_inputs= '<span>&#128533 &emsp; Erreur de connexion</span>';	
			require '../View/view_login.php';
		break;
		case 'wrong_captcha':
			$wrong_inputs= '<span>&#129302 &nbsp; Le captcha ne correspond pas</span>';	
			require '../View/view_login.php';
		break;
		
		default:
		require '../View/view_login.php';
	}


   function setConnexion($userName, $userPass, $userBranche){
   
      $_SESSION['userName'] = $userName;
      $_SESSION['userPass'] = $userPass;
      $_SESSION['userBranche'] = $userBranche;
   }
  