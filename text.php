<?php

require_once($_SERVER['DOCUMENT_ROOT'].'/LR4/text_function.php');
 $text_area_content = '';

 if (key_exists('preset', $_GET)) {
     $text_area_content = read_preset($_GET['preset']);
 }

?>

<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/header_meta.php');
?>




<form class="m-5" action="text.php" method="post">
    <label class="form-label">Введите текст</label>
    <textarea class="form-control" name="text"><?= $text_area_content ?></textarea>
    <button class="btn btn-primary mt-2">Отправить</button>
</form>

<?php if(key_exists('text', $_POST)) :    ?>
    <div class="container">
      <?php  echoEx($_POST['text']) ?>
    </div>
<?php endif ?>


<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR4/templates/footer_meta.php');

?>