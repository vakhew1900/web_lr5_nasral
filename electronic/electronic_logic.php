<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/db.php'); 
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/electronic/electronic_table.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/stock/stock_logic.php');

class ElectronicLogic
{


    public static function create(string $name, int $stock_id, string $description, int $cost, string $img_path)
    {
        ElectronicTable::create($name, $stock_id, $description, $cost, $img_path);
        if($cost <= 0){
            return;
        }
    }

    public static function getAll()
    {
        return ElectronicTable::getAll();
       
    }

    public static function getById(int $id)
    {
        return ElectronicTable:: getById($id);

    }

    public static function update(int $id, string $name, int $stock_id, string $description,int $cost,string $img_path)
    {   
        $stock = StockLogic::getById($stock_id);

        if ($stock == null){
            return;
        }

        if($cost <= 0){
            return;
        }

        var_dump($stock_id);

        ElectronicTable::update($id, $name, $stock_id, $description, $cost, $img_path );
    }

    public static function delete(int $id){

        
        ElectronicTable::delete($id);
    }



}


?>