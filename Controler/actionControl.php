<?php
require '../Model/usersMgr.class.php';
session_start();

if( ! isset($_SESSION['userName'])) die(" Page invalid :( ");  ###  BLOQUAGE DU PASSAGE PAR URL
$msg=':>';

if( isset($_SESSION['userName']) && isset($_GET['action'])){
   switch($_GET['action']){

      case 'back_home':                   ### RETOUR ACCUEIL EN RESTANT CONNECTE
         require '../View/view_home.php';
      break;

      case 'getFormSelect':         
         require '../View/view_form.php';
      break;

      case 'getFormSelectOne':        
         require '../View/view_form.php';
      break;

      case 'getFormAdd':        
         require '../View/view_form.php';
      break;

      default:  
         require '../View/view_home.php';
   } 
}


else if( isset($_SESSION['userName']) && isset($_POST['action'])){

   switch($_POST['action']){

      case 'select_users':
         try{
            $users= usersMgr::selectUsers($_SESSION['userName'],  $_SESSION['userPass']);
          
         }catch(PDOException $e){
            $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'select_user':  ### no 's'  
         try{
            $users= usersMgr::selectUser($_SESSION['userName'],  $_SESSION['userPass'],
            $_POST['id'], $_POST['login'], $_POST['branche']);
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'add_user':   
         $encode= hashpass($_POST['password']);

         try{
            $users= usersMgr::addUser($_SESSION['userName'],  $_SESSION['userPass'],
            $_POST['login'], $encode, $_POST['branche'] );
            $msg ='ADD ok';
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;


      case 'del_user':   
         try{
            $users= usersMgr::delUser($_SESSION['userName'],  $_SESSION['userPass'],
            $_POST['del_id']);
            $msg ='DEL ok';
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;
   } 
}






function hashpass($pass){

   $hPass= password_hash($pass, PASSWORD_BCRYPT);
   return $hPass;
}

