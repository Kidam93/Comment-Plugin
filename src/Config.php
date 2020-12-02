<?php
namespace App;

use PDO;
use PDOException;

class Config{

    // CONFIG
    const SERV_NAME = "localhost";
    const USERNAME = "root";
    const PASSWORD = "";
    const DB_NAME = "Plugin";
    const DB_TABLE = "Comment";
    const PORT = "3308";

    public static function dbConf(){
        $db = new PDO("mysql:host=".self::SERV_NAME.";port=".self::PORT, self::USERNAME, self::PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    }

    public static function createDB(){
        try{
            $db = self::dbConf();
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
            $db = self::dbConf();
            $sql = "CREATE TABLE {$dbName}.{$dbTable} (
                id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
                FirstName varchar(255),
                LastName varchar(255),
                Comment text,
                created_at DATETIME
            )";
            $db->exec($sql);
            echo 'Table '.self::DB_TABLE.' créée !';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }

    public static function dropDB(){
        try{
            $dbName = self::DB_NAME;
            $dbTable = self::DB_TABLE;
            $db = self::dbConf();
            $sql = "DROP DATABASE {$dbName}";
            $db->exec($sql);
            echo 'Base de données '.self::DB_TABLE.' supprimé !';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }

    public static function dropTable(){
        try{
            $dbName = self::DB_NAME;
            $dbTable = self::DB_TABLE;
            $db = self::dbConf();
            $sql = "DROP TABLE {$dbName}.{$dbTable}";
            $db->exec($sql);
            echo 'Table '.self::DB_TABLE.' supprimé !';
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }
}