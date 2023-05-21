<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/stock/stock_table.php");

$stocks = StockTable::getAll();


?> 

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');

?>


    <div class="container">   
        <h1>Скидки</h1>
        
        <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Описание</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach ($stocks as $item): ?>
                                <tr>
                                    <td><?php echo $item['stock_id'] ?></td>
                                    <td><?php echo $item['description'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="/LR5/stock/view/update.php?id=<?= $item['stock_id'] ?>">Редактировать</a>
                                    </td>
                            
                                    <td>
                                        <a class="btn btn-danger delete" href="/LR5/stock/view/delete.php?id=<?= $item['stock_id'] ?>">Удалить</a>
                                    </td>
                                </tr>
                    <?php endforeach; ?>
                </tbody>        
        </table>
        <a class="btn btn-primary" href="/LR5/stock/view/create.php">Добавить</a>   
    </div>
       


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>