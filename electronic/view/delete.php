<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/LR5/.core/require.php");
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/electronic/electronic_action.php');

$electronicList = null;

if (key_exists('id', $_GET)) {

$electronicList = ElectronicAction::getById();

} else if (key_exists('id', $_POST)) {

    ElectronicAction::delete();
} else {
    ElectronicAction::redirect();
}

?>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header_meta.php');


?>


        
        <h1>Скидки</h1>
        
     <div class="container">
        <form action="/LR5/electronic/view/delete.php" method="POST">
            <div class="form-group">
                <!-- <label for="name">Описание</label> -->
                <input type="hidden" name="action" value="electronic_delete">
                <input type="hidden" name="id" value = <?= $_GET['id'] ?>>


                <br>
                <div class="container"> Вы правда хотите удалить данную запись об электронном устройстве?</div>
                <br>
                <br>
                <button type="submit" class=" btn btn-block btn-danger">
                  Да
                </button>

                <a href = "/LR5/electronic/view/read.php" class=" btn btn-block btn-primary">
                  Нет
                </a>

            </div>
        </form>
     </div>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>