<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="questions")
 */
class QuestionsEntity
{
    /**
     * @ORM\Id
     * @ORM\Id
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="question",unique=true)
     */
    private $question;
    /**
     * @ORM\ManyToOne(targetEntity="QuestionGroupEntity")
     */
    private $questiongroup;
    /**
     * @ORM\Column(type="string",nullable = true,name="answer")
     */
    private $answer;

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): void
    {
        $this->question = $question;
    }

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
    public function getQuestionGroup(): string
    {
        return $this->questiongroup;
    }

    public function setQuestionGroup($questiongroup): void
    {
        $this->questiongroup = $question;
    }
}