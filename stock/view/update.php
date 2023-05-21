
<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/stock/stock_action.php');

$stock = null;

if (key_exists('id', $_GET)) {


    $stock = StockAction::getById();
} else if (key_exists('id', $_POST)) {
    echo "djfhisdf";
    StockAction::update();
} else {
    StockAction::redirect();
}

?>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');


?>


        
        <h1>Скидки</h1>
        
        <div class="container">
            <form action="/LR5/stock/view/update.php" method="POST">
                <div class="form-group">
                    <label for="name">Новое название</label>
                    <input type="hidden" name="action" value="stock_update">
                    <input type="hidden" name="id" value = <?= $_GET['id'] ?>>
                    <input type="text" name="description"  class="form-control" placeholder="Название" value = <?= htmlspecialchars($stock['description'])?>>

                    <br>
                    <button type="submit" class=" btn btn-block btn-primary">
                        Редактировать.
                    </button>
                </div>
            </form>
     </div>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>