<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="choose_vote")
 */
class ChooseVoteEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\ManyToOne(targetEntity="UsersEntity")
     */
    private object $user;
    /**
     * @ORM\Column(type="string",nullable = true,name="choose")
     * @var string
     */
    private string $choose;
    /**
     * @ORM\Column(type="string",nullable = true,name="vote_group")
     * @var string
     */
    private string $group;

    public function getId():int
    {
        return $this->id;
    }

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setElement($choose): void
    {
        $this->choose = $choose;
    }

    public function getElement():string
    {
        return $this->choose;
    }

    public function setGroup($group):void
    {
        $this->group = $group;
    }

    public function getGroup():string
    {
        return $this->group;
    }
}