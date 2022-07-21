<?php

use service;

require_once dirname(__DIR__). "/config/bootstrap.php";

function controllerFunction($action):void
{
    switch ($action){
        case 'register':
           var_dump(service\RegisterUserClass::registerNewUser($_POST["login"],$_POST["password"],$_POST["username"]));
            break;
        case 'auth':
            var_dump(service\AuthUserClass::authUser($_POST["login"],$_POST["password"]));
            break;
    }
}

