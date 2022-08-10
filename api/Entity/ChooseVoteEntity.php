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
<<<<<<< HEAD
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
=======
     * @ORM\ManyToOne(targetEntity="ChooseEntity")
     */
    private object $choose;
    /**
     * @ORM\ManyToOne(targetEntity="VoteGroupEntity")
     */
    private object $group;
>>>>>>> stage

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

<<<<<<< HEAD
    public function setElement($choose): void
=======
    public function setChoose($choose): void
>>>>>>> stage
    {
        $this->choose = $choose;
    }

<<<<<<< HEAD
    public function getElement():string
=======
    public function getChoose()
>>>>>>> stage
    {
        return $this->choose;
    }

<<<<<<< HEAD
    public function setGroup($group):void
    {
        $this->group = $group;
    }

    public function getGroup():string
    {
        return $this->group;
    }
=======
    public function setGroup($group)
    {
        $this->group = $group;
    }
>>>>>>> stage
}