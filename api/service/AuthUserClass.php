<?php

namespace service;

use Entity;
use http\Exception;

require_once dirname(__DIR__)."/config/bootstrap.php";

class AuthUserClass
{
    public static function authUser($login,$password):array
    {
        try {
            global $entityManager;
            $user = $entityManager->getRepository(Entity\UsersEntity::class)->findOneBy(array('login' => $login));
            if ($user->getPasswordHash() == md5($password)) {
                $_SESSION["username"] = $user->getUserName();
                $_SESSION["id"] = $user->getId();
                $token = GetTokenClass::getToken($user->getId());
                return ["auth"=>true, "token" => $token, "username" => $_SESSION["username"]];
            }
            else {
                return ["auth"=> false];
            }
        }
        catch(Exception $e){
            return ["auth"=>false];
        }
    }
}
