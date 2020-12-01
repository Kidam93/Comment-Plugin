<?php
namespace App;

use PDO;
use PDOException;

class Config{

    const SERV_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "Comment";
    const PORT = "3308";

    public static function create(){
        try{
            $db = new PDO("mysql:host=".self::SERV_NAME.";port=".self::PORT, self::USERNAME, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE ".self::DB_NAME;
            $db->exec($sql);
            echo 'Base de données'.self::DB_NAME.'créée!';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }
}