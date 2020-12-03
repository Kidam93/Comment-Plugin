<?php
namespace App;

use PDO;
use DateTime;
use App\Config;
use PDOException;

// define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

/**
 * http://127.0.0.1:8000/src/Comment.php
 * 
 * Config::createDB();
 * Config::createTable();
 * Config::dropTable();
 * Config::dropDB();
 */

class Comment extends Database{

    public function __construct($request){
        $this->request = $request;
    }

    public function isValid(){
        $errors = [];
        if(strlen($this->request['firstname']) <= 3){
            $errors['firstname'] = "Votre prenom est trop court";
        }
        if(strlen($this->request['lastname']) <= 3){
            $errors['lastname'] = "Votre nom est trop court";
        }
        if(strlen($this->request['message']) <= 3){
            $errors['message'] = "Votre message est trop court";
        }
        return $errors;
    }

    public function registerData(){
        try{
            $dbName = self::DB_NAME;
            $dbTable = self::DB_TABLE;
            $firstname = $this->request['firstname'];
            $lastname = $this->request['lastname'];
            $message = $this->request['message'];
            $date = (new DateTime())->format('Y-m-d H:i:s');
            $db = Comment::dbConf();
            $sth = $db->prepare("INSERT INTO $dbName.$dbTable(FirstName,LastName,Comment,created_at)
                                VALUES(:firstname, :lastname, :message, :date)");
            $sth->execute([':firstname' => $firstname, 
                ':lastname' => $lastname, 
                ':message' => $message, 
                ':date' => $date]);
            // echo "Entrée ajoutée dans la table ".self::DB_TABLE;
        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }

    public function selectAll(){
        try{
            $dbName = self::DB_NAME;
            $dbTable = self::DB_TABLE;
            $db = self::dbConf();
            $sth = $db->prepare("SELECT * FROM {$dbName}.{$dbTable}");
            $sth->execute();
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);
            // echo 'Données de '.self::DB_TABLE.' recuperé !';
            return $data;
        }catch(PDOException $e){
          echo "Erreur : " . $e->getMessage();
        }
    }

}