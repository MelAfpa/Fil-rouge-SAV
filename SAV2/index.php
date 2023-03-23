<?php 

 
session_start();

if( ! isset( $_SESSION['userName']))
  header('Location: Controler/connexion.php');


 
if( $_SESSION['userName'])
  header("Location: Controler/actionControl.php?action=$_POST[action]");

	
	
	
	
	
	
