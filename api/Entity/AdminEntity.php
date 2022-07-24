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
    private int $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="admin_name",unique=true)
     * @var string
     */
    private string $admin_name;
    /**
     * @ORM\Column(type="string",nullable = true,name="password_hash")
     * @var string
     */
    private string $password_hash;

    public function getAdminName(): string
    {
        return $this->admin_name;
    }

    public function getPasswordHash(): string
    {
        return $this->password_hash;
    }
}