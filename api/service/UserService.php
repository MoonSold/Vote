<?php

namespace service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Entity;

class UserService
{

    private EntityManager $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    //Авторизация Пользователя
    public function authUser(string $login, string $password):array
    {
            $user = $this->entityManager->getRepository(Entity\UsersEntity::class)->findOneBy(array('login' => $login));
            if (md5($password) == $user->getPasswordHash()) {
                $_SESSION["username"] = $user->getUserName();
                $_SESSION["token"] = self::getToken($user->getLogin());
                $token = self::getToken($user->getLogin());
                return ["auth"=>true, "token" => $token, "username" => $_SESSION["username"]];
            }
            else {
                return ["auth"=> false];
            }
    }

    //Регистрация Пользователя
    public function registerUser(string $login, string $password,string $username):array
    {
        try {
            $validation = self::validator($login, $password, $username);
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
                $_SESSION["token"] = self::getToken($login);;
                $_SESSION["username"] = $username;
                return ["register" => true, "token" => $_SESSION['token'], "username" => $username];
            } else {
                return ["register" => false];
            }
        }
        catch (OptimisticLockException $e){
            return ["register" => false];
        }
    }

    //Валидатор
    public static function validator(string $login, string $password,string $username):bool
    {
        return (preg_match("/^[a-zA-Z0-9-_]{5,20}$/i",$login)
            && preg_match("/^[a-zA-Z0-9-_#$^&*@!?]{5,20}$/i",$password)
            && preg_match("/^[а-яёА-ЯЁ]+$/u",$username));
    }

    //Вязтие всех групп голосований
    public function getVoteGroup():array
    {
        $all_vote_group = [];
        $vote_group = $this->entityManager->getRepository(Entity\QuestionGroupEntity::class)->findAll();
        foreach($vote_group as $group){
            $all_vote_group[$group->getGroupName()] = $group->getDescription();
        }
        return $all_vote_group;
    }

    //Получение Токена по id
    public function getToken(string $login):string
    {
        $id = $this->entityManager
            ->getRepository(Entity\UsersEntity::class)
            ->findOneBy(array('login' => $login))
            ->getId();
        return $this->entityManager
            ->getRepository(Entity\TokensEntity::class)
            ->findOneBy(array('user_id' => $id))
            ->getToken();
    }
}