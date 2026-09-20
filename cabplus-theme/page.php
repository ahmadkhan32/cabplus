<?php
/**
 * CABPLUS — page.php (generic page fallback)
 */
get_header();
?>

<section class="page-hero">
  <div class="wrap">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <h1><?php the_title(); ?></h1>
    <?php endwhile; endif; ?>
  </div>
</section>

<section class="generic-page-content">
  <div class="wrap">
    <?php if (have_posts()): while (have_posts()): the_post(); ?>
      <div class="page-content"><?php the_content(); ?></div>
    <?php endwhile; endif; ?>
  </div>
</section>

<?php get_footer(); ?>
