<?php

namespace service;

use Entity;

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
                $newuser = new Entity\UsersEntity();
                $password = md5($password);
                $newuser->setLogin($login);
                $newuser->setPasswordHash($password);
                $newuser->setUserName($username);
                $entityManager->persist($newuser);
                $entityManager->flush();
                $id = $entityManager
                    ->getRepository(Entity\UsersEntity::class)
                    ->findOneBy(array('login' => $login))
                    ->getId();
                $newtoken = new Entity\TokenHashEntity();
                $newtoken->setUserId($id);
                $newtoken->setToken(md5($id));
                $entityManager->persist($newtoken);
                $entityManager->flush();
                return ["register" => true, "token" => md5($id), "username" => $username];
            } else {
                return ["register" => false, "token" => "not auth", "username" => "not auth"];
            }
        }
        catch (Exception $e){
            return ["register" => false, "token" => "not auth", "username" => "not auth"];
        }
    }
}
