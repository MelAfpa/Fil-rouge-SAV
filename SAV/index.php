<?php 
$action='';
$wrong_inputs= '';
$pre_log='';
$pre_pass='';

require 'Controler/connexion.php';
echo"&emsp;DEBUG action: $action "; ### DEBUG

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
		case 'wrong_captcha':
			$wrong_inputs= '<span>&#129302 &nbsp; Le captcha ne correspond pas</span>';	
			require 'View/view_login.php';
		break;

		default:
		require 'View/view_login.php';
		// if(isset...) session_destroy; ???
	}

	