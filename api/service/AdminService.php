<?php

namespace service;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\OptimisticLockException;
use Entity;

class AdminService
{
    private EntityManager $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function authAdmin(string $login, string $password):array
    {
        register_shutdown_function(function () {
            var_dump(error_get_last());
            die;
        });
        $admin = $this->entityManager->getRepository(Entity\AdminEntity::class)->findOneBy(array('name' => $login));
        if (md5($password) == $admin->getPasswordHash()) {
            $_SESSION['auth'] = true;
            return ["auth"=>true];
        }
        else {
            return ["auth"=> false];
        }
    }

    public function getVoteGroup():array
    {
        $all_vote_group = [];
        $vote_group = $this->entityManager->getRepository(Entity\VoteGroupEntity::class)->findAll();
        foreach($vote_group as $group){
            $all_vote_group[] = [$group->getId(),$group->getGroupName(),$group->getDescription()];
        }
        return $all_vote_group;
    }

    public function deleteVoteGroup(int $id):bool
    {
        $vote_group = $this->entityManager->getRepository(Entity\VoteGroupEntity::class)->findOneBy(['id'=>$id]);
        $all_question = [];
        $group = $this->entityManager
            ->getRepository(Entity\VoteGroupEntity::class)
            ->findOneBy(['id'=>$id]);
        $question = $this->entityManager
            ->getRepository(Entity\VoteElementEntity::class)
            ->findBy(['vote_group'=>$group]);
        foreach ($question as $q){
                $this->entityManager->remove($q);
            }
        $this->entityManager->remove($vote_group);
        $this->entityManager->flush();
        return true;
    }

    public function updateVoteGroup(int $id, string $group_name, string $description): bool
    {
        register_shutdown_function(function () {
            var_dump(error_get_last());
            die;
        });
        $vote_group = $this->entityManager->getRepository(Entity\VoteGroupEntity::class)->findOneBy(['id'=>$id]);
        $vote_group->setGroupName($group_name);
        $vote_group->setDescription($description);
        $this->entityManager->flush();
        return true;
    }

    public function addVoteGroup(string $group_name, string $description): bool
    {
        $vote_group = new Entity\VoteGroupEntity();
        $vote_group->setGroupName($group_name);
        $vote_group->setDescription($description);
        $this->entityManager->persist($vote_group);
        $this->entityManager->flush();
        return true;
    }

    public function getVoteElement(int $id):array
    {
        $all_question = [];
            $group = $this->entityManager
                ->getRepository(Entity\VoteGroupEntity::class)
                ->findOneBy(['id'=>$id]);
            $question = $this->entityManager
                ->getRepository(Entity\VoteElementEntity::class)
                ->findBy(['vote_group'=>$group]);
            foreach ($question as $q) {
                $all_question[] = [$q->getId(), $q->getVoteElement()];
            }
        return $all_question;
    }

    public function addVoteElement(int $id,string $element_name):bool
    {
        register_shutdown_function(function () {
            var_dump(error_get_last());
            die;
        });
        $element = new Entity\VoteElementEntity();
        $group = $this->entityManager
            ->getRepository(Entity\VoteGroupEntity::class)
            ->findOneBy(['id'=>$id]);
        $element->setVoteElement($element_name);
        $element->setVoteGroup($group);
        $this->entityManager->persist($element);
        $this->entityManager->flush();
        return true;
    }

    public function deleteVoteElement(int $id):bool
    {
        register_shutdown_function(function () {
            var_dump(error_get_last());
            die;
        });
        $vote_group = $this->entityManager->getRepository(Entity\VoteElementEntity::class)->findOneBy(['id'=>$id]);
        $this->entityManager->remove($vote_group);
        $this->entityManager->flush();
        return true;
    }
    public function getResult():array
    {
        register_shutdown_function(function () {
            var_dump(error_get_last());
            die;
        });
        $all_result = [];
        $result = $this->entityManager->getRepository(Entity\ChooseVoteEntity::class)->findAll();
        foreach ($result as $res){
            $all_result[] = [$res->getUser()->getLogin(),$res->getGroup(),$res->getElement()];
        };
        return $all_result;
    }
}