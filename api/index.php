<?php

require("classes/config.php");

spl_autoload_register(function($classname){

    require('classes/'.strtoLower($classname).".php");
});

$app = new App();

if(isset($_GET['url'])){
    header('Content-type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, X-Requested-With');
    echo $app->result;
}
