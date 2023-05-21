<?php 
session_start();
setcookie('auth_attempt', 0, time() +3600);
// if(!key_exists('user_id', $_SESSION)){
//     $_SESSION['user_id'] = -1;
// }

?>