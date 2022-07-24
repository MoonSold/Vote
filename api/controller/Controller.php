<?php

//use service;

require_once dirname(__DIR__). "/config/bootstrap.php";

class controller
{
    public static function controllerRegistrationFunction($login,$password,$username): void
    {
        $server_response = service\RegisterUserClass::registerNewUser($login,$password,$username);
        if ($server_response["register"] === true){
            setcookie("token", strval($server_response["token"]), time() + 3600);
            setcookie("username", strval($server_response["username"]), time() + 3600);
        }
    }

    public static function controllerAuthFunction($login,$password): void
    {
        $server_response = service\AuthUserClass::authUser($login,$password);
        if ($server_response["auth"] === true){
            setcookie("token", strval($server_response["token"]), time() + 3600);
            setcookie("username", strval($server_response["username"]), time() + 3600);
        }
    }

    public static function getTokenForCookie():string
    {
        return service\GetTokenClass::getToken($_SESSION["id"]);
    }

    public static function controllerGetQuestionGroup():void
    {
        $server_response = service\VoteGroupClass::getVoteGroup();
    }
}
