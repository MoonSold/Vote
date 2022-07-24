<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tokens")
 */
class TokensEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="integer",nullable = true,name="user_id",unique=true)
     * @var integer
     */
    private int $user_id;
    /**
     * @ORM\Column(type="string",nullable = true,name="token")
     * @var string
     */
    private string $hash_id;

    public function getUserId(): string
    {
        return $this->user_id;
    }

    public function setUserId(string $user_id): void
    {
        $this->user_id = $user_id;
    }

    public function getToken(): string
    {
        return $this->hash_id;
    }

    public function setToken(string $hash_id): void
    {
        $this->hash_id = $hash_id;
    }
}