<?php
require 'dbCon.class.php';
class usersMgr{

   public static function getUser(string $login, string $pass){
      $sql= "SELECT * FROM User_sav WHERE Log_name = :log AND password = :pass";
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
      $db= dbCon::getConnexion();

      $stmt= $db->prepare($sql);
      $stmt->execute([':log'=> $login, ':pass'=> $pass]);
      $res= $stmt->fetch();
     
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;     

      /*
      $sql= "SELECT * FROM User_sav WHERE Log_name = :log";
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
      $db= dbCon::getConnexion();

      if($db){
         $stmt= $db->prepare($sql);
         $stmt->execute([':log'=> $login]);
         $res= $stmt->fetch();
        
         if(password_verify($pass, $res['password'])){
            echo 'ok '.$pass .' : '.$res['password'];
            return $res;  
         }else{
            echo 'ERROR '.$pass .' : '.$res['password'];
         }
   
         $stmt->closeCursor();
         dbCon::disconnect(); */

       //  CHECK DEBBUG: ras --- $2y$10$idT96vYDvrRz3kRS9.ZZG.dt7cCIoNTqWXLRfPduhanV2kTE/mZka
      }
   

   
   public static function selectUsers(){
      $sql= "SELECT Log_name, branche FROM User_sav";
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
      $db= dbCon::getConnexion();
      $stmt= $db->query($sql);
      $res= $stmt->fetchAll();
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;  
   }

   public static function selectUser($id, $log_name, $branche){
      $sql= "SELECT Id_user, Log_name, branche FROM User_sav WHERE Id_user = ? OR Log_name = ? AND branche = '$branche'";
      //$sql= 'SELECT Id_user, Log_name, branche FROM User_sav WHERE Id_user = ? OR Log_name LIKE ?';
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
      $db= dbCon::getConnexion();
      $stmt= $db->prepare($sql);
      $stmt->bindValue(1, $id);
      $stmt->bindValue(2, $log_name);

      try{
         $res= $stmt->execute();
      }catch(PDOException $e){
         $res= false;
      }

      $res= $stmt->fetchAll(); ### MIEU FILTRER SI PLUSIEURS RESULTATS
      $stmt->closeCursor();
      dbCon::disconnect();
      return $res;  
   }


   public static function addUser( string $log_name, string $password, string $branche){

      $sql= "INSERT INTO User_sav(Log_name, password, branche) VALUE(:log, :pass, :dept);";
      echo "&emsp;DEBUG sql: $sql <br>"; ### DEBUG
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
      echo "res= $res";
      return $res;
   }
}
