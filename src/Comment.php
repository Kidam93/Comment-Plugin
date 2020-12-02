<?php
namespace App;

use PDO;
use DateTime;
use App\Config;
use PDOException;

define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

/**
 * Config::createDB();
 * Config::createTable();
 * Config::dropTable();
 * Config::dropDB();
 */

class Comment extends Config{

    public function __construct($request){
        $this->request = $request;
    }

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
            echo "Entrée ajoutée dans la table".self::DB_TABLE;
        }catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
        }
    }

}

$comment = new Comment($_REQUEST);
$isValid = $comment->isValid();
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(empty($isValid)){
    $_SESSION['form'] = $isValid;
    $comment->registerData();
    // header('Location: http://127.0.0.1:8000/templating/form.php');
    // exit();
}else{
    $_SESSION['form'] = $isValid;
    header('Location: http://127.0.0.1:8000/templating/form.php');
    exit();
}