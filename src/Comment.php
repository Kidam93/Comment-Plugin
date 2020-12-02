<?php
namespace App;

use App\Config;

define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

/**
 * Config::createDB();
 * Config::createTable();
 * Config::dropTable();
 * Config::dropDB();
 */

class Comment{

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

}

$comment = new Comment($_REQUEST);
$isValid = $comment->isValid();
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(empty($isValid)){
    $_SESSION['form'] = $isValid;
    header('Location: http://127.0.0.1:8000/templating/form.php');
    exit();
}else{
    $_SESSION['form'] = $isValid;
    header('Location: http://127.0.0.1:8000/templating/form.php');
    exit();
}