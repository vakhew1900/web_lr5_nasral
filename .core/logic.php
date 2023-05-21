<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/pdo.php");



/**
 * @param $pdo pdo,
 * @return $stocklist array of all stockllist 
 */



function findAllFrom($pdo, $table_name){

    $sql = 'select * from '.$table_name;

    $stmt = $pdo->query($sql);
    $List = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $List;

}




function findAllStocks($pdo)
{

    return findAllFrom($pdo, 'stocks');
}

function findElectronicByFilter($pdo)
{
    $sql = 'select el.name, el.description, el.cost, el.img_path, st.description as stock_description from  
    electronics as el
    inner join stocks as st
    on st.stock_id = el.stock_id';

    $arrBind = array();

    if (!key_exists('clearFilter', $_GET)) {


        $sql_word = [true => ' where ', false => ' and '];
        $is_first = true;

        $cnt = 0;

        if (key_exists('logout', $_GET)){
            $cnt++;
        }

        if (count($_GET) > $cnt) {
            if ($_GET['costFrom']) {
                $sql .= $sql_word[$is_first] . 'el.cost >= :costFrom';
                $arrBind['costFrom'] = $_GET['costFrom'];
                $is_first = false;
            }

            if ($_GET['costTo']) {
                $sql .= $sql_word[$is_first] . 'el.cost <= :costTo';
                $arrBind['costTo'] = $_GET['costTo'];
                $is_first = false;
            }

            if ($_GET['name']) {
                $pattern = '%' . $_GET['name'] . '%';
                $sql .= $sql_word[$is_first] . 'name LIKE :name';
                $arrBind['name'] = $pattern;
                $is_first = false;
            }


            if ($_GET['description']) {
                $pattern = '%' . $_GET['description'] . '%';
                // echo $pattern;
                $sql .= $sql_word[$is_first] . 'el.description LIKE :description';
                $arrBind['description'] = $pattern;
                $is_first = false;
            }


            if ($_GET['stock']) {
                // echo $_GET['stock'];
                $sql .= $sql_word[$is_first] . 'el.stock_id = :stock_id';
                $arrBind['stock_id'] = $_GET['stock'];
                $is_first = false;
            }
        }
    }

    // echo $sql;

    $stmt = $pdo->prepare($sql);
    $stmt->execute($arrBind);
    $electronicList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $electronicList;
}





function setValue(array &$arr, $key, $cancel_key){
    $res = '';

    if(!key_exists($cancel_key, $arr) && key_exists($key, $arr)){
        $res = htmlspecialchars($arr[$key]);
    }

    return $res;
}

function setSelectedOption(array &$arr, $key, $cancel_key, $current_id){

    $res = '';

    if( !key_exists($cancel_key, $arr) && key_exists($key, $arr) && $current_id == $arr[$key]){
        $res = 'selected';
        // echo $res;
    }

    return $res;
}


?>