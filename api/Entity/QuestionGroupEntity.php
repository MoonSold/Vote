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
     * @ORM\OneToMany(targetEntity="QuestionGroupEntity",mappedBy="question")
     */
    private object $questions;

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