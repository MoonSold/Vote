<?php
if (isset($_GET['all_result'])) {
    die;
}
elseif ($_SESSION['all_result'] === true){
    require_once 'result.php';
    session_destroy();
    die;
}

require_once "front/admin.html";
