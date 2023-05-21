<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/require.php');

$signUpErrors = UserAction::signUp();

$genderList = findAllFrom($pdo, 'genders');
$factorList = findAllFrom($pdo, 'factors');
$blodTypeList = findAllFrom($pdo, 'blood_types');



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="/LR2/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/LR2/style.css" rel="stylesheet" />
</head>

<body>


<?php require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header.php'); ?>


    <div class="main container">

        <div class="col-md-5 mx-auto">
            <div class="alert alert-danger error-msg d-none"></div>
            <form action="signup.php" method="POST">
                <input type="hidden" name="action" value="signup">
                <div class="form-group">
                    <label for="email">Email (Логин)</label>
                    <input type="email" name="email" id="email" class="form-control" value="<?= setValue($_POST, 'email', 'clearFilter') ?>" placeholder="example@example.com" required>
                </div>
                <div class="form-group">
                    <label for="full_name">ФИО</label>
                    <input type="text" name="full_name" id="full_name" class="form-control"
                        placeholder="Иванов Иван Иванович" value="<?= setValue($_POST, 'full_name', 'clearFilter') ?>"  required>
                </div>


                <div class="form-group">
                    <label for="birth_date">Дата рождения</label>
                    <input type="date" name="birth_date" value="<?= setValue($_POST, 'birth_date', 'clearFilter') ?>" id="birth_date" class="form-control" required>
                </div>


                <div class="form-group">
                    <label for="gender">Группа крови</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="" disabled="" selected="" >Пол</option>

                        <?php foreach ($genderList as $item): ?>
                        <option <?= setSelectedOption($_POST, 'gender', 'clearFilter',  $item['gender_id']) ?> value="<?= $item['gender_id'] ?>"> <?= $item['name'] ?> </option>

                        <?php endforeach ?>

                    </select>
                </div>


                <div class="form-group">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" class="form-control" placeholder="улица Пушкина дом Колотушкина" value="<?= setValue($_POST, 'address', 'clearFilter') ?>" required>
                </div>



                <div class="form-group">
                    <label for="interest">Интересы</label>
                    <textarea name="interest" placeholder="Ваши интересы"  class="form-control"
                        style="height: 100px" required> <?= setValue($_POST, 'interest', 'clearFilter') ?> </textarea>
                </div>


                <div class="form-group">
                    <label for="blood_type">Группа крови</label>
                    <select name="blood_type" id="blood_type" class="form-control" required>
                        <option value="" disabled="" selected="">Группа крови</option>


                        <?php foreach ($blodTypeList as $item): ?>
                        <option <?= setSelectedOption($_POST, 'blood_type', 'clearFilter',  $item['blood_type_id']) ?> value="<?= $item['blood_type_id'] ?>"> <?= $item['name'] ?> </option>

                        <?php endforeach ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="factor">Резус-фактор</label>
                    <select name="factor" id="factor" class="form-control" required>
                        <option value="" disabled="" selected="">Резус-Фактор</option>
                        
                         
                        <?php foreach ($factorList as $item): ?>
                            <option <?= setSelectedOption($_POST, 'factor', 'clearFilter',  $item['factor_id']) ?> value="<?= $item['factor_id'] ?>"> <?= $item['name'] ?> </option>

                        <?php endforeach ?>

                    </select>
                </div>

                <div class="form-group">
                    <label for="vk">Ссылка на профиль Вконтакте</label>
                    <input type="url" name="vk" id="vk" class="form-control"  value="<?= setValue($_POST, 'vk', 'clearFilter') ?>" placeholder="https://vk.com/idx">
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Совершенно секретно" value="<?= setValue($_POST, 'password', 'clearFilter') ?>" required>
                </div>
                <div class="form-group">
                    <label for="password_confirm">Подтвердите пароль</label>
                    <input type="password" name="password_confirm" id="password_confirm" value="<?= setValue($_POST, 'password_confirm', 'clearFilter') ?>" class="form-control"
                        placeholder="Совершенно секретно" required>
                </div>
                <div class="col-md-12 text-center mt-2 ">
                    <button type="submit" class=" btn btn-block btn-primary tx-tfm register-btn" >
                        Зарегистрироваться
                    </button>
                </div>
                <div class="form-group">
                    <p class="text-center">Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
                </div>
            </form>
                        
            <?php if ($signUpErrors != '') : ?>
            <div class="alert alert-danger" role="alert">
                <?= $signUpErrors ?>                
             </div>
            <?php endif ?>;

        </div>

    </div>

    <!--Отображение шаблона формы регистрации.
        Данные об ошибках выводим из $signUpErrors,
        поля формы предзаполняем из $_POST с фильтрацией!-->



        <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/templates/footer.php'); ?>


    <script src="/LR2/popper.min.js"></script>
    <script src="/LR2/bootstrap.min.js"></script>
    <script src="/LR2/js/bootstrap.min.js"></script>
</body>

</html>