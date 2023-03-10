<?php 
//require '../Controler/connexion.php';
echo "database.php <br><hr><br>";

function getDatabase($login, $pass){
   
   $aParams= parse_ini_file("../param/param.ini", true);
   extract($aParams['DB']);
   $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$db."; charset=utf8";
   $db = new PDO($dsn, $login, $pass, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    
   return $db;
}

function getUsers($login, $pass){
   $db= getDatabase($login, $pass);
   $users= $db->query('SELECT * FROM User_sav');
   return $users;
}