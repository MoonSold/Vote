<?php

namespace Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="vote_element")
 */
class VoteElementEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="vote_element",unique=true)
     */
    private string $vote_element;
    /**
     * @ORM\ManyToOne(targetEntity="VoteGroupEntity",inversedBy="vote")
     */
    public VoteGroupEntity $vote_group;

    public function getId():int
    {
        return $this->id;
    }

    public function getVoteElement(): string
    {
        return $this->vote_element;
    }

    public function setVoteElement(string $vote_element): void
    {
        $this->vote_element = $vote_element;
    }

    public function getVoteGroup()
    {
        return $this->vote_group;
    }

    public function setVoteGroup($vote_group): void
    {
        $this->vote_group = $vote_group;
    }
}