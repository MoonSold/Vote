<?php

namespace controller;

use Doctrine\ORM\EntityManager;
use http\Client\Request;

class UserController
{
    private $userService;

    public function __construct($userService){
        $this->userService = $userService;
    }

    //регистрация пользователей
    public function controllerRegistrationFunction(array $request,bool $check = false): array
    {
        $_SESSION['check'] = $check;
        return $this->userService->registerUser($request['login'],$request['password'],$request['username']);
    }

    //авторизация пользователей
    public function controllerAuthFunction(array $request,bool $check = false): array
    {
        $_SESSION['check'] = $check;
        $server_response = $this->userService->authUser($request['login'],$request['password']);
        if ($server_response["auth"] === true){
            setcookie("token", strval($server_response["token"]), time() + 3600);
            setcookie("username", strval($server_response["username"]), time() + 3600);
        }
        return $server_response;
    }

    //получение токена для куки
    public function getTokenForCookie($login):string
    {
        return $this->userService>getToken($login);
    }

    //получение списка групп для голосования
    public function controllerGetQuestionGroup():array
    {
        return $this->userService->getVoteGroup();
    }
}