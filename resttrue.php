<?php
    if (!empty($_COOKIE['violator'])){
        http_response_code(403);
        echo 'Вам доступ запрещен';
        die;
    }

?>