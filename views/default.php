<?php
$current_language ='ua';
require_once 'models/header_subscribe.php';
require_once 'lib/search.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MVC</title>
    <link href="/shtab.php-academy.org/css/shtab.css" rel="stylesheet">
    <link href="/shtab.php-academy.org/css/libs.css" rel="stylesheet">
    <link href="/shtab.php-academy.org/css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
    <header class='header'>
        
        <a class="logo logo--head" href='http://shtab.net'>
            <img src="/shtab.php-academy.org/img/logo.png" alt='Anticorruption'>
        </a>
        <ul id="menu-header-ukrainian-menu" class="menu menu--head">
            <li class="menu__item"><a href="/shtab.php-academy.org/main">Головна</a></li>
            <li class="menu__item"><a href="/shtab.php-academy.org/news">Новини</a></li>
            <li class="menu__item"><a href="/shtab.php-academy.org/join_us">Підтримати</a></li>
            <li class="menu__item"><a href="/shtab.php-academy.org/about">Про нас</a></li>
            <li class="menu__item"> <a href="/shtab.php-academy.org/investigations">Розслідування</a></li>
            <li class="menu__item"> <a href="/shtab.php-academy.org/join_us">Приєднатись</a></li>
            <li class="menu__item"> <a href="/shtab.php-academy.org/contacts">Контакти</a></li>
            <li class="menu__item"><a href="https://map.shtab.net/">Карта ремонтів</a></li>
            <li class="menu__item"><a href="https://interes.shtab.net/">Приховані інтереси</a></li>
        </ul>

    <button class="btn btn-search btn-search--head"></button>
    <div class="search-box">
        <form method = "post" action="/shtab.php-academy.org/search" class="form form--search-box" id="searchform">
            <input name="search" type="text"  value="" class="input input--search-box" autocomplete="off" placeholder="Пошук">
            <input type="submit" class="btn btn--search-box" value="">
            <div class="result"></div>
        </form>
    </div>

    <div class="lang-switcher lang-switcher--head">
        <select class="lang-switcher__selector">
            <option <?php $current_language == "ua"?>>UA</option>
            <option <?php $current_language == "en"?>>EN</option>
        </select>
    </div>
</header>

    <p>
        <?=$content?>
    </p>

    <footer class='footer'>
        <div class='footer__container'>
            <!-- Блок контактов -->
            <div class='contacts'>
                <h3 class='title title--contacts'>
                    <?php
                    if($current_language == "ua"){
                        echo "КОНТАКТИ";
                    }elseif($current_language == "en"){
                        echo "CONTACT US";
                    }
                    ?>
                </h3>
    
                <!-- Email -->
                <ul class='info info--contacts'>
                    <li class='info__item info__item--email'>
                        <h4>Email</h4>
                        <a href='mailto:shtab.net@gmail.com'>shtab.net@gmail.com</a>
                    </li>
    
                    <!-- Телефон-->
                    <li class='info__item info__item--phone'>
                        <h4>
                            <?php
                            if($current_language == "ua"){
                                echo "Телефон";
                            }elseif($current_language == "en") {
                                echo "Phone";
                            }
                            ?>
                        </h4>
                        <a href='tel:+380735005022'>+38 (073) 500 50 22</a>
                    </li>
    
                    <!-- Адресс -->
                    <li class='info__item info__item--address'>
                        <h4>
                            <?php
                            if($current_language == "ua") {
                                echo "Адреса";
                            }elseif($current_language == "en") {
                                echo "Address";
                            }
                            ?>
                        </h4>
                        <address>
                            <?php
                            if($current_language == "ua") {
                                echo "01015 м. Київ, вул.<br>Московська, 41/8, оф.102";
                            }elseif
                            ($current_language == "en"){
                                echo "Kyiv-01015, 41/8,<br>Moskovska str., of.102";
                            }
                            ?>
                        </address>
                    </li>
                </ul>
            </div>
    
    
            <!-- Блок Социалок -->
            <div class='social'>
                <h3 class='title title--social'>
                    <?php
                    if($current_language == "ua"){
                        echo "МИ У СОЦМЕРЕЖАХ";
                    }elseif($current_language == "en"){
                        echo "SOCIAL NETWORKS";
                    }
                    ?>
                </h3>
    
                <!-- Ссылки на ФБ и Твиттер -->
                <ul class='info info--social'>
                    <li class='info__item info__item--facebook'>
                        <a href='https://www.facebook.com/shtab.net/'>facebook</a>
                    </li>
                    <li class='info__item info__item--twitter'>
                        <a href='https://twitter.com/shtab_net'>twitter</a>
                    </li>
                </ul>
            </div>
    
    
            <!-- Блок подписки на рассылку -->
            <div class='subscribe'>
                <h3 class='title title--subscribe'>
                    <?php
                    if($current_language == "ua") {
                        echo "ПІДПИСАТИСЬ НА ОНОВЛЕННЯ";
                    }elseif($current_language == "en") {
                        echo "SUBSCRIBE TO THE NEWS";
                    }
                    ?>
                </h3>
    
                <!-- Форма отправки данных для рассылки обновлений -->
                <form method = "POST" onsubmit="return checkForm(this.elements)" class='form form--subscribe' action='#'>
                    <?php if($current_language == "ua"){ ?>
                        <span><?=$nameError;?></span><br>
                        <span><?=$emailError;?></span><br>
                        <span><?=$errorMessage?></span>
                        <input type='text' class='input input--subscribe-name' placeholder="Ваше ім'я" name="subscribe-name"/>
                        <input type='text' class='input input--subscribe-email' placeholder='Ваш Email' name="subscribe-email"/>
                            
                    <?php }elseif($current_language == "en"){ ?>
                        <span><?=$nameErrorEN;?></span><br>
                        <span><?=$emailErrorEN;?></span><br>
                        <span><?=$errorMessageEN?></span>
                        <input type='text' class='input input--subscribe-name' placeholder="Your name" name="subscribe-name"/>
                        <input type='text' class='input input--subscribe-email' placeholder='Your Email' name="subscribe-email"/>
                    <?php } ?>
                    <input type='submit' class='btn btn--subscribe' value=''>
                </form>

    
    
                <!-- &copy -->
                <small class='copyright copyright--subscribe'>
                    <?php
                    if($current_language == "ua") {
                        echo "ГО «Антикорупційний штаб» &copy; 2017";
                    }elseif($current_language == "en") {
                        echo "NGO «Anti-corruption Headquarters»<br>&copy; 2017";
                    }
                    ?>
                </small>
    
    
                <!-- Закрываем футер -->
            </div>
        </div>
    </footer>
    <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous">
    </script>
    
    <script type="text/javascript" src="lib/js/jquery.flexslider-min.js"></script>
    <script src="lib/js/news_slider.js"></script>
    <script src="lib/js/shtab.js"></script>
    <script src="lib/js/ajax.search.js"></script>
    
</body>
</html>