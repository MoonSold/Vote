<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questionsanswer")
 */
class QuestionAnswerEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\OneToOne(targetEntity="UsersEntity")
     */
    private $user;
    /**
     * @ORM\OneToOne(targetEntity="QuestionsEntity")
     */
    private $question;
    /**
     * @ORM\Column(type="string",nullable = true,name="answer")
     */
    private $answer;

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
}