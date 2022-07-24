<?php

namespace service;

use Entity;
use Doctrine\ORM\OptimisticLockException;

require_once dirname(__DIR__)."/config/bootstrap.php";
require_once dirname(__DIR__)."/Entity/UsersEntity.php";

class RegisterUserClass
{
    public static function registerNewUser($login,$password,$username):array
    {
        try {
            $validation = ValidatorClass::registerValidator($login, $password, $username);
            if ($validation === true) {
                global $entityManager;
                $new_user = new Entity\UsersEntity();
                $password = md5($password);
                $new_user->setLogin($login);
                $new_user->setPasswordHash($password);
                $new_user->setUserName($username);
                $entityManager->persist($new_user);
                $entityManager->flush();
                $id = $entityManager
                    ->getRepository(Entity\UsersEntity::class)
                    ->findOneBy(array('login' => $login))
                    ->getId();
                $new_token = new Entity\TokensEntity();
                $new_token->setUserId($id);
                $new_token->setToken(md5($id));
                $entityManager->persist($new_token);
                $entityManager->flush();
                $_SESSION["id"] = $id;
                $_SESSION["username"] = $username;
                return ["register" => true, "token" => md5($id), "username" => $username];
            } else {
                return ["register" => false];
            }
        }
        catch (OptimisticLockException $e){
            return ["register" => false];
        }
    }
}
