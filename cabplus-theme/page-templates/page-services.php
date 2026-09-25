<?php
/**
 * Template Name: All Services
 * CABPLUS — page-templates/page-services.php
 */
get_header();
$services = cabplus_get_services();
?>

<section class="page-hero">
  <div class="wrap">
    <span class="kicker mono">WHAT WE DO</span>
    <h1>Our Services</h1>
    <p class="lead">Seven areas of expertise designed to take your business from idea to fully compliant, visible, and growing.</p>
  </div>
</section>

<!-- SERVICES ICON BAR -->
<div class="services-bar services-bar--inner">
  <div class="wrap">
    <div class="services-bar-inner">
      <?php foreach ($services as $i => $svc): ?>
      <?php if ($i > 0): ?><div class="svc-divider"></div><?php endif; ?>
      <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'] . '/')); ?>" class="svc-icon-card svc-<?php echo ($i+1); ?>">
        <div class="svc-icon-circle" style="background:<?php echo $svc['color']; ?>">
          <?php echo cabplus_service_svg_icon($svc['icon']); ?>
        </div>
        <span class="svc-icon-label"><?php echo $svc['title']; ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<section class="services-full" style="padding-top:48px;">
  <div class="wrap">
    <div class="svc-cards">
      <?php foreach ($services as $i => $svc): ?>
      <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'] . '/')); ?>" class="svc-card svc-card-<?php echo ($i+1); ?>" style="text-decoration:none;">
        <div class="svc-card-icon"><?php echo cabplus_service_svg_icon_small($svc['icon']); ?></div>
        <h3><?php echo $svc['title']; ?></h3>
        <p><?php echo $svc['short']; ?></p>
        <span class="svc-card-link">Learn more &#8594;</span>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="cta-final">
  <div class="wrap">
    <h2>Not sure which service you need?</h2>
    <p>Book a free 30-minute discovery call and we'll map out exactly what applies to your business.</p>
    <div class="hero-ctas">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Talk to us</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
