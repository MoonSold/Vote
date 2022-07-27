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
        $server_response = $this->adminService->authAdmin($request['login'],$request['password']);
        if ($server_response["auth"] === true){
            setcookie("token", strval($server_response["token"]), time() + 3600);
            setcookie("username", strval($server_response["username"]), time() + 3600);
        }
        return $server_response;
    }

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
    }
}