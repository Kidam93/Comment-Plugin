<?php
namespace App;

use App\Config;

// http://127.0.0.1:8000/src/Comment.php
define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

// Config::createDB();
Config::createTable();
// Config::dropTable();
// Config::dropDB();