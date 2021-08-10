<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv='X-UA-Compatible' content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">
    <title> Главная </title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,800,900&display=swap&subset=cyrillic" rel="preload stylesheet">
    <?php wp_head() ?>

</head>
  <body>
    <header class="main-header" >
      <div class="wrapper main-header__wrap">
        <a href="index.html" class="main-header__logolink" aria-label="Логотип-ссылка на Главную">
          <img src="<?php echo _si_assets_path('img/logo.png'); ?>" alt="">
        </a>
        <!-- <nav class="main-navigation">
          <ul class="main-navigation__list">
            <li>
              <a href="services.html">Услуги</a>
            </li>
            <li class="active current-menu-item">
              <a href="trainers.html">Тренеры</a>
            </li>
            <li>
              <a href="schedule.html">Расписание</a>
            </li>
            <li>
              <a href="prices.html">Цены</a>
            </li>
            <li>
              <a href="contacts.html">Контакты </a>
            </li>
          </ul>
        </nav> -->
        <?php wp_nav_menu([
            'theme_location' => 'si_menu_header',
            'container' => 'nav',
            'container_class' => 'main-navigation',
            'menu_class' => 'main-navigation__list',
            // 'items_wrap' => '<ul class="%2$s si_class ">%3$s</ul>' 
        ]);?>
        <!-- <address class="main-header__widget widget-contacts">
          <a href="tel:88007003030" class="widget-contacts__phone"> 8 800 700 30 30 </a>
          <p class="widget-contacts__address"> ул. Приречная 11 </p>
        </address> -->
        <?php
            if( is_active_sidebar('si-widget-header-tel')){
                dynamic_sidebar('si-widget-header-tel');
            }
        ?>

        <button class="main-header__mobile">
          <span class="sr-only">Открыть мобильное меню</span>
        </button>
      </div>
    </header>