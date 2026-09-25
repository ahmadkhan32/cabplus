<?php
/**
 * CABPLUS — single-cabplus_service.php
 * Individual service page (used by WordPress CPT)
 */
get_header();

$services = cabplus_get_services();

// 1. Check custom query var first
$slug = get_query_var('cabplus_service_slug');

// 2. If not found, check queried post name
if ( ! $slug && get_the_ID() ) {
    $slug = get_post_field('post_name', get_the_ID());
}

// 3. Fallback: Parse from URL path
if ( ! $slug ) {
    $req_path = parse_url( $_SERVER['REQUEST_URI'] ?? '', PHP_URL_PATH );
    $parts    = array_values( array_filter( explode('/', trim($req_path, '/')) ) );
    if ( ! empty($parts) ) {
        $slug = end($parts);
    }
}

// Find current service data
$current_svc = null;
$current_index = 0;
foreach ($services as $i => $svc) {
    if ($svc['slug'] === $slug) {
        $current_svc = $svc;
        $current_index = $i;
        break;
    }
}
if (!$current_svc) {
    $current_svc = $services[0];
}
?>

<!-- PAGE HERO -->
<section class="service-page-hero" style="--svc-color:<?php echo $current_svc['color']; ?>">
  <div class="wrap service-hero-inner">
    <div class="service-hero-icon">
      <div class="svc-icon-circle svc-icon-circle--large" style="background:<?php echo $current_svc['color']; ?>">
        <?php echo cabplus_service_svg_icon($current_svc['icon'], 48); ?>
      </div>
    </div>
    <div class="service-hero-text">
      <nav class="breadcrumb" aria-label="Breadcrumb">
        <a href="<?php echo esc_url(home_url('/')); ?>">Home</a> &#8250;
        <a href="<?php echo esc_url(home_url('/services/')); ?>">Services</a> &#8250;
        <span><?php echo $current_svc['title']; ?></span>
      </nav>
      <h1><?php echo $current_svc['title']; ?></h1>
      <p class="lead"><?php echo $current_svc['short']; ?></p>
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Get started &#8594;</a>
    </div>
  </div>
</section>

<!-- SERVICE CONTENT -->
<section class="service-content-section">
  <div class="wrap service-content-grid">
    <div class="service-main-content">
      <?php 
      $custom_content = '';
      if ( have_posts() && get_post_type() === 'cabplus_service' ) {
          while ( have_posts() ) { 
              the_post(); 
              $custom_content = get_the_content(); 
          }
      }
      if ( ! empty($custom_content) ) : ?>
        <div class="service-post-content"><?php echo apply_filters('the_content', $custom_content); ?></div>
      <?php else: ?>
        <?php echo cabplus_service_default_content($current_svc['slug']); ?>
      <?php endif; ?>
    </div>

    <aside class="service-sidebar">
      <div class="sidebar-card">
        <h4>All Services</h4>
        <ul class="sidebar-service-list">
          <?php foreach ($services as $i => $svc): ?>
          <li class="<?php echo ($svc['slug'] === $current_svc['slug']) ? 'active' : ''; ?>">
            <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'] . '/')); ?>" style="--dot-color:<?php echo str_replace('linear-gradient(135deg,', '', explode(',', $svc['color'])[0]); ?>">
              <?php echo $svc['title']; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </div>

      <div class="sidebar-card sidebar-cta">
        <h4>Ready to start?</h4>
        <p>Book a free 30-minute discovery call and find out exactly what's needed.</p>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold" style="width:100%;justify-content:center;margin-top:14px;">Book a Review</a>
        <a href="mailto:cp@cabplus.uk" class="btn btn-ghost" style="width:100%;justify-content:center;margin-top:10px;">Email us</a>
      </div>
    </aside>
  </div>
</section>

<!-- OTHER SERVICES -->
<section class="other-services">
  <div class="wrap">
    <h2 class="other-services-title">Explore other services</h2>
    <div class="svc-cards svc-cards--3">
      <?php
      $shown = 0;
      foreach ($services as $i => $svc):
        if ($svc['slug'] === $current_svc['slug']) continue;
        if ($shown >= 3) break;
        $shown++;
      ?>
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

<?php get_footer(); ?>
