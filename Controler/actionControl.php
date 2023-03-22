<?php
require '../Model/usersMgr.class.php';
session_start();
$pre_log=''; ### PRE REMPLIT LE FORMULAIRE SI MAJ
if( ! isset($_SESSION['userName'])) die(" Page invalid :( ");  ###  BLOQUAGE DU PASSAGE PAR URL
$msg='...';

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

      case 'getFormUpdate':       
         $pre_log= $_GET['upd_log'];
         require '../View/view_form.php';
      break;

      case 'getFormConfirm';      
         require '../View/view_confirm.php';
      break;

      default:  
         require '../View/view_home.php';
   } 
}


else if( isset($_SESSION['userName']) && isset($_POST['action'])){

   switch($_POST['action']){

      case 'select_users':
         try{
            $users= usersMgr::selectUsers();
          
         }catch(PDOException $e){
            $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'select_user':  ### no 's'  
         try{
            $users= usersMgr::selectUser($_POST['id'], $_POST['login'], $_POST['branche']);
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'add_user':   
        // $encode= hashpass($_POST['password']);
        // echo "CHECK DEBBUG: $_POST[password] --- $encode";

         try{
            $user= usersMgr::addUser($_POST['login'], $_POST['password'], $_POST['branche'] );
            if($user) $msg ='ADD ok';
            else $msg = 'ERROR';
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;
//////////////////////////////////////////////////


      case 'del_user':   

         try{
               if($_POST['del_dept'] === 'admin'){

                  $users= usersMgr::selectUsers();
                  $count=0;
                  foreach($users as $user){
                     if($user['branche'] === 'admin')
                     $count++;
                  } 
                  
                  if($count > 1){
                     $users= usersMgr::delUser($_POST['del_id']);
                     $msg ='DEL ok';
                  }else $msg ='not the last admin';
               } 
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;

///////////////////////////////////////////////////
       case 'upd_user':   
         try{
            $users= usersMgr::updUser($_POST['login'], $_POST['branche'], $_POST['upd_id']);
            if($res === 1)
            $msg ='UPD ok ' . $res; 

            else $msg = 'ERROR';
          
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

