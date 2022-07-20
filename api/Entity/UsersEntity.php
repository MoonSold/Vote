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
    private $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="username",unique=true)
     * @var string
     */
    private $username;
    /**
     * @ORM\Column(type="string",nullable = true,name="passwordhash")
     * @var string
     */
    private $passwordhash;
    /**
     * @ORM\Column(type="string",nullable = true,name="login",unique=true)
     * @var string
     */
    private $login;

    public function getId(): string
    {
        return $this->id;
    }

    public function getUserName(): string
    {
        return $this->username;
    }

    public function setUserName(string $username): void
    {
        $this->username = $username;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordhash;
    }

    public function setPasswordHash(string $passwordhash): void
    {
        $this->passwordhash = $passwordhash;
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