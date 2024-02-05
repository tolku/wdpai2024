<?php

require_once "Entity/Osoba.php";
require_once "Entity/Wyksztalcenie.php";
require_once "Entity/Student.php";

//
//set_include_path("./Documents/wdpai_project/Entity/");

function __autoload($class_name) {
    echo "Ladowanie klas: " . $class_name;
    require_once $class_name . ".php";
}

?>