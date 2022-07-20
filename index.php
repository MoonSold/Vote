<?php

//register_shutdown_function(function () {
//    var_dump(error_get_last());
//    die;
//});

setcookie('token','not authorized');
setcookie('username','not authorized');
session_start();

require_once 'api/vendor/autoload.php';
require_once 'front/MainPage.html';
require_once 'api/controller/controller.php';

if (isset($_POST)){
    if (count($_POST) == 2){
        controllerFunction('auth');
    }
    else{
        controllerFunction('register');
    }
}



