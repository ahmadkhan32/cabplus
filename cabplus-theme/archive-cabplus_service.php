<?php
/**
 * CABPLUS — archive-cabplus_service.php
 * Displays the complete All Services page overview
 */
$template_file = get_template_directory() . '/page-templates/page-services.php';
if ( file_exists( $template_file ) ) {
    include $template_file;
} else {
    get_header();
    $services = cabplus_get_services();
    ?>
    <section class="page-hero">
      <div class="wrap">
        <span class="kicker mono">WHAT WE DO</span>
        <h1>Our Services</h1>
        <p class="lead">Everything from your first business idea to full compliance certification &#8212; in one place.</p>
      </div>
    </section>
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
    <?php
    get_footer();
}
