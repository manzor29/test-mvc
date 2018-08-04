<?php

use app\core\Router;
use app\models\Database;

spl_autoload_register(function ($class) {
   $path = str_replace('\\', '/', $class . '.php');
   if (file_exists($path)) {
       require $path;
   }
});

require "app/config/db.php";
require "vendor/autoload.php";

$dt = new Database();

$router = new Router();
$router->run();