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
     * @ORM\ManyToOne(targetEntity="ChooseEntity")
     */
    private object $choose;
    /**
     * @ORM\ManyToOne(targetEntity="VoteGroupEntity")
     */
    private object $group;

    public function setUser($user): void
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setChoose($choose): void
    {
        $this->choose = $choose;
    }

    public function getChoose()
    {
        return $this->choose;
    }

    public function setGroup($group)
    {
        $this->group = $group;
    }
}