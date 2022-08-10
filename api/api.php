<?php

require_once 'vendor/autoload.php';
require_once "bootstrap.php";

use controller;
use service;
<<<<<<< HEAD

=======
>>>>>>> stage
$phpInput = json_decode(file_get_contents("php://input"), true);
$_REQUEST = array_merge($_REQUEST, $phpInput === null ? [] : $phpInput);

$service = new service\UserService($entityManager);
$userController = new controller\UserController($service);
if ($_REQUEST["actor"] === "user"){
<<<<<<< HEAD
    session_start();
=======
>>>>>>> stage
    $service = new service\UserService($entityManager);
    $userController = new controller\UserController($service);
    $response = $userController->{$_REQUEST['method']}($_REQUEST);
    if (!empty($response)) {
        echo json_encode($response);
        }
}
<<<<<<< HEAD
elseif($_REQUEST["actor"] === "admin") {
=======
else{
>>>>>>> stage
    $service = new service\AdminService($entityManager);
    $adminController = new controller\AdminController($service);
    $response = $adminController->{$_REQUEST['method']}($_REQUEST);
    if (!empty($response)) {
        echo json_encode($response);
    }
}




