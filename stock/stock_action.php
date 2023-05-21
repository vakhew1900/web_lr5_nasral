<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/stock/stock_logic.php');

class StockAction
{

    public static function create()
    {
        // echo 'aaaaa';
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'stock_create') {
            return '';
        }

        $description = $_POST['description'];


        StockLogic::create($description);
        
       // header('Location: ' . $_SERVER['DOCUMENT_ROOT'] . '/LR5/view/read.php');
        static::redirect();
    }

    public static function getAll()
    {

        return StockLogic::getAll();
    }

    public static function getById()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'GET') {
            return '';
        }

        if (key_exists('id', $_GET)) {

            $id = $_GET['id'];
            return StockLogic::getById($id);
        }

        return null;

    }

    public static function update()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'stock_update') {
            return '';
        }


        if (key_exists('id', $_POST)) {
            $id = $_POST['id'];
            $description = $_POST['description'];

            StockLogic::update($id, $description);
        }
        
          static::redirect();

    }

    public static function delete()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'stock_delete') {
            return '';
        }

        if (key_exists('id', $_POST)) {

            $id = $_POST['id'];

            StockLogic::delete($id);
            static :: redirect();

        }

    }

    public static function redirect()
    {
       header('Location: read.php');
    }

}

?>