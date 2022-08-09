<?php

namespace service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Entity;

class UserService
{

    private EntityManager $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Авторизация пользователя
     */
    public function authUser(string $login, string $password,bool $check):array
    {
        $_SESSION["check"]  = $check;
        $user = $this->entityManager->getRepository(Entity\UsersEntity::class)->findOneBy(array('login' => $login));
        if (md5($password) === $user->getPasswordHash()) {
            $_SESSION["username"] = $user->getUserName();
            $_SESSION["token"] = self::getToken($user->getLogin());
            $token = self::getToken($user->getLogin());
            return ["auth"=>true, "token" => $token, "username" => $_SESSION["username"]];
        }
        else {
            return ["auth"=> false];
        }
    }

    /**
     * Метод Регистрации пользователя
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function registerUser(string $login, string $password, string $username, bool $check):array
    {
        $_SESSION["check"]  = $check;
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

    /**
     * Валидатор
     */
    public static function validator(string $login, string $password,string $username):bool
    {
        return (preg_match("/^[a-zA-Z0-9-_]{5,20}$/i",$login)
            && preg_match("/^[a-zA-Z0-9-_#$^&*@!?]{5,20}$/i",$password)
            && preg_match("/^[а-яёА-ЯЁ]+$/u",$username));
    }

    /**
     * Метод Взятия всех групп для голосования с проверкой на то, чтобы пользователь не голосовал больше 1 раза
     */
    public function getVoteGroup(string $token):array
    {
        if($token !== '') {
            $user_id = $this->entityManager
                ->getRepository(Entity\TokensEntity::class)
                ->findOneBy(['hash_id' => $token])->getUserId();
            $user = $this->entityManager
                ->getRepository(Entity\UsersEntity::class)
                ->findOneBy(['id' => $user_id]);
            $all_result = $result = $this->entityManager->getRepository(Entity\ChooseVoteEntity::class)->findBy(["user" => $user]);
            $choose_vote_group = [];
            foreach ($all_result as $group) {
                $choose_vote_group[] = $group->getGroup();
            }
        }
        else{
            $choose_vote_group = [];
        }
        $all_vote_group = [];
        $vote_group = $this->entityManager->getRepository(Entity\VoteGroupEntity::class)->findAll();
        foreach($vote_group as $group){
            if (in_array($group->getGroupName(),$choose_vote_group)===false) {
                $all_vote_group[] = [$group->getId(), $group->getGroupName(), $group->getDescription()];
            }
        }
        if ($_SESSION["check"]===true){
            $all_vote_group[] = [$_SESSION["check"],$_SESSION["token"],$_SESSION["username"]];
        }
        else{
            $all_vote_group[] = [];
        }
        return $all_vote_group;
    }

    /**
     * Получение токена юзера по id
     */
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

    /**
     * Получение списка кандидатов по id группы
     */
    public function getVoteElement(int $id):array
    {
        $all_question = [];
        $group = $this->entityManager
            ->getRepository(Entity\VoteGroupEntity::class)
            ->findOneBy(['id'=>$id]);
        $question = $this->entityManager
            ->getRepository(Entity\VoteElementEntity::class)
            ->findBy(['vote_group'=>$group]);

        foreach ($question as $q){
            $all_question[] = [$q->getId(),$q->getVoteElement()];
        }
        return $all_question;
    }

    /**
     * Отправка результата
     * @throws OptimisticLockException
     * @throws ORMException
     */
    public function setResult(int $element_id, string $user_token):bool
    {
        $element = $this->entityManager
            ->getRepository(Entity\VoteElementEntity::class)
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
        $new_result->setElement($element[0]->getVoteElement());
        $new_result->setGroup($group->getGroupName());
        $this->entityManager->persist($new_result);
        $this->entityManager->flush();
        return true;
    }
}