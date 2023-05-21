<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/user_logic.php'); 

class UserAction{


    public static function signUp(){

        // echo 'aaaaa';
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            return '';
        }

        if ($_POST['action'] !='signup'){
            return '';
        }

        $email = $_POST['email'];
        $full_name = $_POST['full_name'];
        $birth_date = $_POST['birth_date'];
        $gender_id = $_POST['gender'];
        $address = $_POST['address'];
        $interest = $_POST['interest'];
        $blood_type_id = $_POST['blood_type'];
        $factor_id = $_POST['factor'];
        $vk = $_POST['vk'];
        $password = $_POST['password'];

        // echo 'jdksfsdj';

        if($password != $_POST['password_confirm']){
            return 'Пароль и его подтверждения не равны';
        }
        
        
        $errors = UserLogic:: signUp($email,$full_name, $birth_date, $gender_id, $address, $interest, $blood_type_id, $factor_id, $vk, $password);
       
        if($errors == ''){
            UserLogic::login($email, $password);
            setcookie('auth_attempt', 0, time() +3600);
            header('Location: products.php');
        }

        // echo $errors;
        return $errors;
    }


    public static function login(){

        // echo 'adsadsasddsasda';

        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            return '';
        }

        if ($_POST['action'] !='login'){
            return '';
        }

        
        if(!key_exists('auth_attempt', $_COOKIE)){
            setcookie('auth_attempt', 0, time() + 3600);
            setcookie('auth_time', time(), time() + 3600);
        }

        $errors ='';
        if ($_COOKIE['auth_attempt'] >= 3){
            $errors.='Вы привысили ограничение попыток на подключение приходите через час';
        }


        $email = $_POST['email'];
        $password = $_POST['password'];

        if($errors!= ''){
            return $errors;
        }
        
        $errors .= UserLogic:: login($email, $password);
        echo 'error';
        echo $errors;

        if($errors == ''){
             echo 'xxxx';
             echo $_SERVER['DOCUMENT_ROOT'] . '/LR3/products.php';
             header('Location: products.php');
             die();
        }


        

        $cnt = $_COOKIE['auth_attempt'];

        setcookie('auth_attempt', $cnt + 1);

        
        // echo $cnt;

        return $errors;
    }

    public static function logout(){

        if( count($_GET) > 0 && key_exists('logout', $_GET)){          
            UserLogic::logout();
            header('Location: products.php');
            die();
        }
    }


}

?>