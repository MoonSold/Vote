<?php



//setcookie('token','not authorized',time()+3600);
//setcookie('username','not authorized',time()+3600);
session_start();

require_once 'api/vendor/autoload.php';
require_once 'api/controller/controller.php';
require_once 'front/MainPage.html';

if (isset($_POST)){
    if (count($_POST) == 2){
        controllerFunction('auth');
    }
    else{
        controllerFunction('register');
    }
}



