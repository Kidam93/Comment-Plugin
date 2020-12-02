<?php
namespace App;

use PDO;
use PDOException;

class Config{

    const SERV_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "Plugin";
    const DB_TABLE = "Comment";
    const PORT = "3308";

    public static function createDB(){
        try{
            $nameDB = self::DB_NAME;
            $db = new PDO("mysql:host=".self::SERV_NAME.";port=".self::PORT, self::USERNAME, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE ".self::DB_NAME;
            $db->exec($sql);
            echo 'Base de données '.self::DB_NAME.' créée !';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }

    public static function createTable(){
        try{
            $dbName = self::DB_NAME;
            $dbTable = self::DB_TABLE;
            $db = new PDO("mysql:host=".self::SERV_NAME.";port=".self::PORT, self::USERNAME, self::PASSWORD);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE TABLE {$dbName}.{$dbTable} (
                PersonID int,
                LastName varchar(255),
                FirstName varchar(255),
                Address varchar(255),
                City varchar(255)
            )";
            $db->exec($sql);
            echo 'Table '.self::DB_TABLE.' créée !';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }
}