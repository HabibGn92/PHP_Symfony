<?php

class MysqlConnection {

    protected static $db;

    public function __construct(){
        self::$db = self::connect();
    }

    public static function connect(){
        if (is_null(self::$db)) {
            try
            {
                $connect = new PDO('mysql:host=localhost;dbname=databasehk;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            { 
                die('Erreur : ' . $e->getMessage());
            }
        }
        return $connect;
    }
}