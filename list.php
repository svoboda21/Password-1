<?php
    require_once 'function.php';
    if (empty($_SESSION['test'])||empty($_SESSION['passwordadmin'])){
        http_response_code(403);
        echo 'Вам доступ запрещен';
        die;
    }?>chess.json 
