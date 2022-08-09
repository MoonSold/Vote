<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class UsersEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="user_name",unique=true)
     * @var string
     */
    private string $user_name;
    /**
     * @ORM\Column(type="string",nullable = true,name="password_hash")
     * @var string
     */
    private string $password_hash;
    /**
     * @ORM\Column(type="string",nullable = true,name="login",unique=true)
     * @var string
     */
    private string $login;

    public function getId(): int
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->user_name;
    }

    public function setUserName(string $user_name): void
    {
        $this->user_name = $user_name;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }

    public function setPasswordHash(string $password_hash): void
    {
        $this->password_hash = $password_hash;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function setLogin(string $login): void
    {
        $this->login = $login;
    }
}