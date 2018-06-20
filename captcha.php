<?php
    session_start();
    $random = rand(1000, 9999);
    $_SESSION['random'] = $random;
    $image=imagecreatetruecolor(100,100);
    $textcolor=imagecolorallocate($image,9,15,5);
    $boxfile='certif1.png';
    if(!file_exists($boxfile)){
        echo 'Файл не найден';
        exit;
    }
    $imbox=imagecreatefrompng($boxfile);
    $fontfile=__DIR__.'\arial.ttf';
    if(!file_exists($fontfile)){
        echo 'Файл шрифта не найден';
        exit;
    }
    imagettftext($imbox,20,00,60,70,$textcolor,$fontfile,$random);
    header('content-type:image/png');
    imagepng($imbox);
    imagedestroy($imbox);


?>