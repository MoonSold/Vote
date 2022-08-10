<?php

namespace controller;

use Doctrine\ORM\EntityManager;
use http\Client\Request;

class AdminController
{

    private $adminService;

    public function __construct($adminService){
        $this->adminService = $adminService;
    }

    public function controllerAdminAuthFunction(array $request): array
    {
        return $this->adminService->authAdmin($request['login'],$request['password']);
    }

<<<<<<< HEAD
    public function controllerGetVoteGroup(): array
    {
        return $this->adminService->getVoteGroup();
    }

    public function controllerAdminDeleteVoteGroup(array $request):bool
    {
        return $this->adminService->deleteVoteGroup($request['id']);
    }

    public function controllerAdminUpdateVoteGroup(array $request):bool
    {
        return $this->adminService->updateVoteGroup($request['id'],$request['group_name'],$request['description']);
    }

    public function controllerAdminAddVoteGroup(array $request):bool
    {
        return $this->adminService->addVoteGroup($request['group_name'],$request['description']);
    }

    public function controllerAdminGetVoteElement(array $request):array
    {
        return $this->adminService->getVoteElement($request['id']);
    }

    public function controllerAdminDeleteVoteElement(array $request):bool
    {
        return $this->adminService->deleteVoteElement($request['id']);
    }

    public function controllerAdminAddVoteElement(array $request):bool
    {
        var_dump($request['group_id']);
        return $this->adminService->addVoteElement($request['group_id'],$request['element']);
    }

    public function controllerAdminGetResult():array
    {
        return $this->adminService->getResult();
=======
    public function controllerGetAllQuestionsFunction(int $idVote): array
    {
        return $this->adminService->getAllQuestions($idVote);
    }

    public function controllerGetAllQuestionGroupFunction(): array
    {
        return $this->adminService->getAllQuestionsGroup();
    }

    public function controllerGetAllResultFunction(): array
    {
        return $this->adminService->getAllResult();
    }

    public function controllerPostNewQuestionGroupFunction()
    {
        return $this->adminService->postQuestionsGroup();
    }

    public function controllerPostNewQuestionFunction(int $id)
    {
        return $this->adminService->postQuestion($id);
    }

    public function controllerUpdateNameQuestionGroupFunction(int $id){
        return $this->adminService->updateQuestionGroup($id);
    }

    public function controllerUpdateQuestionFunction(int $id){
        return $this->adminService->updateQuestion($id);
    }

    public function controllerDeleteQuestionGroupFunction(int $id){
        return $this->adminService->deleteQuestionGroup($id);
    }

    public function controllerDeleteQuestionFunction(int $id){
        return $this->adminService->deleteeQuestion($id);
>>>>>>> stage
    }
}