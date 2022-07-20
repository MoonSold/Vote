<?php

use service;

require_once dirname(__DIR__). "/config/bootstrap.php";

function controllerFunction($action)
{
    switch ($action){
        case 'register':
           service\RegisterUserClass::registerNewUser($_POST["login"],$_POST["password"],$_POST["username"]);
            break;
        case 'auth':
            service\AuthUserClass::authUser($_POST["login"],$_POST["password"]);
    }
}

