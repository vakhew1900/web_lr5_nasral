<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/stock/stock_action.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/electronic/electronic_action.php');

$stocks = StockAction::getAll();
ElectronicAction::create();

$electronic = null;

if (key_exists('id', $_GET)) {


    $electronic = ElectronicAction::getById();
} else if (key_exists('id', $_POST)) {
    
    ElectronicAction::update();
} else {
    ElectronicAction::redirect();
}

function select($stock, $electronic){
    if($stock['stock_id'] == $electronic['stock_id']){
        return'selected';
   }
   else{
      return '';
    }
}
?> 

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');

?>


        
        <h1>Товары</h1>
        
        <div class="container text-center">
        <form action="/LR5/electronic/view/update.php" method = "post" enctype="multipart/form-data">

                <input type="hidden" name="action" value="electronic_update">
                <input type="hidden" name="id" value= <?= htmlspecialchars($electronic['electronic_id'])?>>
                <label for="name">Новое название</label>
                <input type="text" name="name"  class="form-control" placeholder="Название" value = <?= htmlspecialchars($electronic['name'])?> required>

                <label for="cost">Новая цена</label>
                <input type="number" name="cost"  class="form-control" value = <?= htmlspecialchars($electronic['cost'])?> placeholder="Цена" required>

            
                 <label for="stock_id">Новый материал</label>
                <select name="stock_id" class="form-control" required>
                    <option value >Выберите скидку</option>
                    <?php foreach ($stocks as $stock): ?>
                                <option value = <?= htmlspecialchars($stock['stock_id']) ?>
                                <?= select($stock, $electronic) ?>>  <?= htmlspecialchars( $stock['description'])
                                 ?> </option>;
                    <?php endforeach ?>

                </select>

                <label class ="mb-2"> Фильтрация по Описанию:</label >
                <textarea name = "description" placeholder="Введите описание"  class="form-control"   style = "height: 100px"> <?= htmlspecialchars($electronic['description'])?> </textarea>

                <input type="hidden" name="MAX_FILE_SIZE" value="5000000" />
                <label for="uploadedFile">Новое фото</label>
                <input type="file" class="form-control" name ="uploadedFile" title="Фото">
                <button type="submit"class="btn btn-danger delete" > Обновить </button>
            
        </form>
    </div>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>