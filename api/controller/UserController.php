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
    public function controllerRegistrationFunction(array $request): array
    {
//        $_SESSION['check'] = $request['check'];
        return $this->userService->registerUser($request['login'],$request['password'],$request['username'],$request['check']);
    }

    //авторизация пользователей
    public function controllerAuthFunction(array $request): array
    {
//        $_SESSION['check'] = $request['check'];
        return $this->userService->authUser($request['login'],$request['password'],$request['check']);
    }

    //получение токена для куки
    public function getTokenForCookie($login):string
    {
        return $this->userService>getToken($login);
    }

    //получение списка групп для голосования
    public function controllerGetVoteGroup(array $request):array
    {
        if ($_SESSION['check'] === true) {
            return $this->userService->getVoteGroup($request['token']) + [['token'=>$_SESSION['token'],'username'=>$_SESSION['token']]];
        }
        else{
            return $this->userService->getVoteGroup($request['token']);
        }
    }

    public function controllerGetVoteElement(array $request):array
    {
        return $this->userService->getVoteElement($request["id"]);
    }

    public function controllerSetResult(array $request)
    {
        return $this->userService->setResult($request["id"],$request['token']);
    }

    public function controllerExitFunction(array $request):bool
    {
        session_unset();
        session_destroy();
        return true;
    }
}