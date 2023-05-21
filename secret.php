<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/require.php');

if(!key_exists('user_id', $_SESSION)){
    header('Location: login.php');
}

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


<?php 
        
        require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header.php'); 
        echo 'секретная страница';      
?>
    
    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->

    


    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/templates/footer.php'); ?>


    <script src="/LR2/popper.min.js">
    </script>
    <script src="/LR2/bootstrap.min.js"></script>

    <script src="/LR2/js/bootstrap.min.js"></script>
</body>

</html>