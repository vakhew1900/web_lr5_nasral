<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/require.php');


$signUpErrors = UserAction::login();

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


    <div class="container">

        <div class="col-md-5 mx-auto">
            <div class="alert alert-danger error-msg d-none"></div>
            <form action="login.php" method="POST">
                <input type="hidden" name="action" value="login">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="example@example.com" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="**********" required>
                </div>
                <div class="col-md-12 text-center mt-2">
                    <button type="submit" class=" btn btn-block mybtn btn-primary tx-tfm login-btn">Войти</button>
                </div>
                <div class="form-group">
                    <p class="text-center">Ещё нет аккаунта? <a href="signup.php">Зарегистрируйтесь</a></p>
                </div>
            </form>
        </div>


        <?php if ($signUpErrors != ''): ?>
            <div class="alert alert-danger" role="alert">
                <?= $signUpErrors ?>                
                </div>
        <?php endif ?>;

    </div>

    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/templates/footer.php'); ?>


    <script src="/LR2/popper.min.js"></script>
    <script src="/LR2/bootstrap.min.js"></script>
    <script src="/LR2/js/bootstrap.min.js"></script>
</body>

</html>