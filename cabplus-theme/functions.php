<?php
/**
 * CABPLUS AI Compliance - functions.php
 * Self-contained theme: AJAX form, rewrite rules, auto-page creation,
 * shortcodes, admin setup. No separate plugin required.
 */
if ( ! defined( 'ABSPATH' ) ) exit;
define( 'CABPLUS_VERSION', '3.0' );

/* ── 1. THEME SETUP ── */
function cabplus_setup() {
    load_theme_textdomain( 'cabplus', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form','comment-form','comment-list','gallery','caption','style','script' ) );
    add_theme_support( 'custom-logo', array( 'height' => 80, 'width' => 200, 'flex-height' => true, 'flex-width' => true ) );
    register_nav_menus( array( 'primary' => 'Primary Menu', 'footer' => 'Footer Menu' ) );
}
add_action( 'after_setup_theme', 'cabplus_setup' );

/* ── 2. ENQUEUE ASSETS ── */
function cabplus_enqueue_assets() {
    wp_enqueue_style( 'google-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap',
        array(), null );
    wp_enqueue_style( 'cabplus-main', get_template_directory_uri() . '/assets/css/cabplus.css', array(), CABPLUS_VERSION );
    wp_enqueue_script( 'cabplus-main', get_template_directory_uri() . '/assets/js/main.js', array(), CABPLUS_VERSION, true );
    wp_localize_script( 'cabplus-main', 'cabplusData', array(
        'homeUrl'  => home_url('/'),
        'themeUrl' => get_template_directory_uri(),
        'ajaxUrl'  => admin_url( 'admin-ajax.php' ),
        'nonce'    => wp_create_nonce( 'cabplus_contact_nonce' ),
        'action'   => 'cabplus_contact',
    ) );
}
add_action( 'wp_enqueue_scripts', 'cabplus_enqueue_assets' );

/* ── 3. CUSTOM POST TYPE ── */
function cabplus_register_cpt() {
    register_post_type( 'cabplus_service', array(
        'labels'      => array( 'name' => 'Services', 'singular_name' => 'Service' ),
        'public'      => true,
        'has_archive' => false,
        'menu_icon'   => 'dashicons-awards',
        'supports'    => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'     => array( 'slug' => 'services', 'with_front' => false ),
        'show_in_rest'=> true,
    ) );
}
add_action( 'init', 'cabplus_register_cpt' );

/* ── 4. SERVICES DATA ── */
function cabplus_get_services() {
    return array(
        array( 'slug' => 'business-ideas',             'title' => 'Business Ideas',                     'short' => 'From concept to fundable business plan.',                 'color' => 'linear-gradient(135deg,#1a3a6b,#2a5298)', 'icon' => 'idea'         ),
        array( 'slug' => 'finance-investment',         'title' => 'Finance &amp; Investment',            'short' => 'Funding strategies and investor-ready documentation.',    'color' => 'linear-gradient(135deg,#6b4c00,#b8962e)', 'icon' => 'finance'      ),
        array( 'slug' => 'business-registration',      'title' => 'Business Registration',               'short' => 'Companies House formation and statutory filings.',        'color' => 'linear-gradient(135deg,#1a4a2e,#2d7a4f)', 'icon' => 'registration' ),
        array( 'slug' => 'business-growth',            'title' => 'Business Growth',                     'short' => 'Strategy, systems and milestones to scale.',              'color' => 'linear-gradient(135deg,#0d5c8f,#1a8fd1)', 'icon' => 'growth'       ),
        array( 'slug' => 'social-media-marketing',     'title' => 'Social Media Marketing',              'short' => 'Content strategy and managed posting across all channels.','color' => 'linear-gradient(135deg,#4a1a6b,#8b2dbf)', 'icon' => 'social'       ),
        array( 'slug' => 'websites-digital-solutions', 'title' => 'Websites &amp; Digital Solutions',    'short' => 'Professional websites and custom digital tools.',          'color' => 'linear-gradient(135deg,#0d4a6e,#1278b4)', 'icon' => 'web'          ),
        array( 'slug' => 'gdpr-iso-cyber',             'title' => 'GDPR / ISO 27001 / Cyber Essentials', 'short' => 'Full compliance documentation and audit readiness.',       'color' => 'linear-gradient(135deg,#0f2044,#1a5fa8)', 'icon' => 'shield'       ),
    );
}
/* ── 5. SVG ICONS (Large) ── */
function cabplus_service_svg_icon( $icon, $size = 32 ) {
    $s = $size;
    $i = array(
        'idea'         => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="12" r="6" stroke="#fff" stroke-width="1.8"/><path d="M13 18v4a3 3 0 006 0v-4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><line x1="16" y1="6" x2="16" y2="4" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/><line x1="22" y1="9" x2="24" y2="7" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/><line x1="10" y1="9" x2="8" y2="7" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/></svg>',
        'finance'      => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="11" stroke="#fff" stroke-width="1.8"/><path d="M16 9v2M16 21v2M9 16h2M21 16h2" stroke="#fff" stroke-width="1.7" stroke-linecap="round"/><circle cx="16" cy="16" r="2.5" fill="#d4aa40"/></svg>',
        'registration' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="6" y="4" width="20" height="24" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M11 11h10M11 15h10M11 19h7" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/></svg>',
        'growth'       => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="4" y="20" width="5" height="8" rx="1" fill="#d4aa40"/><rect x="11" y="15" width="5" height="13" rx="1" fill="#d4aa40"/><rect x="18" y="10" width="5" height="18" rx="1" fill="#d4aa40"/><path d="M5 20L12 12 17 15 25 6" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="21,6 25,6 25,10" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'social'       => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="2" y="2" width="12" height="12" rx="3" stroke="#fff" stroke-width="1.6"/><circle cx="8" cy="8" r="3" stroke="#fff" stroke-width="1.3"/><circle cx="12.5" cy="3.5" r="1" fill="#d4aa40"/></svg>',
        'web'          => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="12" stroke="#fff" stroke-width="1.8"/><ellipse cx="16" cy="16" rx="5.5" ry="12" stroke="#d4aa40" stroke-width="1.4"/><line x1="4" y1="16" x2="28" y2="16" stroke="#fff" stroke-width="1.4"/></svg>',
        'shield'       => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><path d="M16 3L4 8.5v8.5C4 23.5 9 29 16 31c7-2 12-7.5 12-14V8.5z" stroke="#fff" stroke-width="1.8" fill="rgba(26,95,168,0.25)"/><path d="M10 16.5l4 4 8-8.5" stroke="#d4aa40" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    );
    return isset($i[$icon]) ? $i[$icon] : $i['shield'];
}

/* ── 6. SVG ICONS (Small, for cards) ── */
function cabplus_service_svg_icon_small( $icon ) {
    $cols = array( 'idea' => '#6ea8fe', 'finance' => '#d4aa40', 'registration' => '#4ade80', 'growth' => '#38bdf8', 'social' => '#c084fc', 'web' => '#38bdf8', 'shield' => '#6ea8fe' );
    $c    = isset($cols[$icon]) ? $cols[$icon] : '#6ea8fe';
    $i    = array(
        'idea'         => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="9" r="5" stroke="'.$c.'" stroke-width="1.6"/><path d="M9 14v4a3 3 0 006 0v-4" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round"/><line x1="12" y1="4" x2="12" y2="2" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/></svg>',
        'finance'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="'.$c.'" stroke-width="1.6"/><path d="M12 7v2M12 15v2M8 12h2M14 12h2" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="2.5" fill="'.$c.'"/></svg>',
        'registration' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="4" y="2" width="16" height="20" rx="2" stroke="'.$c.'" stroke-width="1.6"/><path d="M8 8h8M8 12h8M8 16h5" stroke="'.$c.'" stroke-width="1.5" stroke-linecap="round"/><path d="M16 17l1.5 1.5 3-3" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'growth'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="14" width="3.5" height="6" rx="1" fill="'.$c.'"/><rect x="8.5" y="10" width="3.5" height="10" rx="1" fill="'.$c.'"/><rect x="14" y="6" width="3.5" height="14" rx="1" fill="'.$c.'"/><path d="M4 14L9.5 8 14 11 21 4" stroke="#d4aa40" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><polyline points="17,4 21,4 21,8" stroke="#d4aa40" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'social'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="9" height="9" rx="2" stroke="'.$c.'" stroke-width="1.5"/><circle cx="6.5" cy="6.5" r="2" stroke="'.$c.'" stroke-width="1.3"/><circle cx="9.5" cy="3.5" r="0.7" fill="#d4aa40"/></svg>',
        'web'          => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="'.$c.'" stroke-width="1.6"/><ellipse cx="12" cy="12" rx="4" ry="9" stroke="'.$c.'" stroke-width="1.3"/><line x1="3" y1="12" x2="21" y2="12" stroke="'.$c.'" stroke-width="1.3"/></svg>',
        'shield'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 6v7c0 5 3.8 9.7 9 11 5.2-1.3 9-6 9-11V6z" stroke="'.$c.'" stroke-width="1.6" fill="rgba(26,95,168,0.2)"/><path d="M8 12l3 3 5-5.5" stroke="#d4aa40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    );
    return isset($i[$icon]) ? $i[$icon] : $i['shield'];
}

/* ── 7. SVG LOGO ── */
function cabplus_svg_logo( $size = 56 ) {
    ob_start(); ?>
    <svg width="<?php echo esc_attr($size); ?>" height="<?php echo esc_attr($size); ?>" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M84 50 A34 34 0 1 1 50 16" stroke="url(#hgA)" stroke-width="5" stroke-linecap="round" fill="none"/>
      <polygon points="50,25 37,62 63,62" fill="#0F2044"/>
      <polygon points="50,33 41,58 59,58" fill="url(#hgG)"/>
      <polygon points="50,46 44,58 56,58" fill="#0F2044"/>
      <defs>
        <linearGradient id="hgA" x1="50" y1="16" x2="84" y2="50" gradientUnits="userSpaceOnUse"><stop offset="0%" stop-color="#d4aa40"/><stop offset="100%" stop-color="#9a7820"/></linearGradient>
        <linearGradient id="hgG" x1="0" y1="0" x2="1" y2="1" gradientUnits="objectBoundingBox"><stop offset="0%" stop-color="#d4aa40"/><stop offset="100%" stop-color="#8a6e1a"/></linearGradient>
      </defs>
    </svg>
    <?php return ob_get_clean();
}

/* ── 8. BODY CLASSES + EXCERPT ── */
function cabplus_body_class( $c ) { $c[] = 'cabplus-site'; return $c; }
add_filter( 'body_class', 'cabplus_body_class' );
function cabplus_add_slug_body_class( $c ) { global $post; if ( isset($post) ) $c[] = 'page-' . $post->post_name; return $c; }
add_filter( 'body_class', 'cabplus_add_slug_body_class' );
function cabplus_excerpt_length() { return 25; }
add_filter( 'excerpt_length', 'cabplus_excerpt_length' );

/* ── 9. FALLBACK NAV ── */
if ( ! function_exists( 'cabplus_fallback_nav' ) ) {
    function cabplus_fallback_nav() {
        $svcs = cabplus_get_services();
        echo '<ul class="nav-list">';
        echo '<li><a href="' . esc_url(home_url('/')) . '">Home</a></li>';
        echo '<li class="menu-item-has-children"><a href="' . esc_url(home_url('/services')) . '">Services</a><ul class="sub-menu">';
        echo '<li class="sub-menu-all-services"><a href="' . esc_url(home_url('/services')) . '">All Services Overview &rarr;</a></li>';
        foreach ($svcs as $s) echo '<li><a href="' . esc_url(home_url('/services/'.$s['slug'])) . '">' . strip_tags($s['title']) . '</a></li>';
        echo '</ul></li>';
        echo '<li><a href="' . esc_url(home_url('/pricing')) . '">Pricing</a></li>';
        echo '<li><a href="' . esc_url(home_url('/housing')) . '">Housing</a></li>';
        echo '<li><a href="' . esc_url(home_url('/about')) . '">About</a></li>';
        echo '<li><a href="' . esc_url(home_url('/contact')) . '">Contact</a></li>';
        echo '</ul>';
    }
}

/* ── 10. REWRITE RULES, DIRECT ROUTER & TEMPLATE LOADER ── */
function cabplus_add_rewrite_rules() {
    add_rewrite_rule( '^(?:services|service)/([a-z0-9\-]+)/?$', 'index.php?cabplus_service_slug=$matches[1]', 'top' );
    add_rewrite_rule( '^(?:services|service)/?$', 'index.php?cabplus_page=services', 'top' );
}
add_action( 'init', 'cabplus_add_rewrite_rules' );

function cabplus_query_vars( $vars ) {
    if ( ! in_array('cabplus_service_slug', $vars, true) ) $vars[] = 'cabplus_service_slug';
    if ( ! in_array('cabplus_page', $vars, true) ) $vars[] = 'cabplus_page';
    return $vars;
}
add_filter( 'query_vars', 'cabplus_query_vars' );

function cabplus_pre_get_posts( $q ) {
    if ( is_admin() || ! $q->is_main_query() ) return;
    $slug = $q->get('cabplus_service_slug');
    if ( $slug ) {
        $q->set('post_type', 'cabplus_service');
        $q->set('name', $slug);
        $q->is_404 = false;
        $q->is_single = true;
        $q->is_singular = true;
        $q->is_archive = false;
    } elseif ( $q->get('cabplus_page') === 'services' ) {
        $q->is_404 = false;
        $q->is_page = true;
        $q->is_archive = false;
    }
}
add_action( 'pre_get_posts', 'cabplus_pre_get_posts' );

/**
 * Foolproof direct router for /services/ and all 7 individual service pages.
 * Intercepts the request at template_redirect (priority 1) regardless of rewrite cache state.
 */
function cabplus_direct_service_router() {
    $req_uri = $_SERVER['REQUEST_URI'] ?? '';
    $path = parse_url( $req_uri, PHP_URL_PATH ) ?: '';

    // Strip WordPress subdirectory path if installed in subfolder
    $home_path = parse_url( home_url(), PHP_URL_PATH ) ?: '';
    if ( $home_path && $home_path !== '/' && strpos( $path, $home_path ) === 0 ) {
        $path = substr( $path, strlen($home_path) );
    }
    $trimmed = trim( $path, '/' );

    // 1. Check for /services/ or /services
    if ( $trimmed === 'services' || $trimmed === 'service' ) {
        global $wp_query;
        $wp_query->is_404      = false;
        $wp_query->is_page     = true;
        $wp_query->is_singular = false;
        $wp_query->is_archive  = false;
        status_header( 200 );
        $tpl = get_template_directory() . '/page-templates/page-services.php';
        if ( ! file_exists($tpl) ) {
            $tpl = get_template_directory() . '/archive-cabplus_service.php';
        }
        if ( file_exists($tpl) ) {
            include $tpl;
            exit;
        }
    }

    // 2. Check for /services/{slug}/ or /service/{slug}
    if ( preg_match( '#^(?:services|service)/([a-z0-9\-]+)$#i', $trimmed, $matches ) ) {
        $slug = strtolower( sanitize_title( $matches[1] ) );
        set_query_var( 'cabplus_service_slug', $slug );

        global $wp_query, $post;
        $wp_query->is_404      = false;
        $wp_query->is_single   = true;
        $wp_query->is_singular = true;
        $wp_query->is_page     = false;
        $wp_query->is_archive  = false;
        status_header( 200 );

        // If post exists in DB, bind it so standard WP template tags function
        $cpt_posts = get_posts( array(
            'name'        => $slug,
            'post_type'   => 'cabplus_service',
            'post_status' => array( 'publish', 'draft', 'pending' ),
            'numberposts' => 1
        ) );
        if ( ! empty($cpt_posts) ) {
            $wp_query->queried_object    = $cpt_posts[0];
            $wp_query->queried_object_id = $cpt_posts[0]->ID;
            $wp_query->post              = $cpt_posts[0];
            $wp_query->posts             = array( $cpt_posts[0] );
            $wp_query->post_count        = 1;
            $post                        = $cpt_posts[0];
            setup_postdata( $post );
        }

        $tpl = get_template_directory() . '/single-cabplus_service.php';
        if ( file_exists($tpl) ) {
            include $tpl;
            exit;
        }
    }
}
add_action( 'template_redirect', 'cabplus_direct_service_router', 1 );

function cabplus_template_loader( $template ) {
    // 1. Single service page requested by slug or CPT
    $slug = get_query_var('cabplus_service_slug');
    if ( ! $slug && is_singular('cabplus_service') ) {
        $post = get_queried_object();
        if ( $post && isset($post->post_name) ) {
            $slug = $post->post_name;
        }
    }
    if ( $slug ) {
        status_header(200);
        $t = get_template_directory() . '/single-cabplus_service.php';
        if ( file_exists($t) ) return $t;
    }

    // 2. All Services overview page (/services/)
    if ( is_page('services') || is_post_type_archive('cabplus_service') || get_query_var('cabplus_page') === 'services' ) {
        status_header(200);
        $t = get_template_directory() . '/page-templates/page-services.php';
        if ( ! file_exists($t) ) $t = get_template_directory() . '/archive-cabplus_service.php';
        if ( file_exists($t) ) return $t;
    }

    return $template;
}
add_filter( 'template_include', 'cabplus_template_loader' );

/* ── 11. AUTOMATED SELF-INITIALIZATION & PAGE CREATION ── */
function cabplus_auto_setup() {
    // 1. Ensure permalink structure is /%postname%/
    if ( ! get_option('permalink_structure') ) {
        global $wp_rewrite;
        if ( is_object($wp_rewrite) ) {
            $wp_rewrite->set_permalink_structure('/%postname%/');
        }
        update_option('permalink_structure', '/%postname%/');
    }

    // 2. Helper to find existing page by slug
    $find_page = function( $slug ) {
        $p = get_page_by_path( $slug );
        if ( $p ) return $p;
        $pages = get_posts( array(
            'name'        => $slug,
            'post_type'   => 'page',
            'post_status' => array('publish', 'draft', 'pending'),
            'numberposts' => 1
        ) );
        return ( ! empty($pages) ) ? $pages[0] : null;
    };

    // 3. Define pages with template assignments
    $pages = array(
        array( 'title' => 'Home',                         'slug' => 'home',     'tpl' => 'front-page.php' ),
        array( 'title' => 'Our Services',                 'slug' => 'services', 'tpl' => 'page-templates/page-services.php' ),
        array( 'title' => 'Pricing and Packages',         'slug' => 'pricing',  'tpl' => 'page-templates/page-pricing.php'  ),
        array( 'title' => 'Housing and Supported Living', 'slug' => 'housing',  'tpl' => 'page-templates/page-housing.php'  ),
        array( 'title' => 'About CABPLUS',                'slug' => 'about',    'tpl' => 'page-templates/page-about.php'    ),
        array( 'title' => 'Contact Us',                   'slug' => 'contact',  'tpl' => 'page-templates/page-contact.php'  ),
    );

    $page_ids = array();
    foreach ( $pages as $d ) {
        $ex = $find_page( $d['slug'] );
        if ( ! $ex ) {
            $id = wp_insert_post( array(
                'post_title'     => $d['title'],
                'post_name'      => $d['slug'],
                'post_status'    => 'publish',
                'post_type'      => 'page',
                'comment_status' => 'closed',
            ) );
            if ( $id && ! is_wp_error($id) ) {
                if ( ! empty($d['tpl']) ) update_post_meta( $id, '_wp_page_template', $d['tpl'] );
                $page_ids[$d['slug']] = $id;
            }
        } else {
            $page_ids[$d['slug']] = $ex->ID;
            if ( ! empty($d['tpl']) && ! get_post_meta( $ex->ID, '_wp_page_template', true ) ) {
                update_post_meta( $ex->ID, '_wp_page_template', $d['tpl'] );
            }
        }
    }

    // 4. Publish 7 CPT service posts into WordPress database for native routing
    $services_data = cabplus_get_services();
    foreach ( $services_data as $s ) {
        $cpt_post = get_posts( array(
            'name'        => $s['slug'],
            'post_type'   => 'cabplus_service',
            'post_status' => array('publish', 'draft'),
            'numberposts' => 1,
        ) );
        if ( empty($cpt_post) ) {
            wp_insert_post( array(
                'post_title'   => strip_tags($s['title']),
                'post_name'    => $s['slug'],
                'post_status'  => 'publish',
                'post_type'    => 'cabplus_service',
                'post_content' => cabplus_service_default_content($s['slug']),
                'post_excerpt' => $s['short'],
            ) );
        }
    }

    // 5. Set Static Front Page to Home
    if ( ! empty($page_ids['home']) ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $page_ids['home'] );
    }

    // 6. Build & Assign Primary Navigation Menu
    $menu_name = 'CABPLUS Main Menu';
    $menu_obj  = wp_get_nav_menu_object( $menu_name );
    $menu_id   = $menu_obj ? $menu_obj->term_id : 0;
    if ( ! $menu_id ) {
        $menu_id = wp_create_nav_menu( $menu_name );
    }

    if ( $menu_id && ! is_wp_error($menu_id) ) {
        $existing_items = wp_get_nav_menu_items( $menu_id );
        if ( empty($existing_items) ) {
            // Home
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'  => 'Home',
                'menu-item-url'    => home_url('/'),
                'menu-item-status' => 'publish',
                'menu-item-type'   => 'custom',
            ) );
            // Services (Parent link to /services/)
            $services_parent_id = 0;
            if ( ! empty($page_ids['services']) ) {
                $services_parent_id = wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => 'Services',
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['services'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            } else {
                $services_parent_id = wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'  => 'Services',
                    'menu-item-url'    => home_url('/services/'),
                    'menu-item-type'   => 'custom',
                    'menu-item-status' => 'publish',
                ) );
            }
            // All Services Overview (First sub-menu item)
            wp_update_nav_menu_item( $menu_id, 0, array(
                'menu-item-title'     => 'All Services Overview',
                'menu-item-url'       => home_url('/services/'),
                'menu-item-type'      => 'custom',
                'menu-item-status'    => 'publish',
                'menu-item-parent-id' => $services_parent_id,
                'menu-item-classes'   => 'sub-menu-all-services',
            ) );
            // 7 Individual Services
            foreach ( $services_data as $s ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => strip_tags($s['title']),
                    'menu-item-url'       => home_url('/services/' . $s['slug'] . '/'),
                    'menu-item-type'      => 'custom',
                    'menu-item-status'    => 'publish',
                    'menu-item-parent-id' => $services_parent_id,
                ) );
            }
            // Pricing
            if ( ! empty($page_ids['pricing']) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => 'Pricing',
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['pricing'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
            // Housing
            if ( ! empty($page_ids['housing']) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => 'Housing',
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['housing'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
            // About
            if ( ! empty($page_ids['about']) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => 'About',
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['about'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
            // Contact
            if ( ! empty($page_ids['contact']) ) {
                wp_update_nav_menu_item( $menu_id, 0, array(
                    'menu-item-title'     => 'Contact',
                    'menu-item-object'    => 'page',
                    'menu-item-object-id' => $page_ids['contact'],
                    'menu-item-type'      => 'post_type',
                    'menu-item-status'    => 'publish',
                ) );
            }
        }
        $locations = get_theme_mod( 'nav_menu_locations' );
        if ( empty($locations) || ! is_array($locations) ) $locations = array();
        $locations['primary'] = (int) $menu_id;
        set_theme_mod( 'nav_menu_locations', $locations );
    }

    // 7. Flush rewrite rules
    cabplus_add_rewrite_rules();
    flush_rewrite_rules( false );

    // 8. Mark auto setup done (v5)
    update_option( 'cabplus_theme_auto_setup_done', 5 );
}

function cabplus_create_required_pages() {
    cabplus_auto_setup();
}

add_action( 'after_switch_theme', 'cabplus_auto_setup' );
add_action( 'init', function() {
    if ( (int) get_option( 'cabplus_theme_auto_setup_done', 0 ) < 5 ) {
        cabplus_auto_setup();
    }
}, 30 );

/* ── 12. AJAX CONTACT FORM ── */
function cabplus_ajax_contact_handler() {
    if ( ! isset($_POST['nonce']) || ! wp_verify_nonce( sanitize_text_field(wp_unslash($_POST['nonce'])), 'cabplus_contact_nonce' ) )
        wp_send_json_error( array('message' => 'Security check failed. Please refresh and try again.') );

    $name    = sanitize_text_field( wp_unslash( $_POST['name']    ?? '' ) );
    $email   = sanitize_email(      wp_unslash( $_POST['email']   ?? '' ) );
    $phone   = sanitize_text_field( wp_unslash( $_POST['phone']   ?? '' ) );
    $service = sanitize_text_field( wp_unslash( $_POST['service'] ?? '' ) );
    $message = sanitize_textarea_field( wp_unslash( $_POST['message'] ?? '' ) );

    if ( ! empty($_POST['website']) ) wp_send_json_success( array('message' => 'Thank you!') );

    $err = array();
    if ( empty($name) )       $err[] = 'Please enter your full name.';
    if ( ! is_email($email) ) $err[] = 'Please enter a valid email address.';
    if ( empty($message) )    $err[] = 'Please enter a message.';
    if ( ! empty($err) )      wp_send_json_error( array('message' => implode(' ', $err)) );

    $to   = apply_filters('cabplus_contact_email_to', 'cp@cabplus.uk');
    $subj = 'New enquiry from ' . $name . ' - CABPLUS';
    $body = "Name: {$name}\nEmail: {$email}\nPhone: {$phone}\nService: {$service}\n\nMessage:\n{$message}";
    $hdrs = array('Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email);
    $sent = wp_mail($to, $subj, $body, $hdrs);

    if ($sent) {
        $subs   = get_option('cabplus_contact_submissions', array());
        $subs[] = compact('name','email','phone','service','message') + array('date' => current_time('mysql'));
        if ( count($subs) > 200 ) $subs = array_slice($subs, -200);
        update_option('cabplus_contact_submissions', $subs);
        wp_send_json_success( array('message' => 'Thank you! We have received your message and will respond within one business day.') );
    } else {
        wp_send_json_error( array('message' => 'Problem sending your message. Please email us at cp@cabplus.uk') );
    }
}
add_action('wp_ajax_cabplus_contact',        'cabplus_ajax_contact_handler');
add_action('wp_ajax_nopriv_cabplus_contact', 'cabplus_ajax_contact_handler');

/* ── 13. SHORTCODES ── */
function cabplus_shortcode_contact_form() {
    ob_start();
    echo '<div class="contact-form-wrap cabplus-ajax-form-wrap">';
    echo '<div class="cabplus-form-success" style="display:none;"><div class="form-success"><h3>Thank you!</h3><p>We have received your message and will respond within one business day.</p></div></div>';
    echo '<form class="cabplus-contact-form contact-form" novalidate>';
    echo '<div style="display:none;"><input type="text" name="website" value="" tabindex="-1" autocomplete="off"></div>';
    echo '<div class="form-row form-row--2">';
    echo '<div class="form-group"><label for="sc_n">Full name <span class="req">*</span></label><input type="text" name="name" id="sc_n" placeholder="Your name" required></div>';
    echo '<div class="form-group"><label for="sc_e">Email <span class="req">*</span></label><input type="email" name="email" id="sc_e" placeholder="you@company.com" required></div>';
    echo '</div><div class="form-row form-row--2">';
    echo '<div class="form-group"><label for="sc_p">Phone (optional)</label><input type="tel" name="phone" id="sc_p" placeholder="+44 7700 000000"></div>';
    echo '<div class="form-group"><label for="sc_s">Service</label><select name="service" id="sc_s"><option value="">Select a service</option><option>Business Ideas</option><option>Finance &amp; Investment</option><option>Business Registration</option><option>Business Growth</option><option>Social Media Marketing</option><option>Websites &amp; Digital Solutions</option><option>GDPR / ISO 27001 / Cyber Essentials</option><option>General enquiry</option></select></div>';
    echo '</div>';
    echo '<div class="form-group"><label for="sc_m">Message <span class="req">*</span></label><textarea name="message" id="sc_m" rows="5" placeholder="Tell us about your business and what you need help with..." required></textarea></div>';
    echo '<div class="cabplus-form-error form-errors" style="display:none;"></div>';
    echo '<button type="submit" class="btn btn-gold" style="width:100%;justify-content:center;padding:14px 24px;font-size:1rem;"><span class="btn-text">Send message &#8594;</span><span class="btn-loading" style="display:none;">Sending&#8230;</span></button>';
    echo '<p style="font-size:0.78rem;color:var(--cream-muted,rgba(244,242,234,0.6));margin-top:10px;text-align:center;">We respond within 1 business day.</p>';
    echo '</form></div>';
    return ob_get_clean();
}
add_shortcode('cabplus_contact_form', 'cabplus_shortcode_contact_form');

function cabplus_shortcode_services_grid() {
    $svcs = cabplus_get_services(); ob_start();
    echo '<div class="svc-cards">';
    foreach ($svcs as $i => $s) {
        echo '<a href="' . esc_url(home_url('/services/'.$s['slug'].'/')) . '" class="svc-card svc-card-' . ($i+1) . '" style="text-decoration:none;">';
        echo '<div class="svc-card-icon">' . cabplus_service_svg_icon_small($s['icon']) . '</div>';
        echo '<h3>' . esc_html(strip_tags($s['title'])) . '</h3><p>' . esc_html($s['short']) . '</p>';
        echo '<span class="svc-card-link">Learn more &#8594;</span></a>';
    }
    echo '</div>';
    return ob_get_clean();
}
add_shortcode('cabplus_services_grid', 'cabplus_shortcode_services_grid');

/* ── 14. DEFAULT SERVICE CONTENT ── */
function cabplus_service_default_content($slug) {
    $cta = '<p style="margin-top:20px;"><a href="' . home_url('/contact') . '" class="btn btn-gold">Book a free discovery call</a></p>';
    $c = array(
        'business-ideas' => '<h2>Turn your idea into a real business</h2><p>CABPLUS helps you bridge the gap from inspiration to a viable, fundable business plan.</p><h3>What we do</h3><ul><li>Idea validation and market research</li><li>Business model development</li><li>Competitor and pricing analysis</li><li>Business plan writing (investor-grade)</li><li>Financial projections and cash flow modelling</li><li>Pitch deck preparation</li></ul>' . $cta,
        'finance-investment' => '<h2>Access the funding your business needs</h2><p>CABPLUS helps you find the right funding route and present your case compellingly.</p><h3>What we do</h3><ul><li>Funding strategy and route mapping</li><li>Government grant identification and applications</li><li>Business loan application support</li><li>Investor pitch preparation</li><li>Financial planning and forecasting</li></ul>' . $cta,
        'business-registration' => '<h2>Get your business properly registered</h2><p>We handle the Companies House paperwork so you can focus on building your business.</p><h3>What we do</h3><ul><li>Companies House registration (Ltd, LLP, CIC)</li><li>VAT and PAYE registration</li><li>Registered office address</li><li>Initial statutory documents</li></ul>' . $cta,
        'business-growth' => '<h2>Scale your business with a clear strategy</h2><p>CABPLUS gives you the plan, systems and accountability to scale without losing control.</p><h3>What we do</h3><ul><li>Strategic growth planning</li><li>KPI and OKR framework design</li><li>Operational process documentation</li><li>Monthly accountability check-ins</li></ul>' . $cta,
        'social-media-marketing' => '<h2>Build a social presence that generates business</h2><p>CABPLUS builds and manages your social presence so you do not have to think about it.</p><h3>What we do</h3><ul><li>Social media strategy and content calendar</li><li>Profile set-up: Instagram, Facebook, LinkedIn</li><li>Managed posting and scheduling</li><li>Monthly performance reports</li></ul>' . $cta,
        'websites-digital-solutions' => '<h2>A professional online presence that works</h2><p>CABPLUS builds websites that look premium, load fast, and convert visitors into enquiries.</p><h3>What we do</h3><ul><li>WordPress website design and development</li><li>WooCommerce e-commerce</li><li>Booking and appointment systems</li><li>SEO foundation setup and hosting management</li></ul>' . $cta,
        'gdpr-iso-cyber' => '<h2>Stay audit-ready for GDPR, ISO 27001 and Cyber Essentials</h2><p>CABPLUS builds the documentation and processes that keep you ready for any audit, any time.</p><h3>What we do</h3><ul><li>GDPR privacy policy and data processing records</li><li>Risk registers and audit checklists</li><li>Cyber Essentials self-assessment preparation</li><li>ISO 27001 Annex A gap assessment</li><li>AI-assisted document management and renewal reminders</li></ul><p style="font-size:0.9em;color:var(--cream-muted);border-top:1px solid var(--ink-line);padding-top:12px;margin-top:16px;"><strong>Note:</strong> CABPLUS prepares your evidence. Formal certification is issued by accredited third-party bodies.</p>' . $cta,
    );
    return isset($c[$slug]) ? $c[$slug] : '<p>Content coming soon. <a href="' . home_url('/contact') . '">Contact us</a> to learn more.</p>';
}

/* ── 15. ADMIN: SETUP + SUBMISSIONS ── */
add_action('admin_menu', function() {
    add_menu_page('CABPLUS','CABPLUS','manage_options','cabplus-setup','cabplus_admin_setup_page','dashicons-awards',29);
    add_submenu_page('cabplus-setup','Setup','Setup','manage_options','cabplus-setup','cabplus_admin_setup_page');
    add_submenu_page('cabplus-setup','Submissions','Submissions','manage_options','cabplus-submissions','cabplus_admin_submissions_page');
});

function cabplus_admin_setup_page() {
    $tok = get_template() === 'cabplus-theme';
    $pok = get_option('permalink_structure') === '/%postname%/';
    $fok = get_option('show_on_front') === 'page' && (int)get_option('page_on_front') > 0;
    $slugs = array('services','pricing','housing','about','contact');
    if (isset($_POST['cabplus_do_setup']) && check_admin_referer('cabplus_setup')) {
        update_option('permalink_structure','/%postname%/');
        cabplus_create_required_pages();
        flush_rewrite_rules(false);
        $pok = true; $fok = true;
        echo '<div class="notice notice-success"><p>&#10003; Done! Pages created, permalinks set and flushed. <a href="' . home_url('/') . '" target="_blank">View site</a></p></div>';
    }
    echo '<div class="wrap"><h1>&#9881; CABPLUS Theme Setup</h1>';
    echo '<table class="wp-list-table widefat" style="max-width:720px;"><thead><tr><th>&#10003;</th><th>Check</th><th>Status</th><th>Action</th></tr></thead><tbody>';
    echo '<tr><td>' . ($tok?'<span style="color:green">&#10003;</span>':'<span style="color:red">&#10007;</span>') . '</td><td>Theme Active</td><td>' . ($tok?'<span style="color:green">Active</span>':'<span style="color:red">Not active</span>') . '</td><td>' . ($tok?'':' <a href="'.admin_url('themes.php').'" class="button button-small">Activate</a>') . '</td></tr>';
    echo '<tr><td>' . ($pok?'<span style="color:green">&#10003;</span>':'<span style="color:red">&#10007;</span>') . '</td><td>Permalinks</td><td>' . ($pok?'<span style="color:green">/%postname%/</span>':'<span style="color:red">'.esc_html(get_option('permalink_structure')?:'default').'</span>') . '</td><td>' . ($pok?'':'<a href="'.admin_url('options-permalink.php').'" class="button button-small">Fix</a>') . '</td></tr>';
    echo '<tr><td>' . ($fok?'<span style="color:green">&#10003;</span>':'<span style="color:red">&#10007;</span>') . '</td><td>Static Front Page</td><td>' . ($fok?'<span style="color:green">Set</span>':'<span style="color:red">Shows blog</span>') . '</td><td>' . ($fok?'':'<a href="'.admin_url('options-reading.php').'" class="button button-small">Fix</a>') . '</td></tr>';
    foreach ($slugs as $sl) {
        $pg = get_page_by_path($sl);
        echo '<tr><td>' . ($pg?'<span style="color:green">&#10003;</span>':'<span style="color:red">&#10007;</span>') . '</td><td>Page: <code>/' . esc_html($sl) . '/</code></td><td>' . ($pg?'<span style="color:green">Exists</span>':'<span style="color:red">Missing</span>') . '</td><td>' . ($pg?'<a href="'.get_permalink($pg->ID).'" target="_blank" class="button button-small">View</a>':'') . '</td></tr>';
    }
    echo '</tbody></table>';
    echo '<form method="post" style="margin-top:20px;">' . wp_nonce_field('cabplus_setup','_wpnonce',true,false);
    echo '<input type="hidden" name="cabplus_do_setup" value="1">';
    echo '<button type="submit" class="button button-primary button-hero">&#9889; One-Click Setup: Create Pages + Fix Permalinks</button>';
    echo '<p style="color:#666;margin-top:8px;">Creates all missing pages, assigns correct templates, sets permalink structure to Post Name.</p></form>';
    echo '<h2 style="margin-top:32px;">Shortcodes</h2>';
    echo '<p><code>[cabplus_contact_form]</code> &mdash; Full AJAX contact form on any page</p>';
    echo '<p><code>[cabplus_services_grid]</code> &mdash; All 7 service cards grid</p>';
    echo '</div>';
}

function cabplus_admin_submissions_page() {
    if (isset($_GET['clear']) && current_user_can('manage_options') && isset($_GET['_wpnonce']) && wp_verify_nonce(sanitize_text_field(wp_unslash($_GET['_wpnonce'])),'cabplus_clear')) {
        delete_option('cabplus_contact_submissions');
        wp_redirect(admin_url('admin.php?page=cabplus-submissions&cleared=1'));
        exit;
    }
    $subs = array_reverse(get_option('cabplus_contact_submissions', array()));
    echo '<div class="wrap"><h1>&#128386; CABPLUS &mdash; Contact Submissions</h1>';
    if (isset($_GET['cleared'])) echo '<div class="notice notice-success"><p>Cleared.</p></div>';
    if (empty($subs)) { echo '<div class="notice notice-info"><p>No submissions yet.</p></div></div>'; return; }
    echo '<p>' . count($subs) . ' submissions (newest first).</p>';
    echo '<table class="wp-list-table widefat fixed striped"><thead><tr><th style="width:140px">Date</th><th>Name</th><th>Email</th><th>Phone</th><th>Service</th><th>Message</th></tr></thead><tbody>';
    foreach ($subs as $s) {
        echo '<tr><td>'.esc_html($s['date']).'</td><td>'.esc_html($s['name']).'</td>';
        echo '<td><a href="mailto:'.esc_attr($s['email']).'">'.esc_html($s['email']).'</a></td>';
        echo '<td>'.esc_html($s['phone']??'-').'</td><td>'.esc_html($s['service']??'-').'</td>';
        echo '<td>'.esc_html(wp_trim_words($s['message']??'',16)).'</td></tr>';
    }
    echo '</tbody></table>';
    echo '<p style="margin-top:16px;"><a href="'.esc_url(wp_nonce_url(admin_url('admin.php?page=cabplus-submissions&clear=1'),'cabplus_clear')).'" class="button button-secondary" onclick="return confirm(\'Clear all submissions?\')">Clear all</a></p></div>';
}
