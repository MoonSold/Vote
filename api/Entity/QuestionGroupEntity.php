<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questionsgroup")
 */
class QuestionGroupEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="groupname",unique=true)
     * @var string
     */
    private $groupname;
    /**
     * @ORM\OneToMany(targetEntity="QuestionGroupEntity",mappedBy="question")
     */
    private $questions;


    public function getGroupName(): string
    {
        return $this->groupname;
    }

    public function setGroupName(string $groupname): void
    {
        $this->groupname = $groupname;
    }

}