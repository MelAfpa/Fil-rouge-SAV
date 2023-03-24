<?php 
//session_start();
class dbCon{

   private static $connexion;
   private static $department = -1;
   
   private static function connect() {
      
      $aParams= parse_ini_file("_param.ini", true);

      extract($aParams['DB']);
      
      switch(self::$department){

         case -1: 
            extract($aParams['BASE']);
         break; 

         case 0: 
            extract($aParams['ADMIN']);
         break;

         case 1: 
            extract($aParams['SAV']);
         break;

         case 2: 
            extract($aParams['HOTLINE']);
         break;
      }

      $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$db."; charset=utf8";
      $db = new PDO($dsn, $log, $pass, 
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    
      
      self::$connexion= $db;
      return self::$connexion; 
   }

   public static function disconnect(){
      dbCon::$connexion = null;
   }

  public static function getConnexion() {
   if(isset($_SESSION['dept'])) self::$department = $_SESSION['dept']; ### RESTER CONNECTE AVEC CA BRANCHE
      if (self::$connexion != null) return dbCon::$connexion;
      else return dbCon::connect();   
   }
}