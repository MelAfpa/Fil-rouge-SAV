<?php 

 
session_start();
### CONTROLE DE CONNEXION
if( ! isset( $_SESSION['userName']))
  header('Location: Controler/connexion.php');


 ### RENVOIE SUR CONTROLER SI CONNECTE
if( $_SESSION['userName'])
  header("Location: Controler/actionControl.php?action=$_POST[action]");

	
	
	
	
	
	
