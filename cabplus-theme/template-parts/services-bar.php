<?php
/**
 * CABPLUS — template-parts/services-bar.php
 * Reusable services icon bar
 */
$services = cabplus_get_services();
?>
<div class="services-bar">
  <div class="wrap">
    <div class="services-bar-inner">
      <?php foreach ($services as $i => $svc): ?>
      <?php if ($i > 0): ?><div class="svc-divider"></div><?php endif; ?>
      <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'])); ?>" class="svc-icon-card svc-<?php echo ($i+1); ?>">
        <div class="svc-icon-circle" style="background:<?php echo $svc['color']; ?>">
          <?php echo cabplus_service_svg_icon($svc['icon']); ?>
        </div>
        <span class="svc-icon-label"><?php echo $svc['title']; ?></span>
      </a>
      <?php endforeach; ?>
    </div>
    <div class="trusted-bar">
      <div class="trusted-bar-line"></div>
      <span class="trusted-bar-text">Your Trusted Partner</span>
      <div class="trusted-bar-line right"></div>
      <span class="trusted-bar-sub">In Business, Finance, Compliance and Digital Growth</span>
    </div>
  </div>
</div>
