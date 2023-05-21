<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/stock/stock_action.php");

StockAction::create();


?> 

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');

?>


        
        <h1>Скидки</h1>
        
     <div class="container">
        <form action="/LR5/stock/view/create.php" method="POST">
            <div class="form-group">
                <label for="name">Описание</label>
                <input type="hidden" name="action" value="stock_create">
                <input type="text" name="description"  class="form-control" placeholder="Название">

                <br>
                <button type="submit" class=" btn btn-block btn-primary">
                    Добавить
                </button>
            </div>
        </form>
     </div>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>