<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/stock/stock_table.php');

class StockLogic
{

    public static function create(string $description)
    {

        StockTable::create($description);
    }

    public static function getAll()
    {

        return StockTable::getAll();
    }

    public static function getById(int $id)
    {
        return StockTable::getById($id);

    }

    public static function update(int $id, string $description)
    {
        StockTable::update($id, $description);
    }

    public static function delete(int $id)
    {

        StockTable::delete($id);

    }

}

?>