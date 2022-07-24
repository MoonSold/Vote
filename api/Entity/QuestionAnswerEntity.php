<?php

namespace Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="question_answer")
 */
class QuestionAnswerEntity
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer",name = "id")
     * @ORM\GeneratedValue
     * @var integer
     */
    private int $id;
    /**
     * @ORM\OneToOne(targetEntity="UsersEntity")
     */
    private object $user;
    /**
     * @ORM\OneToOne(targetEntity="QuestionsEntity")
     */
    private object $question;
    /**
     * @ORM\Column(type="string",nullable = true,name="answer")
     */
    private string $answer;

    public function getAnswer(): string
    {
        return $this->answer;
    }

    public function setAnswer(string $answer): void
    {
        $this->answer = $answer;
    }
}