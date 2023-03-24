<?php
require 'dbCon.class.php';
class usersMgr{

   public static function getUser(string $login, string $pass){
      $sql= "SELECT * FROM User_sav WHERE Log_name = :log AND password = :pass";
      $db= dbCon::getConnexion();
     
      $stmt= $db->prepare($sql);
      $stmt->execute([':log'=> $login, ':pass'=> $pass]);
      $res= $stmt->fetch();
     
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;     
   }
   
   
   public static function selectUsers(){
      $sql= "SELECT Id_user, Log_name, branche FROM User_sav";
      $db= dbCon::getConnexion();
      $stmt= $db->query($sql);
      $res= $stmt->fetchAll();
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;  
   }

   public static function selectUser($id, $log_name, $branche){
      $sql= "SELECT Id_user, Log_name, branche FROM User_sav WHERE Id_user = ? OR Log_name = ? AND branche = '$branche'";
      $db= dbCon::getConnexion();
      $stmt= $db->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->bindValue(2, $log_name);

      try{
         $res= $stmt->execute();
      }catch(PDOException $e){
         $res= false;
      }

      $res= $stmt->fetchAll(); 
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;  
   }


   public static function addUser( string $log_name, string $password, string $branche){

      $sql= "INSERT INTO User_sav(Log_name, password, branche) VALUE(:log, :pass, :dept);";
      $db= dbCon::getConnexion();
      $stmt= $db->prepare($sql);

      try{
         $res= $stmt->execute([':log' => $log_name, ':pass' => $password, ':dept' => $branche]);
      }catch(PDOException $e){
         $res= false;
      }
      $stmt->closeCursor();
      echo "res= $res";
      return $res;
   }

   public static function delUser(int $id){
      $sql= "DELETE FROM user_sav WHERE Id_user = ?";
      $db= dbCon::getConnexion();
      $stmt= $db->prepare($sql);
      $stmt->execute([$id]);
      $lengthUser= $stmt->rowCount();
      $stmt->closeCursor();
      return ($lengthUser === 1);
   }

   public static function updUser(string $log, $branche, int $id){
      $sql= "UPDATE user_sav SET Log_name = :log, branche = :branche
      WHERE Id_user = :id";
      $db= dbCon::getConnexion();
      $stmt= $db->prepare($sql);
      try{
         $res=  $stmt->execute(array(':log'=> $log, ':branche'=> $branche, ':id'=> $id));
      }catch(PDOException $e){
         $res= false;
         echo $e->getMessage();
      }
      $stmt->closeCursor();
     // echo "res= $res";
      return $res;
   }
}
