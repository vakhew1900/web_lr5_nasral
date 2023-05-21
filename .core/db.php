<?php

 class Database
 {
    private static $instance = null;
    private  $connection = null;

    protected function __construct(){


        $db_name = 'electronic_shop';
         $host = 'localhost';
        $user = 'root';
        $password = '';
        $this->connection = new PDO("mysql:dbname=$db_name;host=$host", $user, $password);
    
    }

    protected function __clone(){

    }

    public function __wakeup(){
        throw new \BadFunctionCallException('Unnable to deserialize');
    }

    public static function getInstance(): Database
    {
        if (self::$instance === null){
            self:: $instance = new static();
        }

        return self :: $instance;
    }

    public static function connection() : \PDO
    {
        return static:: getInstance()->connection;
    }
    public static function prepare($statement): \PDOStatement
    {
        return static :: connection()->prepare($statement);
    }
}
?>