<?php get_header();
        $title = single_cat_title('' , false);
?>

<main class="main-content">
      <h1 class="sr-only"> Страница категории <?php echo $title ?>  в блоге сайта спортклуба SportIsland </h1>
      <div class="wrapper">
        <?php get_template_part('tmp/breadcrumbs.php'); ?>
      </div>
      <?php
        if( have_posts()):
    ?>
      <section class="category-posts">
        <div class="wrapper">
          <h2 class="main-heading category-posts__h"> <?php echo $title ?> </h2>
          <ul class="posts-list">
              <?php
                while( have_posts()):
                    the_post();
              ?>
            <li class="last-post">
              <a href="<?php the_permalink(); ?>" 
              class="last-post__link" 
              aria-label="Читать текст статьи: <?php the_title(); ?>">
                <figure class="last-post__thumb">
                  <img src="img/blog__article_thmb1.jpg" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> <?php the_title(); ?> </h3>
                  <p class="last-post__text"> <?php the_content(); ?></p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
            <?php endwhile; ?>
            <!-- <li class="last-post">
              <a href="single.html" class="last-post__link" aria-label="Читать текст статьи: Бег помогает похудеть">
                <figure class="last-post__thumb">
                  <img src="img/blog__article_thmb2.jpg" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> Бег помогает похудеть </h3>
                  <p class="last-post__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
            <li class="last-post">
              <a href="single.html" class="last-post__link" aria-label="Читать текст статьи: Рельефный пресс">
                <figure class="last-post__thumb">
                  <img src="img/blog__article_thmb3.jpg" alt="" class="last-post__img">
                </figure>
                <div class="last-post__wrap">
                  <h3 class="last-post__h"> Рельефный пресс </h3>
                  <p class="last-post__text"> Сайт рыбатекст поможет дизайнеру, верстальщику, вебмастеру сгенерировать несколько абзацев более менее осмысленного текста рыбы на русском языке, а начинающему оратору отточить навык публичных выступлений в домашних условиях. </p>
                  <span class="last-post__more link-more">Подробнее</span>
                </div>
              </a>
            </li>
          </ul> -->
            <?php the_posts_pagination(); ?>
        </div>
      </section>
      <?php else:
                get_template_part('tmp/noposts.php');
      endif;
        ?>
    </main>

<?php get_footer(); ?>