<?php
if (isset($_REQUEST['result'])) {
    setcookie('result','get',time() + 2);
}
elseif ($_COOKIE['result'] === 'get'){
    unset($_COOKIE['result']);
    require_once 'api/pdf.php';
}
else {
    require_once "front/admin.html";
}
