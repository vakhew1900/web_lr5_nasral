<?php



require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/require.php');


$stockList = findAllStocks($pdo);
$electronicList = findElectronicByFilter($pdo);


// if(!$_SESSION['user_id']){
//     header('Location: login.php');
// }


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
       
?>
    
    <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->

    <div class="product-container container mt-5">

        <div class="row">
            <ul class="d-flex col-4 justify-content-between" style="font-size: .8rem;" >
                <li class="list-group-item"><a href="" class="nav-link">Главная</a></li>
                <span>—</span>
                <li class="list-group-item"><a href="" class="nav-link">Компьютерная Техника</a></li>
                <span>—</span>
                <li class="list-group-item"><a href="" class="nav-link">Моноблоки</a></li>
                <span>—</span>
                <li class="list-group-item"><a href="" class="nav-link">Apple iMac</a></li>
                <span>—</span>
                <li class="list-group-item"><a href="" class="nav-link">Apple</a></li>
            </ul>
        </div>
        <div class="row align-items-center">
            <div class="product-information col-4">

                <div class="row">
                    <div class="col-3">
                        <div class="product-image">
                            <img src="image/30051828b.webp" class="img-fluid" alt="">
                        </div>
                    </div>

                    <div class="product-name col" style="font-size: .9rem;">
                        <b> Моноблок Apple iMac 27 i7 3,8/128/4T SSD/RP5500XT (Z0ZX) </b>
                    </div>
                </div>
            </div>


            <nav class="product-nav navbar navbar-expand col-5 justify-content-center">
                <ul class="navbar-nav">
                    <li class="nav-item"><a href="" class="nav-link product-nav-link" style="font-size: .9rem;">О
                            товаре</a></li>
                    <li class="nav-item"><a href="" class="nav-link product-nav-link"
                            style="font-size: .9rem;">Характеристики</a></li>
                    <li class="nav-item"><a href="" class="nav-link product-nav-link"
                            style="font-size: .9rem;">Отзывы</a></li>
                </ul>
            </nav>


            <div class="product-manage col-3 d-flex justify-content-end ">
                <button type="button" class="btn btn-outline-danger">Посмотреть аналоги</button>
            </div>
        </div>
        <hr>
    </div>

    <div class="container text-center">
        <form action="products.php" method = "get">
            <label> Фильтрация результата поиска</label>
            <div class="mt-2 mb-3">
                <label class ="mb-2">Фильтрация по цене:</label>
                <input type="number" name="costFrom" placeholder="Цена от" value= "<?= setValue($_GET, 'costFrom', 'clearFilter') ?>", class="form-control">
                <input type="number" name="costTo" placeholder="Цена до" value="<?= setValue($_GET, 'costTo', 'clearFilter') ?>" class="form-control mt-3">
            </div>


            <div class="mb-3">
                <label class ="mb-2" > Фильтрация по акциям:</label>
                <select name="stock" class="form-control">
                 <option value >Выберите акцию</option>
                 <?php foreach ($stockList as $item): ?>
                        <option <?= setSelectedOption($_GET, 'stock', 'clearFilter',  $item['stock_id']) ?> value = "<?= $item['stock_id'] ?>"> <?= $item['description'] ?> </option>

                <?php endforeach ?>
                </select>
            </div>

            <div class="mb-3">
                <label class ="mb-2"> Фильтрация по Названию:</label>
                <input type="text" name = "name" placeholder="Введите название" value="<?= setValue($_GET, 'name', 'clearFilter') ?>" class="form-control">
            </div>


            <div class="mb-3">
                <label class ="mb-2"> Фильтрация по Описанию:</label>
                <textarea name = "description" placeholder="Введите описание"  class="form-control" style = "height: 100px"><?=setValue($_GET, 'description', 'clearFilter') ?></textarea>
            </div>

            <input type="submit" value="Применить фильтр" class="btn btn-primary">
            <input type="submit" name="clearFilter" value="Очистить фильтр" class="btn btn-danger">
            
        </form>
    </div>

    <div class="container text-center mt-5">
    <?php if (count($electronicList) > 0): ?>
        <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Изображение</th>
                        <th scope="col">Название</th>
                        <th scope="col">Цена</th>
                        <th scope="col">Описание</th>
                        <th scope="col">Акция</th>
                    </tr>
                </thead> 
                <tbody>
                    <?php foreach ($electronicList as $item): ?>
                        <tr>                        
                            <?php if(key_exists('user_id', $_SESSION)): ?>
                                <!-- <th scope="row"></th> -->
                            <!-- <th scope="row"> <img src="images/<?= $item['img_path'] ?>" style="max-width : 180px" alt=""></th> -->
                            <th scope="row"> <img src=<?='/LR3/.core/import_image.php?file='.urlencode('/LR3/images/'.$item['img_path']) ?> style="max-width : 180px" alt=""></th>
                            <?php else : ?>
                                <th scope="row"></th>
                            <?php endif ?>
                            <td scope="col"><?= $item['name'] ?> </td>
                            <td scope="col"><?= $item['cost'] ?> рублей</td>
                            <td scope="col"><?= $item['description'] ?></td>
                            <td scope="col"><?= $item['stock_description'] ?></td>
            
                        </tr>

                    <?php endforeach; ?>

                </tbody>           
        </table>
        <?php endif ?>
    </div>




    <?php require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/templates/footer.php'); ?>


    <script src="/LR2/popper.min.js">
    </script>
    <script src="/LR2/bootstrap.min.js"></script>

    <script src="/LR2/js/bootstrap.min.js"></script>
</body>

</html>