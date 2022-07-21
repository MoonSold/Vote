<?php

require_once 'api/vendor/autoload.php';
require_once 'api/controller/controller.php';

register_shutdown_function(function () {
    var_dump(error_get_last());
    die;
});

setcookie('token','not auth',time()-3600);
setcookie('username','not auth',time()-3600);
session_start();

if (isset($_POST)){
    if(count($_POST) == 2){
        controllerFunction('auth');
        header('Location: ');
    }
    else{
        controllerFunction('register');
        header('Location: ');
    }
}

require_once 'front/MainPage.html';


