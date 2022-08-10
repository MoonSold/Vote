<?php

namespace controller;

use Doctrine\ORM\EntityManager;
use http\Client\Request;

class UserController
{
<<<<<<< HEAD

=======
>>>>>>> stage
    private $userService;

    public function __construct($userService){
        $this->userService = $userService;
    }

<<<<<<< HEAD
    public function controllerRegistrationFunction(array $request): array
    {
        return $this->userService->registerUser($request['login'],$request['password'],$request['username'],$request['check']);
    }

    public function controllerAuthFunction(array $request): array
    {
        return $this->userService->authUser($request['login'],$request['password'],$request['check']);
    }

=======
    //регистрация пользователей
    public function controllerRegistrationFunction(array $request): array
    {
        $_SESSION['check'] = $request['check'];
        return $this->userService->registerUser($request['login'],$request['password'],$request['username']);
    }

    //авторизация пользователей
    public function controllerAuthFunction(array $request): array
    {
        $_SESSION['check'] = $request['check'];
        $server_response = $this->userService->authUser($request['login'],$request['password']);
        if ($server_response["auth"] === true){
            setcookie("token", strval($server_response["token"]), time() + 3600);
            setcookie("username", strval($server_response["username"]), time() + 3600);
        }
        return $server_response;
    }

    //получение токена для куки
>>>>>>> stage
    public function getTokenForCookie($login):string
    {
        return $this->userService>getToken($login);
    }

<<<<<<< HEAD
    public function controllerGetVoteGroup(array $request):array
    {
        if ($_SESSION['check'] === true) {
            return $this->userService->getVoteGroup($request['token']) + [['token'=>$_SESSION['token'],'username'=>$_SESSION['token']]];
        }
        else{
            return $this->userService->getVoteGroup($request['token']);
        }
=======
    //получение списка групп для голосования
    public function controllerGetVoteGroup():array
    {
        return $this->userService->getVoteGroup();
>>>>>>> stage
    }

    public function controllerGetVoteElement(array $request):array
    {
        return $this->userService->getVoteElement($request["id"]);
    }

    public function controllerSetResult(array $request)
    {
        return $this->userService->setResult($request["id"],$request['token']);
    }

<<<<<<< HEAD
    public function controllerExitFunction(array $request):bool
    {
        session_unset();
        session_destroy();
        return true;
=======
    public function controllerExitFunction(array $request)
    {
        return $this->userService->Exit();
>>>>>>> stage
    }
}