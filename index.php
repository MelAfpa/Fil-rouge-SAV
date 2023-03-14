<?php 
$action='';
$wrong_inputs= '';

require 'Controler/connexion.php';
echo "DEBUG action= $action <br>";

	switch($action){

		case 'logged_as_sav': 
			require 'View/view_home_sav.php';
		break;

		case 'logged_as_hotline': 
			require 'View/view_home_hotline.php';
		break;

		case 'logged_as_admin': 
			require 'View/view_home_admin.php';
		break;

		case 'wrong_inputs':
			$wrong_inputs= '<span>&#128533 &emsp; Erreur de connexion</span>';	
			require 'View/view_login.php';
		break;

		default:
			require 'View/view_login.php';
	}

	