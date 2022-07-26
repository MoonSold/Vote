<?php

require_once 'vendor/autoload.php';
require_once "bootstrap.php";

session_start();
use controller;
use service;

$phpInput = json_decode(file_get_contents("php://input"), true);
$_REQUEST = array_merge($_REQUEST, $phpInput === null ? [] : $phpInput);

$service = new service\UserService($entityManager);
$userController = new controller\UserController($service);
var_dump($_GET);
if ($_REQUEST["actor"] == "user"){
    $service = new service\UserService($entityManager);
    $userController = new controller\UserController($service);
    $response = $userController->{$_REQUEST['method']}($_REQUEST);
    if (!empty($response)) {
        echo json_encode($response);
    }
}
//echo json_encode($userController->controllerGetQuestionGroup());
//
//if ($_REQUEST["check"] === 'user') {
//    if (count($_REQUEST) === 4) {
//        $response = $userController->controllerAuthFunction($_REQUEST, $save = true);
//    } elseif (count($_REQUEST) == 5) {
//        $response = $userController->controllerRegistrationFunction($_REQUEST, $save = true);
//    } else {
//        setcookie("token", '', time());
//        setcookie("username", '', time());
//        session_destroy();
//    }
//}
//else {
//    if (count($_REQUEST) === 3) {
//        $response = $userController->controllerAuthFunction($_REQUEST);
//    }
//    elseif (count($_REQUEST) == 4) {
//        $response = $userController->controllerRegistrationFunction($_REQUEST);
//    }
//    else {
//        setcookie("token", '', time());
//        setcookie("username", '', time());
//        session_destroy();
//    }
//}
    if (!empty($response)) {
        echo json_encode($response);
    }



