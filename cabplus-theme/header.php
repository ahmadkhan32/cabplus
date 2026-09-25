<?php
/**
 * CABPLUS — header.php
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header id="site-header">
  <div class="navbar">

    <a href="<?php echo esc_url(home_url('/')); ?>" class="logo-wrap" aria-label="<?php bloginfo('name'); ?> Home">
      <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cabplus-logo.png'); ?>" alt="<?php bloginfo('name'); ?> Logo" class="site-logo-img">
      <div class="logo-text">
        <span class="logo-brand">CABPLUS<sup>&#174;</sup></span>
        <span class="logo-sub">AI COMPLIANCE</span>
        <span class="logo-tagline">IDEAS &#183; COMPLIANCE &#183; GROWTH &#183; A BRIGHTER TOMORROW</span>
      </div>
    </a>

    <!-- PRIMARY NAV -->
    <nav class="links" id="main-nav" aria-label="Main navigation">
      <?php
      wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class'     => 'nav-list',
        'container'      => false,
        'fallback_cb'    => 'cabplus_fallback_nav',
      ));
      ?>
    </nav>

    <button class="menu-toggle" id="menuToggle" aria-label="Open menu" aria-expanded="false">&#9776;</button>
    <a href="<?php echo esc_url(home_url('/#contact')); ?>" class="btn btn-gold" style="flex-shrink:0;">Book a Review</a>
  </div>

  <!-- MOBILE NAV -->
  <nav class="mobile-nav" id="mobileNav" aria-label="Mobile navigation">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'primary',
      'menu_class'     => 'mobile-nav-list',
      'container'      => false,
      'fallback_cb'    => 'cabplus_fallback_nav',
    ));
    ?>
  </nav>
</header>

