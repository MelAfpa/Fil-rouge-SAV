<?php
require 'dbCon.class.php';
class usersMgr{

   public static function getUser(string $login, string $pass){
      $sql= "SELECT Log_name, branche FROM User_sav WHERE Log_name = :log AND password = :pass";
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
      $db= dbCon::getConnexion($login, $pass);
      $stmt= $db->prepare($sql);
      $stmt->execute([':log'=> $login, ':pass'=> $pass]);
      $res= $stmt->fetch();
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;  
   }
}
