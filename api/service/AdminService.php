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
        var_dump($admin);
        if (md5($password) == $admin->getPasswordHash()) {
            return ["auth"=>true];
        }
        else {
            return ["auth"=> false];
        }
    }
}