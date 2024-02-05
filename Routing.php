<?php

require_once "src/controllers/ProfileController.php";
require_once "src/controllers/AppController.php";
require_once "src/controllers/SecurityController.php";
require_once "src/controllers/PostController.php";

class Routing {

    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run_controller($url) {
        $action = explode("/", $url)[0];

        if (!array_key_exists($action, self::$routes)) {
            die("Wrong Url!");
        }

        $controller = self::$routes[$action];
        $obj = new $controller();

        $obj->$action();
    }
}


?>