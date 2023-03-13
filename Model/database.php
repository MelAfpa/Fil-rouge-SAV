<?php 


function getDatabase($login, $pass){
   
   $aParams= parse_ini_file("param.ini", true);
   extract($aParams['DB']);
   $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$db."; charset=utf8";
   $db = new PDO($dsn, $login, $pass, 
   array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    
   return $db;
}

function getUsers($login, $pass){  ### DEBUGG
   $db= getDatabase($login, $pass);
   $users= $db->query('SELECT * FROM User_sav');
   return $users;
}



function getUser($login, $pass){
   $sql= "SELECT Log_name, branche FROM User_sav WHERE Log_name = '" . $login . "' AND password = '" . $pass . "'";
   $db= getDatabase($login, $pass);
   $stmt= $db->query($sql);
   $res= $stmt->fetch();
   $stmt->closeCursor();
   return $res; 
}
