<?php 

class dbCon{

   private static $connexion;

   private static function connect(string $login, string $pass) {
      
      $aParams= parse_ini_file("_param.ini", true);
      extract($aParams['DB']);
      $dsn = "mysql:host=".$host."; port=".$port."; dbname=".$db."; charset=utf8";
      $db = new PDO($dsn, $login, $pass, 
      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));    

      self::$connexion = $db;
      
      return self::$connexion; 
   }

   public static function disconnect(){
      dbCon::$connexion = null;
   }

  public static function getConnexion(string $user, string $password) {
      if (self::$connexion != null) return dbCon::$connexion;
      else return dbCon::connect($user, $password);   
   }
}