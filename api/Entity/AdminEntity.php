<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
/**
 * @ORM\Entity
 * @ORM\Table(name="admin")
 */
class AdminEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="adminname",unique=true)
     * @var string
     */
    private $adminname;
    /**
     * @ORM\Column(type="string",nullable = true,name="passwordhash")
     * @var string
     */
    private $passwordhash;


    public function getAdminName(): string
    {
        return $this->adminname;
    }

    public function getPasswordHash(): string
    {
        return $this->passwordhash;
    }
}