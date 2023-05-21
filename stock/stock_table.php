<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/db.php'); 

class StockTable
{


    public static function create(string $description)
    {

        $sql = 'INSERT INTO `stocks` (description)
        VALUE(:description)';

        $query = Database::prepare($sql);

        $query->bindValue(':description', $description);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }
    }

    public static function getAll()
    {

        $sql = 'SELECT * FROM`stocks`';
        $query = Database::prepare($sql);
        $query->execute();        
        $stockList = $query->fetchAll(PDO::FETCH_ASSOC);
        return $stockList;
    }

    public static function getById(int $id)
    {
        $sql = 'SELECT * FROM `stocks` WHERE stock_id = :id';
        $query = Database::prepare($sql);

        $query->bindValue(':id', $id);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }

        $stock = $query->fetch();

        return $stock;

    }

    public static function update(int $id, string $description)
    {
        $sql = 'UPDATE `stocks` SET `description` = :description WHERE stock_id = :id;';

        $query = Database::prepare($sql);

        $query->bindValue(':id', $id);
        $query->bindValue(':description', $description);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }
    }

    public static function delete(int $id){

        $sql = "DELETE FROM `stocks` WHERE `stock_id` = :id";
        
        $query = Database::prepare($sql);
        $query->bindValue(':id', $id);

        if (!$query->execute()) {
            throw new PDOException('User Adding Error');
        }

    }


}
?>