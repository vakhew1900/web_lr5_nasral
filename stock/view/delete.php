
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/stock/stock_action.php');

$stock = null;

if (key_exists('id', $_GET)) {

$stock = StockAction::getById();

} else if (key_exists('id', $_POST)) {
    echo "djfhisdf";
    StockAction::delete();
} else {
    StockAction::redirect();
}

?>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');


?>


        
        <h1>Скидки</h1>
        
     <div class="container">
        <form action="/LR5/stock/view/delete.php" method="POST">
            <div class="form-group">
                <!-- <label for="name">Описание</label> -->
                <input type="hidden" name="action" value="stock_delete">
                <input type="hidden" name="id" value = <?= $_GET['id'] ?>>


                <br>
                <div class="container"> Вы правда хотите удалить данную запись?</div>
                <br>
                <br>
                <button type="submit" class=" btn btn-block btn-danger">
                  Да
                </button>

                <a href = "/LR5/stock/view/read.php" class=" btn btn-block btn-primary">
                  Нет
                </a>

            </div>
        </form>
     </div>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>