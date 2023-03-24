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

      case 'getFormSelectOne':        ### FORMULAIRE POUR RECHERCHER UN TECHNICIEN
         require '../View/view_form.php';
      break;

      case 'getFormAdd':       ### FORMULAIRE POUR RAJOUTER UN TECHNICIEN
         require '../View/view_form.php';
      break;

      case 'getFormUpdate':        ### FORMULAIRE PREREMPLIT POUR UPDATE
         $pre_log= $_GET['upd_log'];  
         require '../View/view_form.php';
      break;

      case 'getFormConfirmDel';      ### CONFIRMATION AVANT SUPPRESSION
         require '../View/view_confirm.php';
      break;

      default:  ### ACCUEIL DE DEPART
         require '../View/view_home.php';
   } 
}


else if( isset($_SESSION['userName']) && isset($_POST['action'])){

   switch($_POST['action']){

      case 'select_users':  ### AFFICHER LA LISTE D"UTILISATEURS
         try{
            $users= usersMgr::selectUsers();
          
         }catch(PDOException $e){
            $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'select_user':   ### AFFICHER UN D"UTILISATEUR 
         try{
            $users= usersMgr::selectUser($_POST['id'], $_POST['login'], $_POST['branche']);
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_all_users.php';
      break;

      case 'add_user':    ### AJOUTER UN D"UTILISATEUR 

         try{
            $user= usersMgr::addUser($_POST['login'], $_POST['password'], $_POST['branche'] );
            if($user) $msg = $msg = "Utilisateur: $_POST[login] a été ajouté";
            else $msg = 'ERREUR';
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;



      case 'del_user':   ### SUPPRIMER UN UTILISATEUR

         try{
               if($_POST['del_dept'] === 'admin'){  ### TESTE SI UN SEUL ADMIN

                  $users= usersMgr::selectUsers();
                  $count=0;
                  foreach($users as $user){
                     if($user['branche'] === 'admin')
                     $count++;
                  } 
                  
                  if($count < 2){
                     $msg = " L'unique administrateur ne peut pas etre supprimé <br>";
                     require '../View/view_home.php';
                     return;
                  }
               } 

               $users= usersMgr::delUser($_POST['del_id']);
               $msg = "Utilisateur: $_POST[del_log] a été supprimé";
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break;


         case 'getFormConfirmUpd':{   ###  PAGE DE CONFIRMATON POUR LA MISE A JOUR
            require '../View/view_confirm.php';
         }
         break;


       case 'upd_user':   ###  MISE A JOUR UTILISATEUR

            if($_POST['upd_log'] === $_SESSION['userName'] && $_POST['upd_dept'] !== 'admin'){  ### ENPECHE UN UNIQUE ADMINISTRATEUR DE CHANGER DE BRANGE SANS CHANGER DE LOGIN
               $msg ="Un admin ne peut pas changer sa propre branche, utilisez un autre compte admin pour cette operation"; 
               require '../View/view_home.php';
               return;
            }

         try{
   
            $users= usersMgr::updUser($_POST['upd_log'], $_POST['upd_dept'], $_POST['upd_id']);
            $msg ="Utilisateur: $_POST[upd_log] a été mis a jour"; 
          
         }catch(PDOException $e){
            echo $e->getMessage();
         }
         require '../View/view_home.php';
      break; 
   } 
}
