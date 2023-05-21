<?php
  
  require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/db.php'); 
  
  
  class UserTable{

    public static function create(string $email, string $full_name, $birth_date, int $gender_id, string $address, string $interest, int $blood_type_id, int $factor_id,
    string $vk, string $password){

            $sql = 'insert into `users`(email, full_name, birth_date, gender_id, address, interest, blood_type_id, password, factor_id, vk)
            values(:email, :full_name, :birth_date, :gender_id,:address, :interest,:blood_type_id, :password, :factor_id, :vk);';
            $query = Database::prepare($sql);
           
            $query->bindValue(':email', $email);
            $query->bindValue(':full_name', $full_name);
            $query->bindValue(':birth_date', $birth_date);
            $query->bindValue(':gender_id', $gender_id);
            $query->bindValue(':address', $address);
            $query->bindValue(':interest', $interest);
            $query->bindValue(':birth_date', $birth_date);
            $query->bindValue(':blood_type_id', $blood_type_id);
            $query->bindValue(':password', $password);
            $query->bindValue(':factor_id', $factor_id);
            $query->bindValue(':vk', $vk);
            
            if(!$query->execute()){
                throw new PDOException('User Adding Error');
            }
    }


    private static function getBy(string $columnName, $value){

        $sql = 'select * from users where '.$columnName . '= :value limit 1';
        $query = Database::prepare($sql);
        $query->bindValue(':value', $value);
        $query->execute();

        $users  = $query->fetchAll();

        if(!count($users)){
            return null;
        }

        return $users[0];

    }
    public static function getByEmail(string $email){

        return static::getBy('email', $email);
    }

    
    public static function getByPassword(string $password){

        return static::getBy('password', $password);
    }

    public static function getById(int $id){
        return static :: getBy('user_id', $id);
    }
  } 

//   echo UserTable::getByEmail('1')['user_id'];

//  $dte = date ('Y-m-d');
  
//   UserTable:: create('1', '1', $dte, 1, '1', '1', 1, 1, '11', '1');

?>

