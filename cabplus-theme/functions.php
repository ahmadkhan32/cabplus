<?php
/**
 * CABPLUS AI Compliance — functions.php
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'CABPLUS_VERSION', '2.0' );

/* ─── Theme Setup ─── */
function cabplus_setup() {
    load_theme_textdomain( 'cabplus', get_template_directory() . '/languages' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form','comment-form','comment-list','gallery','caption','style','script' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 200,
        'flex-height' => true,
        'flex-width'  => true,
    ) );
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'cabplus' ),
        'footer'  => __( 'Footer Menu',  'cabplus' ),
    ) );
}
add_action( 'after_setup_theme', 'cabplus_setup' );

/* ─── Enqueue Assets ─── */
function cabplus_enqueue_assets() {
    wp_enqueue_style( 'google-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500&display=swap',
        array(), null );

    wp_enqueue_style( 'cabplus-main',
        get_template_directory_uri() . '/assets/css/cabplus.css',
        array(), CABPLUS_VERSION );

    wp_enqueue_script( 'cabplus-main',
        get_template_directory_uri() . '/assets/js/main.js',
        array(), CABPLUS_VERSION, true );

    wp_localize_script( 'cabplus-main', 'cabplusData', array(
        'homeUrl' => home_url('/'),
        'themeUrl' => get_template_directory_uri(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'cabplus_enqueue_assets' );

/* ─── Register Custom Post Type: Service ─── */
function cabplus_register_cpt() {
    $labels = array(
        'name'               => 'Services',
        'singular_name'      => 'Service',
        'add_new_item'       => 'Add New Service',
        'edit_item'          => 'Edit Service',
        'view_item'          => 'View Service',
        'search_items'       => 'Search Services',
        'not_found'          => 'No services found',
    );
    register_post_type( 'cabplus_service', array(
        'labels'       => $labels,
        'public'       => true,
        'has_archive'  => true,
        'menu_icon'    => 'dashicons-awards',
        'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'rewrite'      => array( 'slug' => 'services' ),
        'show_in_rest' => true,
    ) );
}
add_action( 'init', 'cabplus_register_cpt' );

/* ─── Helper: CABPLUS SVG Logo ─── */
function cabplus_svg_logo( $size = 56 ) {
    ob_start(); ?>
    <svg width="<?php echo esc_attr($size); ?>" height="<?php echo esc_attr($size); ?>" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
      <path d="M84 50 A34 34 0 1 1 50 16" stroke="url(#hgoldArc)" stroke-width="5" stroke-linecap="round" fill="none"/>
      <path d="M76 50 A26 26 0 1 1 50 24" stroke="#0F2044" stroke-width="9" stroke-linecap="round" fill="none"/>
      <polygon points="50,25 37,62 63,62" fill="#0F2044"/>
      <polygon points="50,33 41,58 59,58" fill="url(#hgoldGrad)"/>
      <polygon points="50,46 44,58 56,58" fill="#0F2044"/>
      <rect x="59" y="25" width="9" height="25" rx="4" fill="#0F2044"/>
      <rect x="59" y="25" width="9" height="13" rx="4.5" fill="url(#hgoldGrad)"/>
      <rect x="66" y="39" width="4" height="8" rx="1" fill="url(#hgoldGrad)"/>
      <rect x="72" y="33" width="4" height="14" rx="1" fill="url(#hgoldGrad)"/>
      <rect x="78" y="27" width="4" height="20" rx="1" fill="url(#hgoldGrad)"/>
      <polyline points="73,23 85,23 85,35" stroke="url(#hgoldGrad)" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round" fill="none"/>
      <defs>
        <linearGradient id="hgoldArc" x1="50" y1="16" x2="84" y2="50" gradientUnits="userSpaceOnUse">
          <stop offset="0%" stop-color="#d4aa40"/><stop offset="100%" stop-color="#9a7820"/>
        </linearGradient>
        <linearGradient id="hgoldGrad" x1="0" y1="0" x2="1" y2="1" gradientUnits="objectBoundingBox">
          <stop offset="0%" stop-color="#d4aa40"/><stop offset="100%" stop-color="#8a6e1a"/>
        </linearGradient>
      </defs>
    </svg>
    <?php return ob_get_clean();
}

/* ─── Services Data ─── */
function cabplus_get_services() {
    return array(
        array(
            'slug'  => 'business-ideas',
            'title' => 'Business Ideas',
            'short' => 'From concept to fundable business plan.',
            'color' => 'linear-gradient(135deg,#1a3a6b,#2a5298)',
            'icon'  => 'idea',
        ),
        array(
            'slug'  => 'finance-investment',
            'title' => 'Finance &amp; Investment',
            'short' => 'Funding strategies and investor-ready documentation.',
            'color' => 'linear-gradient(135deg,#6b4c00,#b8962e)',
            'icon'  => 'finance',
        ),
        array(
            'slug'  => 'business-registration',
            'title' => 'Business Registration',
            'short' => 'Companies House formation and statutory filings.',
            'color' => 'linear-gradient(135deg,#1a4a2e,#2d7a4f)',
            'icon'  => 'registration',
        ),
        array(
            'slug'  => 'business-growth',
            'title' => 'Business Growth',
            'short' => 'Strategy, systems and milestones to scale.',
            'color' => 'linear-gradient(135deg,#0d5c8f,#1a8fd1)',
            'icon'  => 'growth',
        ),
        array(
            'slug'  => 'social-media-marketing',
            'title' => 'Social Media Marketing',
            'short' => 'Content strategy and managed posting across all channels.',
            'color' => 'linear-gradient(135deg,#4a1a6b,#8b2dbf)',
            'icon'  => 'social',
        ),
        array(
            'slug'  => 'websites-digital-solutions',
            'title' => 'Websites &amp; Digital Solutions',
            'short' => 'Professional websites and custom digital tools.',
            'color' => 'linear-gradient(135deg,#0d4a6e,#1278b4)',
            'icon'  => 'web',
        ),
        array(
            'slug'  => 'gdpr-iso-cyber',
            'title' => 'GDPR / ISO 27001 / Cyber Essentials',
            'short' => 'Full compliance documentation and audit readiness.',
            'color' => 'linear-gradient(135deg,#0f2044,#1a5fa8)',
            'icon'  => 'shield',
        ),
    );
}

/* ─── Excerpt length ─── */
function cabplus_excerpt_length( $length ) { return 25; }
add_filter( 'excerpt_length', 'cabplus_excerpt_length' );

/* ─── Body class ─── */
function cabplus_body_class( $classes ) {
    $classes[] = 'cabplus-site';
    return $classes;
}
add_filter( 'body_class', 'cabplus_body_class' );

/* ─── Add page slug to body ─── */
function cabplus_add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
        $classes[] = 'page-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'cabplus_add_slug_body_class' );

/* ─── Service SVG Icons (large, for circle) ─── */
function cabplus_service_svg_icon( $icon, $size = 32 ) {
    $s = $size;
    $icons = array(
        'idea' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="12" r="6" stroke="#fff" stroke-width="1.8"/><path d="M13 18v4a3 3 0 006 0v-4" stroke="#fff" stroke-width="1.8" stroke-linecap="round"/><line x1="16" y1="6" x2="16" y2="4" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/><line x1="22" y1="9" x2="24" y2="7" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/><line x1="10" y1="9" x2="8" y2="7" stroke="#d4aa40" stroke-width="2" stroke-linecap="round"/></svg>',
        'finance' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="11" stroke="#fff" stroke-width="1.8"/><circle cx="16" cy="16" r="6" stroke="#d4aa40" stroke-width="1.4" stroke-dasharray="3 2"/><path d="M16 9v2M16 21v2M9 16h2M21 16h2" stroke="#fff" stroke-width="1.7" stroke-linecap="round"/><circle cx="16" cy="16" r="2.5" fill="#d4aa40"/></svg>',
        'registration' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="6" y="4" width="20" height="24" rx="2" stroke="#fff" stroke-width="1.8"/><path d="M11 11h10M11 15h10M11 19h7" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/><path d="M22 22l2 2 4-4" stroke="#fff" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'growth' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="4" y="20" width="5" height="8" rx="1" fill="#d4aa40"/><rect x="11" y="15" width="5" height="13" rx="1" fill="#d4aa40"/><rect x="18" y="10" width="5" height="18" rx="1" fill="#d4aa40"/><path d="M5 20L12 12 17 15 25 6" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/><polyline points="21,6 25,6 25,10" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'social' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><rect x="2" y="2" width="12" height="12" rx="3" stroke="#fff" stroke-width="1.6"/><circle cx="8" cy="8" r="3" stroke="#fff" stroke-width="1.3"/><circle cx="12.5" cy="3.5" r="1" fill="#d4aa40"/><rect x="18" y="2" width="12" height="12" rx="3" fill="#1877F2" opacity="0.8"/><path d="M23 14V10c0-1 .5-2 2-2h2V6h-2c-2.5 0-4 1.5-4 4v4" stroke="#fff" stroke-width="1.4" stroke-linecap="round"/><line x1="19.5" y1="10.5" x2="23" y2="10.5" stroke="#fff" stroke-width="1.3"/><rect x="2" y="18" width="12" height="12" rx="3" fill="#0A66C2" opacity="0.85"/><circle cx="6" cy="21.5" r="1.2" fill="#fff"/><line x1="6" y1="24" x2="6" y2="29" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/><line x1="10" y1="24" x2="10" y2="29" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/><path d="M10 24.5c0-2.5 3.5-2.5 3.5 0V29" stroke="#fff" stroke-width="1.5" stroke-linecap="round"/><path d="M23 20l1.2 2.4 2.6 1-2.6 1.2-1.2 2.4-1.2-2.4-2.6-1.2 2.6-1z" fill="#d4aa40"/></svg>',
        'web' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><circle cx="16" cy="16" r="12" stroke="#fff" stroke-width="1.8"/><ellipse cx="16" cy="16" rx="5.5" ry="12" stroke="#d4aa40" stroke-width="1.4"/><line x1="4" y1="16" x2="28" y2="16" stroke="#fff" stroke-width="1.4"/><path d="M5.5 10.5h21M5.5 21.5h21" stroke="#fff" stroke-width="1.1" stroke-dasharray="2.5 2"/></svg>',
        'shield' => '<svg width="'.$s.'" height="'.$s.'" viewBox="0 0 32 32" fill="none"><path d="M16 3L4 8.5v8.5C4 23.5 9 29 16 31c7-2 12-7.5 12-14V8.5z" stroke="#fff" stroke-width="1.8" fill="rgba(26,95,168,0.25)"/><path d="M10 16.5l4 4 8-8.5" stroke="#d4aa40" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    );
    return isset($icons[$icon]) ? $icons[$icon] : $icons['shield'];
}

/* ─── Service SVG Icons (small, for cards) ─── */
function cabplus_service_svg_icon_small( $icon ) {
    $colors = array(
        'idea'         => '#6ea8fe',
        'finance'      => '#d4aa40',
        'registration' => '#4ade80',
        'growth'       => '#38bdf8',
        'social'       => '#c084fc',
        'web'          => '#38bdf8',
        'shield'       => '#6ea8fe',
    );
    $c = isset($colors[$icon]) ? $colors[$icon] : '#6ea8fe';
    $icons = array(
        'idea'         => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="9" r="5" stroke="'.$c.'" stroke-width="1.6"/><path d="M9 14v4a3 3 0 006 0v-4" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round"/><line x1="12" y1="4" x2="12" y2="2" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/><line x1="18" y1="6.5" x2="19.5" y2="5" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/><line x1="6" y1="6.5" x2="4.5" y2="5" stroke="#d4aa40" stroke-width="1.6" stroke-linecap="round"/></svg>',
        'finance'      => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="'.$c.'" stroke-width="1.6"/><path d="M12 7v2M12 15v2M8 12h2M14 12h2" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round"/><circle cx="12" cy="12" r="2.5" fill="'.$c.'"/></svg>',
        'registration' => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="4" y="2" width="16" height="20" rx="2" stroke="'.$c.'" stroke-width="1.6"/><path d="M8 8h8M8 12h8M8 16h5" stroke="'.$c.'" stroke-width="1.5" stroke-linecap="round"/><path d="M16 17l1.5 1.5 3-3" stroke="'.$c.'" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'growth'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="3" y="14" width="3.5" height="6" rx="1" fill="'.$c.'"/><rect x="8.5" y="10" width="3.5" height="10" rx="1" fill="'.$c.'"/><rect x="14" y="6" width="3.5" height="14" rx="1" fill="'.$c.'"/><path d="M4 14L9.5 8 14 11 21 4" stroke="#d4aa40" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/><polyline points="17,4 21,4 21,8" stroke="#d4aa40" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/></svg>',
        'social'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><rect x="2" y="2" width="9" height="9" rx="2" stroke="'.$c.'" stroke-width="1.5"/><circle cx="6.5" cy="6.5" r="2" stroke="'.$c.'" stroke-width="1.3"/><circle cx="9.5" cy="3.5" r="0.7" fill="#d4aa40"/><rect x="13" y="2" width="9" height="9" rx="2" fill="#1877F2" opacity="0.7"/><path d="M17.5 11V8c0-.8.5-1.5 1.5-1.5H20V5h-1.5C16.5 5 15 6.5 15 8V11" stroke="#fff" stroke-width="1.2" stroke-linecap="round"/><line x1="14.5" y1="8.5" x2="17.5" y2="8.5" stroke="#fff" stroke-width="1.2"/><rect x="2" y="13" width="9" height="9" rx="2" fill="#0A66C2" opacity="0.8"/><circle cx="5" cy="16" r="0.8" fill="#fff"/><line x1="5" y1="18" x2="5" y2="21" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/><line x1="8" y1="18" x2="8" y2="21" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/><path d="M8 18.5c0-2 3-2 3 0V21" stroke="#fff" stroke-width="1.3" stroke-linecap="round"/><path d="M17 16l1 2 2 1-2 1-1 2-1-2-2-1 2-1z" fill="#d4aa40"/></svg>',
        'web'          => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><circle cx="12" cy="12" r="9" stroke="'.$c.'" stroke-width="1.6"/><ellipse cx="12" cy="12" rx="4" ry="9" stroke="'.$c.'" stroke-width="1.3"/><line x1="3" y1="12" x2="21" y2="12" stroke="'.$c.'" stroke-width="1.3"/><path d="M4.5 8h15M4.5 16h15" stroke="'.$c.'" stroke-width="1.1" stroke-dasharray="2 2"/></svg>',
        'shield'       => '<svg width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M12 2L3 6v7c0 5 3.8 9.7 9 11 5.2-1.3 9-6 9-11V6z" stroke="'.$c.'" stroke-width="1.6" fill="rgba(26,95,168,0.2)"/><path d="M8 12l3 3 5-5.5" stroke="#d4aa40" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>',
    );
    return isset($icons[$icon]) ? $icons[$icon] : $icons['shield'];
}

/* ─── Default service page content ─── */
function cabplus_service_default_content( $slug ) {
    $content = array(
        'business-ideas' => '<h2>Turn your idea into a real business</h2>
<p>Every great business starts with an idea. But moving from inspiration to a viable, fundable plan is where most people get stuck. CABPLUS helps you bridge that gap.</p>
<h3>What we do</h3>
<ul><li>Initial idea validation and market research</li><li>Business model development</li><li>Competitor and pricing analysis</li><li>Business plan writing (investor-grade)</li><li>Financial projections and cash flow modelling</li><li>Pitch deck preparation</li></ul>
<h3>Who this is for</h3>
<p>Aspiring entrepreneurs, people leaving employment to start their own business, or existing business owners looking to launch a new product or service.</p>
<h3>How it works</h3>
<p>We start with a 30-minute discovery call to understand your idea and your goals. From there, we scope the work and agree a fixed fee. Most business plan packages are completed within 2&#8211;4 weeks.</p>',

        'finance-investment' => '<h2>Access the funding your business needs</h2>
<p>Whether you need startup capital, a growth loan, grant funding or support attracting investors, CABPLUS helps you find the right route and present your case compellingly.</p>
<h3>What we do</h3>
<ul><li>Funding strategy and route mapping</li><li>Government grant identification and applications</li><li>Business loan application support</li><li>Investor pitch preparation</li><li>Financial planning and forecasting</li><li>Cash flow and P&amp;L modelling</li></ul>
<h3>Funding sources we regularly work with</h3>
<p>Start Up Loans scheme, Innovate UK grants, local enterprise partnership funds, angel networks and crowdfunding platforms.</p>',

        'business-registration' => '<h2>Get your business properly registered</h2>
<p>Registering a company is straightforward when you know what you're doing. CABPLUS handles the paperwork so you can focus on building your business.</p>
<h3>What we do</h3>
<ul><li>Companies House registration (Ltd, LLP, CIC)</li><li>SIC code selection</li><li>Registered office address</li><li>Confirmation statement filing</li><li>VAT registration</li><li>PAYE registration</li><li>Initial statutory documents</li></ul>
<h3>Beyond registration</h3>
<p>We also help you set up your basic operational infrastructure: a business bank account recommendation, basic accounting software, and your first set of company policies.</p>',

        'business-growth' => '<h2>Scale your business with a clear strategy</h2>
<p>Growth without structure leads to chaos. CABPLUS gives you the plan, the systems and the accountability to scale without losing control of quality or compliance.</p>
<h3>What we do</h3>
<ul><li>Strategic growth planning</li><li>KPI and OKR framework design</li><li>Operational process documentation</li><li>Team structure and hiring planning</li><li>Monthly accountability check-ins</li><li>Systems and software recommendations</li></ul>
<h3>Results you can expect</h3>
<p>Clients working with our growth programme typically gain clarity on their next 12&#8211;24 months, reduce operational fire-fighting, and create the documented systems needed to bring on staff and delegate effectively.</p>',

        'social-media-marketing' => '<h2>Build a social presence that generates business</h2>
<p>Social media only works when it's consistent, on-brand and genuinely useful to your audience. CABPLUS builds and manages your social presence so you don't have to think about it.</p>
<h3>What we do</h3>
<ul><li>Social media audit and strategy</li><li>Brand voice and content guidelines</li><li>Profile set-up and optimisation (Instagram, Facebook, LinkedIn)</li><li>Content calendar creation</li><li>Managed posting and scheduling</li><li>Engagement monitoring</li><li>Monthly performance reports</li></ul>
<h3>Platforms we work with</h3>
<p>Instagram, Facebook, LinkedIn, Google Business Profile. We focus on the channels that matter for your sector, not every platform at once.</p>',

        'websites-digital-solutions' => '<h2>A professional online presence that works</h2>
<p>Your website is your most important business asset. CABPLUS builds websites that look premium, load fast, and convert visitors into enquiries.</p>
<h3>What we do</h3>
<ul><li>Website design and development (WordPress)</li><li>E-commerce (WooCommerce)</li><li>Booking and appointment systems</li><li>Landing pages and funnels</li><li>SEO foundation setup</li><li>Website maintenance and updates</li><li>Domain and hosting management</li></ul>
<h3>Technology we use</h3>
<p>WordPress (with Astra or custom themes), WooCommerce, Elementor, and standard hosting partners. We build sites that are easy to update and maintain without technical skills.</p>',

        'gdpr-iso-cyber' => '<h2>Stay audit-ready for GDPR, ISO 27001 and Cyber Essentials</h2>
<p>Compliance isn't a one-off project &#8212; it's an ongoing discipline. CABPLUS builds the documentation, evidence and processes that keep you ready for any audit, any time.</p>
<h3>What we do</h3>
<ul><li>GDPR privacy policy and data processing records</li><li>Subject access request procedures</li><li>Staff compliance records and training tracking</li><li>Risk registers and audit checklists</li><li>Cyber Essentials self-assessment preparation</li><li>ISO 27001 Annex A gap assessment and documentation</li><li>AI-assisted document management and renewal reminders</li></ul>
<h3>Standards we cover</h3>
<p>UK GDPR (ICO), ISO/IEC 27001:2022, NCSC Cyber Essentials, Cyber Essentials Plus (preparation only &#8212; final certification issued by accredited bodies).</p>
<h3>Important</h3>
<p>CABPLUS is an independent consultancy. We prepare your evidence and documentation; formal certification against ISO 27001 or Cyber Essentials is issued by accredited third-party certification bodies. We prepare you to pass their audit.</p>',
    );
    return isset($content[$slug]) ? $content[$slug] : '<p>Content coming soon. <a href="'.home_url('/contact').'">Contact us</a> to learn more about this service.</p>';
}
