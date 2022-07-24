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
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\Column(type="string",nullable = true,name="question",unique=true)
     */
    private string $question;
    /**
     * @ORM\ManyToOne(targetEntity="QuestionGroupEntity")
     */
    private object $question_group;
    /**
     * @ORM\Column(type="string",nullable = true,name="answer")
     */
    private string $answer;

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
        return $this->question_group;
    }

    public function setQuestionGroup($question_group): void
    {
        $this->question_group = $question_group;
    }
}