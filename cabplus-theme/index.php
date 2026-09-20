<?php
/**
 * CABPLUS — index.php (fallback)
 */
get_header();
?>

<section class="page-hero">
  <div class="wrap">
    <h1>CABPLUS AI Compliance</h1>
    <p class="lead">Your trusted partner in Business, Finance, Compliance and Digital Growth.</p>
    <div class="hero-ctas">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Get in touch</a>
      <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-ghost">Our services</a>
    </div>
  </div>
</section>

<?php if (have_posts()): ?>
<section class="blog-section">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">BLOG</span>
      <div><h2>Latest updates</h2></div>
    </div>
    <div class="blog-grid">
      <?php while (have_posts()): the_post(); ?>
      <article class="blog-card">
        <?php if (has_post_thumbnail()): ?>
        <div class="blog-thumb"><?php the_post_thumbnail('medium'); ?></div>
        <?php endif; ?>
        <div class="blog-card-body">
          <div class="blog-meta mono"><?php echo get_the_date(); ?></div>
          <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          <p><?php the_excerpt(); ?></p>
          <a href="<?php the_permalink(); ?>" class="btn btn-ghost" style="margin-top:12px;">Read more</a>
        </div>
      </article>
      <?php endwhile; ?>
    </div>
    <?php the_posts_pagination(); ?>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
