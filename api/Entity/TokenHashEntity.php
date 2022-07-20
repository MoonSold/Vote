<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tokens")
 */
class TokenHashEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="integer",nullable = true,name="userid",unique=true)
     * @var string
     */
    private $userid;
    /**
     * @ORM\Column(type="string",nullable = true,name="token")
     * @var string
     */
    private $hashId;

    public function getUserId(): string
    {
        return $this->userid;
    }

    public function setUserId(string $userid): void
    {
        $this->userid = $userid;
    }

    public function getToken(): string
    {
        return $this->hashId;
    }

    public function setToken(string $hashId): void
    {
        $this->hashId = $hashId;
    }
}