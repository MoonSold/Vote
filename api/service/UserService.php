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
                $new_user = new Entity\UsersEntity();
                $password = md5($password);
                $new_user->setLogin($login);
                $new_user->setPasswordHash($password);
                $new_user->setUserName($username);
                $this->entityManager->persist($new_user);
                $this->entityManager->flush();
                $id = $this->entityManager
                    ->getRepository(Entity\UsersEntity::class)
                    ->findOneBy(array('login' => $login))
                    ->getId();
                $new_token = new Entity\TokensEntity();
                $new_token->setUserId($id);
                $new_token->setToken(md5($id));
                $this->entityManager->persist($new_token);
                $this->entityManager->flush();
                $_SESSION["token"] = self::getToken($login);
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
        $vote_group = $this->entityManager->getRepository(Entity\VoteGroupEntity::class)->findAll();
        foreach($vote_group as $group){
            $all_vote_group[] = [$group->getId(),$group->getGroupName(),$group->getDescription()];
        }
        if ($_SESSION["check"]){
            $all_vote_group[] = [$_SESSION["check"],$_SESSION["token"],$_SESSION["username"]];
        }
        else{
            $all_vote_group[] = [];
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

    public function getVoteElement(int $id):array
    {
        $all_question = [];
        try{
            $group = $this->entityManager
                ->getRepository(Entity\VoteGroupEntity::class)
                ->findOneBy(['id'=>$id]);

            $question = $this->entityManager
                ->getRepository(Entity\ChooseEntity::class)
                ->findBy(['vote_group'=>$group]);

            foreach ($question as $q){
                $all_question[] = [$q->getId(),$q->getVoteElement()];
            }
        }
        catch (OptimisticLockException $e){
            echo $e;
        }
        return $all_question;
    }

    public function setResult(int $element_id,string $user_token):bool
    {
        register_shutdown_function(function (){
            var_dump(error_get_last());
            die;
        });
        $element = $this->entityManager
            ->getRepository(Entity\ChooseEntity::class)
            ->findBy(['id'=>$element_id]);
        $group = $element[0]->getVoteGroup();
        $user_id = $this->entityManager
             ->getRepository(Entity\TokensEntity::class)
             ->findOneBy(['hash_id'=>$user_token])->getUserId();
        $user = $this->entityManager
           ->getRepository(Entity\UsersEntity::class)
           ->findOneBy(['id'=>$user_id]);
        $new_result = new Entity\ChooseVoteEntity();
        $new_result->setUser($user);
        $new_result->setChoose($element[0]);
        $new_result->setGroup($group);
        $this->entityManager->persist($new_result);
        $this->entityManager->flush();
        return true;
    }

    public function Exit(): bool
    {
        session_destroy();
        return true;
    }
}