<?php
get_header();
?>

<main class="main-content">
    <h1 class="sr-only">Услуги</h1>
    <div class="wrapper">
        <ul class="breadcrumbs">
            <li class="breadcrumbs__item breadcrumbs__item_home">
                <a href="index.html" class="breadcrumbs__link">Главная</a>
            </li>
            <li class="breadcrumbs__item">
                <a href="services.html" class="breadcrumbs__link">Услуги</a>
            </li>
        </ul>
        <?php
            if( have_posts()):
        ?>
        <ul class="services-list">
            <?php
                 while(have_posts()):
                     the_post();
            ?>
            <li class="services-list__item service">
                <h2 class="service__name main-heading"><?php  the_title(); ?></h2>
                <p class="service__text"> <?php  the_field('desc_services'); ?> </p>
                <p class="service__action">
                    <a href="#" class="service__subscribe btn">записаться</a>
                    <strong class="service__price price"> <?php  the_field('price_services'); ?> <span class="price__unit"></span>
                    </strong>
                </p>
                <figure class="service__thumb">

                    <img src="<?php echo get_field('img_services')['url']?>" alt="<?php echo get_field('img_services')['alt']?> ?>" class="service__img">
                </figure>
            </li>
            <?php
                endwhile;
            ?>
        </ul>
        <?php
            else:
                get_template_part('tmp/noposts.php');
            endif;
        ?>
    </div>
</main>

<?php
get_footer();
?>
