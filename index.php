<?php

use app\core\Router;
use app\models\Database;

//автозагрузка классов
spl_autoload_register(function ($class) {
   $path = str_replace('\\', '/', $class . '.php');
   if (file_exists($path)) {
       require $path;
   }
});
require "vendor/autoload.php";

//подключение к БД
require "app/config/db.php";
$dt = new Database();

//инициализация роутера
$router = new Router();

//запуск приложения
$router->run();