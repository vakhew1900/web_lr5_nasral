<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/electronic/electronic_table.php");
$electronicList = ElectronicTable::getAll();


?> 

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');

?>


<div class="container text-center mt-5">
    <?php if (count($electronicList) > 0): ?>
        <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Акция</th>
                        <th scope="col">Изображение</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach ($electronicList as $item): ?>
                        <tr>                        
                            <td scope="col"><?= $item['electronic_id'] ?> </td>
                            <td scope="col"><?= $item['name'] ?> </td>
                            <td scope="col"><?= $item['cost'] ?> рублей</td>
                            <td scope="col"><?= $item['description'] ?></td>
                            <td scope="col"><?= $item['stock_description'] ?></td>
                            <th scope="row"> <img src=<?='/LR5/images/'.$item['img_path']?> style="max-width : 180px" alt=""></th>
                            <td>
                                <a class="btn btn-primary" href="/LR5/electronic/view/update.php?id=<?= $item['electronic_id'] ?>">Редактировать</a>
                            </td>
                            
                            <td>
                                <a class="btn btn-danger delete" href="/LR5/electronic/view/delete.php?id=<?= $item['electronic_id'] ?>">Удалить</a>
                            </td>
            
                        </tr>

                    <?php endforeach; ?>
                </tbody>           
        </table>
        <?php endif ?>

        <a class="btn btn-primary" href="/LR5/electronic/view/create.php">Добавить</a>   
    </div>

       


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>