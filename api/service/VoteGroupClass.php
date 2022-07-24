<?php

namespace service;

use Entity;

require_once dirname(__DIR__)."/config/bootstrap.php";

class VoteGroupClass
{
    public static function getVoteGroup():array
    {
        global $entityManager;
        $all_vote_group = [];
        $vote_group = $entityManager->getRepository(Entity\QuestionGroupEntity::class)->findAll();
        foreach($vote_group as $group){
            $all_vote_group[$group->getGroupName()] = $group->getDescription();
        }
        return $all_vote_group;
    }
}