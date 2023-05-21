<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/electronic/electronic_logic.php');

class ElectronicAction
{

    public static function create()
    {
        // echo 'aaaaa';
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'electronic_create') {
            return '';
        }

        $name = $_POST['name'];
        $cost = $_POST['cost'];
        $stock_id = $_POST['stock_id'];
        $description = $_POST['description'];


        echo "stock_id =" . $stock_id;


        $img_path = static::newFileName();

        if ($img_path != null) {
            ElectronicLogic::create($name, $stock_id, $description, $cost, $img_path);
        }


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
            return ElectronicLogic::getById($id);
        }

        return null;

    }

    public static function update()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'electronic_update') {
            return '';
        }


        if (key_exists('id', $_POST)) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $cost = $_POST['cost'];
            $stock_id = $_POST['stock_id'];
            $description = $_POST['description'];

            var_dump($_POST);
            echo "stock_id =" . $stock_id;

            
            $electronic = ElectronicLogic:: getById($id);

            if ($electronic == null){
                return;
            }

            $img_path = static::newFileName();
            
            if ($img_path == null){
                $img_path =  $electronic['img_path'];
            }
            else {
                $delete_img_path = $_SERVER['DOCUMENT_ROOT'] . '/LR5/images/'. $electronic['img_path'];
                if (file_exists($delete_img_path) && $electronic['img_path' != 'no_img.png']) {
                  //  echo 'xxxxxx';
                    unlink($delete_img_path);
                } 
                
            }
            
            var_dump($stock_id);
            ElectronicLogic::update($id, $name, $stock_id, $description, $cost, $img_path);

        }

       static::redirect();

    }

    public static function delete()
    {

        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            return '';
        }

        if ($_POST['action'] != 'electronic_delete') {
            return '';
        }

        if (key_exists('id', $_POST)) {

            $id = $_POST['id'];

            ElectronicLogic::delete($id);
            static::redirect();

        }

    }

    public static function redirect()
    {
        header('Location: read.php');
    }

    private static function newFileName()
    {

        // var_dump($_FILES);
        // echo php_ini_loaded_file();
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $allowedfileExtensions = array('jpg', 'png');
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        if (in_array($fileExtension, $allowedfileExtensions)) {
            $uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/LR5/images/';
            $dest_path = $uploadFileDir . $newFileName;
            echo $fileTmpPath . "   ";
            echo $dest_path;
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                //     echo "sdfdflshsfdgdfsljsfgds";
                return $newFileName;
            } else {
                //     echo "sdfknfsad;lbfadslkfdashbfdsjhfdsbf";
                return null;
            }


        }

    }

}

?>