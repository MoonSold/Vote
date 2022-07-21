<?php

use service;

require_once dirname(__DIR__). "/config/bootstrap.php";

function controllerFunction($action):void
{

    switch ($action){
        case 'register':
           $server_response = service\RegisterUserClass::registerNewUser($_POST["login"],$_POST["password"],$_POST["username"]);
            break;
        case 'auth':
            $server_response = service\AuthUserClass::authUser($_POST["login"],$_POST["password"]);
            break;
        default:
            $server_response = ["auth"=>false,"token" => "not auth", "username" => "not auth"];
    }
    if ($server_response["auth"] === true || $server_response["register"] === true){
        setcookie("token",strval($server_response["token"]),time()+3600);
        setcookie("username",strval($server_response["username"]),time()+3600);
    }
}

