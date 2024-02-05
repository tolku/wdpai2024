<?php

require_once "Routing.php";

$path = trim($_SERVER["REQUEST_URI"], '/');
$path = parse_url($path, PHP_URL_PATH);


Routing::get("myProfile", "ProfileController");
Routing::get("getPosts", "PostController");
Routing::get("showpost", "PostController");
Routing::get("logout", "SecurityController");
Routing::post("login", "SecurityController");
Routing::post("addPost", "PostController");
Routing::post("register", "SecurityController");

Routing::run_controller($path);

?>