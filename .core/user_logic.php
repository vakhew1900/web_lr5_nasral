<?php 

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/user_table.php'); 


class UserLogic{

    public static function isAuthorized():bool
    {
        // echo $_SESSION['user_id'];
        return key_exists('user_id', $_SESSION) && intval($_SESSION['user_id']) >0;
    }

    public static function current()
    {
        if (!static:: isAuthorized()){
            return null;
        }
        
        return UserTable :: getById($_SESSION['user_id']);
    }

    public static function login($email, $password){
        

        if(static:: isAuthorized()){
            return "уже авторизован";
        }

        $user = UserTable::getByEmail($email);

        // echo $user['email'];

        if($user === null) {
            return "пользователя с таким логином не существует";
        }
            
        // echo $password;
        // echo password_verify($password, $user['password']);
        // echo password_hash($password, PASSWORD_DEFAULT);
        if(password_verify($password, $user['password']) == false){
            return "неверный указан пароль";
        }

        $_SESSION['user_id'] = $user['user_id'];
       // echo 'i l i';
        return '';
    }


    public static function logout(){

        if(static :: isAuthorized()){
        unset($_SESSION['user_id']);
        }
    }

    private static function match_password($password){

        $regex= "/^[a-zA-Z0-9\(\)\+\*\/\.\-_ ]{7,30}$/";

        if(preg_match($regex, $password) == 0){
            return 'длина пароля должна быть в диапозоне от 7 до 30 символов. Запрещено использовать русские символы';
        }

        $regex = "/^.*[A-Z]+.*$/";

        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать заглавные латинские буквы';
        }


        $regex = "/^.*[a-z]+.*$/";

        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать маленькие латинские буквы';
        }
        
     

        $regex = "/^.*[0-9]+.*$/";


        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать цифры';
        }

        $regex = "/^.*[\(\)\+\*\/\.]+.*$/";

        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать cпецсимволы';
        }

        $regex = "/^.*[\-]+.*$/";

        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать тире';
        }

        $regex = "/^.*[_]+.*$/";

        if(preg_match($regex, $password)== 0){
            return 'пароль обязан содержать подчеркивание';
        }

        $regex = "/^.*[ ]+.*$/";

        if(preg_match($regex, $password) == 0){
            return 'пароль обязан содержать пробел';
        }


        return '';
    }

    public static function signUp(string $email, string $full_name, $birth_date, int $gender_id, string $address, string $interest, int $blood_type_id, int $factor_id,
    string $vk, string $password){

        // всякие проверочки

        $user = UserTable :: getByEmail($email);

        if ($user !== null){
            return 'Пользователь с такой почтой  уже существует';
        }
        

        $reg_exp_vk = "/^https:\/\/vk.com\/(id[1-9][\d]{0,7})$/";

        if(preg_match($reg_exp_vk, $vk)== 0){
            return 'неправильно указан адрес вк страницы';
        }

        $regex_email = '/^\\S+@\\S+\\.\\S+$/'; 

        if(preg_match($regex_email, $email) == 0){
          return 'неправильно указана почта';  
        }

        $password_error = static::match_password($password);

        if ($password_error != ''){
            echo $password_error;
            return $password_error;
        }

        // ---------

        try{
        UserTable:: create($email, $full_name, $birth_date, $gender_id, $address, $interest, $blood_type_id, $factor_id, $vk, password_hash($password, PASSWORD_DEFAULT));
        return '';
        }
        catch(PDOException $e){
            return $e->getMessage();
        }
        
    }
}

    // UserLogic ::login('1', '1')
?>