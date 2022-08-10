<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * @ORM\Entity
 * @ORM\Table(name="vote_group")
 */
class VoteGroupEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="group_name",unique=true)
     * @var string
     */
    private string $group_name;
    /**
     * @ORM\Column(type="string",nullable = true,name="description",unique=true)
     * @var string
     */
    private string $description;
    /**
     * @var Collection
<<<<<<< HEAD
     * @ORM\OneToMany(targetEntity="VoteElementEntity",mappedBy="vote_group",cascade={"remove"})
=======
     * @ORM\OneToMany(targetEntity="ChooseEntity",mappedBy="vote_group")
>>>>>>> stage
     */
    private $vote;

    public function getId():int
    {
        return $this->id;
    }

    public function getGroupName(): string
    {
        return $this->group_name;
    }

    public function setGroupName(string $group_name): void
    {
        $this->group_name = $group_name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}