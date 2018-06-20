<?php
    session_start();
    $text="Получено в первом тесте $_SESSION[a] правильных ответов.";
    $text1="Получено во втором тесте $_SESSION[a] правильных ответов";
    $user= $_SESSION['name'];
    $image=imagecreatetruecolor(300,300);
    $textcolor=imagecolorallocate($image,9,15,90);
    $boxfile='Certif.png';
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
    imagettftext($imbox,50,00,280,240,$textcolor,$fontfile,$user);
    imagettftext($imbox,20,00,100,320,$textcolor,$fontfile,$text);
    imagettftext($imbox,20,00,100,400,$textcolor,$fontfile,$text1);
    header('content-type:image/png');
    imagepng($imbox);
    imagedestroy($imbox);




?>

