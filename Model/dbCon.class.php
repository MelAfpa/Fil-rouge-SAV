<?php 
//session_start();
class dbCon{

   private static $connexion;
   private static $department = - 1;
   
   private static function connect() {
      
      $aParams= parse_ini_file("_param.ini", true);
      echo self::$department . " -_- ";

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

      self::$connexion = $db;
      return self::$connexion; 
   }

   public static function disconnect(){
      dbCon::$connexion = null;
   }

  public static function getConnexion() {
   if(isset($_SESSION['dept'])) self::$department = $_SESSION['dept'];
      if (self::$connexion != null) return dbCon::$connexion;
      else return dbCon::connect();   
   }

  /*  public static function setBranche($param){
      self::$department = $param;
      echo "here dept: " . self::$department;
   } */
}