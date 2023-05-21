<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/db.php'); 

class ElectronicTable
{


    public static function create(string $name, int $stock_id, string $description, int $cost, string $img_path)
    {

        $sql = 'INSERT INTO `electronics` ( `name`, `stock_id`, `description`, `cost`, `img_path`) 
        VALUES (:name, :stock_id, :description, :cost, :img_path);';

        $query = Database::prepare($sql);

        $query->bindValue(':name', $name);
        $query->bindValue(':stock_id', $stock_id);
        $query->bindValue(':description', $description);
        $query->bindValue(':cost', $cost);
        $query->bindValue(':img_path', $img_path);
    
        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }
    }

    public static function getAll()
    {

        $sql = 'select el.electronic_id, el.name, el.description, el.cost, el.img_path, st.description as stock_description from  
        electronics as el
        inner join stocks as st
        on st.stock_id = el.stock_id';
    
        $query = Database::prepare($sql);
        $query->execute();        
        $stockList = $query->fetchAll(PDO::FETCH_ASSOC);
        return $stockList;
    }

    public static function getById(int $id)
    {
        $sql = 'SELECT * FROM `electronics` WHERE electronic_id = :id';
        $query = Database::prepare($sql);

        $query->bindValue(':id', $id);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }

        $stock = $query->fetch();

        return $stock;

    }

    public static function update(int $id, string $name, int $stock_id,string $description,int $cost, string $img_path)
    {
        $sql = 'UPDATE `electronics` SET  `name` = :name, stock_id = :stock_id , description = :description, cost = :cost, img_path = :img_path WHERE electronic_id = :id;';

        $query = Database::prepare($sql);

        $query->bindValue(':id', $id);
        $query->bindValue(':name', $name);
        $query->bindValue(':stock_id', $stock_id);
        $query->bindValue(':description', $description);
        $query->bindValue(':cost', $cost);
        $query->bindValue(':img_path', $img_path);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }
    }

    public static function delete(int $id){

        $sql = "DELETE FROM `electronics` WHERE `electronic_id` = :id";
        
        $query = Database::prepare($sql);
        $query->bindValue(':id', $id);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }

    }


}
?>