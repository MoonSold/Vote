<?php

require_once 'api/vendor/autoload.php';
require_once 'api/controller/Controller.php';

register_shutdown_function(function () {
    var_dump(error_get_last());
    die;
});

session_start();
Controller::controllerGetQuestionGroup();
try {
    if (isset($_POST)) {
        if ($_POST["check"]==="save_user"){
            $_SESSION["check"] = "save_user";
            if (count($_POST) === 3){
                Controller::controllerAuthFunction($_POST["login"], $_POST["password"]);
            }
            elseif(count($_POST) === 4){
                Controller::controllerRegistrationFunction($_POST["login"], $_POST["password"], $_POST["username"]);
            }
            else{
                setcookie('token','not auth',time());
                setcookie('username','not auth',time());
                session_destroy();
            }
        }
        elseif ($_SESSION["check"] === "save_user"){
            if ($_POST["exit"] === 'true') {
                setcookie('token', 'not auth', time());
                setcookie('username', 'not auth', time());
                session_destroy();
            }
            else{
                setcookie("token", Controller::getTokenForCookie(),time()+604800);
                setcookie("username",$_SESSION['username'],time()+604800);
            }
        }
        else {
            switch(count($_POST)){
                case 2:
                    session_start();
                    Controller::controllerAuthFunction($_POST["login"], $_POST["password"]);
                    break;
                case 3:
                    session_start();
                    Controller::controllerRegistrationFunction($_POST["login"], $_POST["password"], $_POST["username"]);
                    break;
                default:
                    setcookie('token','not auth',time());
                    setcookie('username','not auth',time());
                    break;
            }
        }
    }
}
catch (Exception $e){
    echo $e;
}

require_once 'front/MainPage.html';

