<?php

namespace service;

use Entity;

require_once dirname(__DIR__)."/config/bootstrap.php";

class GetTokenClass
{
    public static function getToken($user_id):string
    {
        global $entityManager;
        $token = $entityManager
            ->getRepository(Entity\TokensEntity::class)
            ->findOneBy(array('user_id' => $user_id))
            ->getToken();
        return $token;
    }
}