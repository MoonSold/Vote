<?php

namespace service;

use Entity;

require_once dirname(__DIR__)."/config/bootstrap.php";
require_once dirname(__DIR__)."/Entity/UsersEntity.php";

class AuthUserClass
{
    public static function authUser($login,$password)
    {
        global $entityManager;
        $user = $entityManager->getRepository(Entity\UsersEntity::class)->findOneBy(array('login'=>$login));
        if ($user->getPasswordHash() == md5($password)) {
            $_COOKIE['token'] = md5($user->getId());
            $_SESSION["username"] = $user->getUserName();
            $_SESSION["id"] = $user->getId();
            $token = $entityManager->getRepository(Entity\TokenHashEntity::class)->findOneBy(array('userid'=>$_SESSION["id"]));
            die();
        }
    }
}