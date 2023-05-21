<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/session.php');
function func($file){

    
    
    $file = $_SERVER['DOCUMENT_ROOT'].urldecode($file);
    // echo $file;
    $type = 'image/jpeg';

    if(str_ends_with($file, 'webp')){
        $type = 'image/webp';
    }

    if(str_ends_with($file, 'png')){
        $type = 'image/png';
    }

   header('Content-Type:'.$type);
   header('Content-Length: ' . filesize($file));
   readfile($file);
}

// echo 'ffffff';

if ($_GET['file'] && $_SESSION['user_id']){

    func($_GET['file']);
}
else {
    header('Location: ../login.php');
}


?>