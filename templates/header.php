
<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/LR5/.core/require.php');
UserAction::logout();

?>

<header class="header position-fixed">

    <div class="container-wrapper bg-dark">
        <div class="container">
            <div class="row additional-header">
                <div class="navbar navbar-expand col-6" style="height: 100%">
                    <ul class="region-navbar additional-header-navbar navbar-nav text-white d-flex align-items-center">
                        <li class="nav-item"><a href="" class="nav-link text-white">

                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-geo-alt" viewBox="0 0 16 16">
                                    <path
                                        d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z" />
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                </svg>
                                Москва</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-white">Магазин</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-white">Доставка</a></li>
                    </ul>
                </div>

                <div class="navbar navbar-expand col-6 d-flex justify-content-end" style="height: 100%">
                    <ul class="region-navbar additional-header-navbar navbar-nav text-white d-flex align-items-center">
                        <li class="nav-item"><a href="" class="nav-link text-white">Блог «М.Клик»</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-white">M.Club</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-white">Для бизнеса</a></li>
                        <li class="nav-item"><a href="" class="nav-link text-white">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-telephone" viewBox="0 0 16 16">
                                    <path
                                        d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
                                </svg> 8-800-600-7775</a></li>
                    </ul>
                </div>
            </div>



        </div>
    </div>


    <div class="container header-container">
        <div class="row justify-content-center align-items-center">
            <div class="logotype col-1">
                <div class="logo-svg">
                    <img src="https://cms.mvideo.ru/magnoliaPublic/dam/jcr:6c33dfce-6106-48c9-9101-8dadbfea21fd"
                        class="img-fluid" alt="">
                </div>
            </div>

            <!-- <div class="col-1">
                    <button class="catalog-button  btn btn-outline-danger">Каталог</button>
                </div> -->

            <div class="col-1">
                <div class="dropdown">
                    <a class="btn btn catalog-button btn-danger dropdown-toggle" href="#" role="button"
                        id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Каталог
                    </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="#">Акции, скидки</a>
                        <a class="dropdown-item" href="#">Смартфоны и гаджеты</a>
                        <a class="dropdown-item" href="#">Ноутбуки и компьютеры</a>
                        <a class="dropdown-item" href="#">Телевизоры и цифровое</a>
                    </div>
                </div>
            </div>

            <!-- Search -->
            <div class="col-4">
                <div class="input-group">
                    <input type="search" class="form-control rounded" placeholder="Искать королевские подарки"
                        aria-label="Search" aria-describedby="search-addon" />
                    <button type="button" class="btn btn-outline-danger search-button">Поиск</button>
                </div>
            </div>
            <!-- Search -->

            <nav class="navbar col-1 navbar-expand ">
                <div class="navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="https://getbootstrap.com/docs/4.0/components/navbar/" class="nav-link">Статус
                                Заказа</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="col-5">

                <?php if (!key_exists('user_id', $_SESSION) || $_SESSION['user_id'] <= 0): ?>
                    Вы не авторизованы.
                    <a href="/LR5/login.php"> Ввести логин и пароль </a>
                    или
                    <a href="/LR5/signup.php"> зарегистрироваться </a>
                <?php else: ?>
                        Вы вошли как <?= UserLogic::current()['email'] ?>.
                        <a href="?logout=logout"> Выйти </a>
                <?php endif ?>
                
            </div>
        </div>
    </div>


    <div class="bottom-header container">
        <div class="row">
            <div class="navbar navbar-expand " style="height: 100%">
                <ul class=" bottom-header navbar-nav text-white overflow-hidden d-flex justify-content-center"
                    style="width: 200;">
                    <li class="nav-item"><a href="" class="nav-link text-black">ВСЕ АКЦИИ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">СКИДКИ НА ПОДАРКИ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">PREMIUM</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">ТЕЛЕВИЗОРЫ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">SAMSUNG 23</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">НОУТБУКИ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">ЭКСПРЕСС-ДОСТАВКА</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">ГАРАНТИЯ ЛУЧШЕЙ ЦЕНЫ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">СТИРАЛЬНЫЕ МАШИНЫ</a></li>
                    <li class="nav-item"><a href="" class="nav-link text-black">ТЕЛЕВИЗОРЫ</a></li>
                </ul>
            </div>
        </div>
    </div>


    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/LR5/electronic/view/read.php">Электроника</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/LR5/stock/view/read.php">Скидки</a>
                </li>
            </ul>
        </nav>
     </div>

     
</header>

<!-- без js  -->
<div class="tmp" style="height: 170px;"></div>