<?php
/**
 * CABPLUS — 404.php
 */
get_header();
?>
<section class="page-hero" style="min-height:60vh;display:flex;align-items:center;">
  <div class="wrap" style="text-align:center;">
    <span class="kicker mono">404</span>
    <h1 style="font-size:clamp(2.5rem,6vw,5rem);">Page not found</h1>
    <p class="lead">The page you're looking for doesn't exist or has been moved.</p>
    <div class="hero-ctas" style="justify-content:center;margin-top:32px;">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="btn btn-gold">Go to homepage</a>
      <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-ghost">View services</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
