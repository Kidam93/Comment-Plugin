<?php
namespace App;

use App\Config;

define('DS', DIRECTORY_SEPARATOR);
require dirname(__DIR__) .DS.'vendor'.DS.'autoload.php';

Config::create();