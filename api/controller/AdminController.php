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
    }
}