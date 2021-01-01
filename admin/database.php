<?php

    class Database{
        /*
            Pour contourner l'idee d"instance de la class connexion Database on utile le mot static
            les parametres appartiennent ainsi a la class et non plus a une instance de la class
            self s'utilse dans une class avec des proprietes static 
         */
        private static $dbHost = "localhost";
        private static $dbName = "burguer_code";
        private static $dbUser = "root";
        private static $dbPassword = "";

        private static $connection = null;

        public static function connect(){

            if(self::$connection == null)
            {
                try
                {/* 
                  self::$connection = new PDO('mysql:host=localhost;dbname=burguer_code', self::$dbUser, self::$dbPassword); */
                  self::$connection = new PDO('mysql:host='.self::$dbHost.';dbname='.self::$dbName, self::$dbUser, self::$dbPassword);
                }
                catch(PDOException $e)
                {
                   die($e->getMessage());
                }
            }
            return self::$connection;            
        }
        public static function disconnect(){
                self::$connection = null;
        }
    }
  
?>


