<?php
/**
 * Template Name: About
 * CABPLUS - page-templates/page-about.php
 */
get_header();
?>

<section class="page-hero">
  <div class="wrap">
    <span class="kicker mono">WHO WE ARE</span>
    <h1>About CABPLUS</h1>
    <p class="lead">A small, independent consultancy dedicated to making compliance straightforward, affordable and permanent for UK businesses.</p>
  </div>
</section>

<section class="about" style="padding-top:64px;padding-bottom:64px;">
  <div class="wrap about-grid">
    <div>
      <span class="kicker mono">OUR PHILOSOPHY</span>
      <h2 style="font-size:clamp(1.6rem,2.6vw,2.1rem);margin-top:18px;">Compliance run like a housing team runs a property portfolio</h2>
      <p>Most compliance work fails quietly &#8212; a policy gets written once and never updated, a certificate expires and nobody notices until an inspector does. We treat compliance the way a good housing administrator treats a block of flats: checked on a schedule, not a panic.</p>
      <p>We are a small, independent consultancy &#8212; not a reseller of accredited certificates. Where a standard requires third-party sign-off, such as ISO 27001 or Cyber Essentials Plus, we prepare your evidence and hand you to an accredited body for the final audit.</p>
      <p>Our tagline says it all: <strong style="color:var(--cream);">Ideas &#183; Compliance &#183; Growth &#183; A Brighter Tomorrow</strong>. We walk with businesses from day one &#8212; helping you find the right idea, register and launch, stay compliant, and scale with confidence.</p>
    </div>
    <div class="about-stats">
      <div class="stat"><div class="stat-num mono">7</div><div class="stat-label">core service areas &#8212; from business ideas through to full compliance certification</div></div>
      <div class="stat"><div class="stat-num mono">4</div><div class="stat-label">stages from first assessment to audit handoff</div></div>
      <div class="stat"><div class="stat-num mono">100%</div><div class="stat-label">independent &#8212; not affiliated with any certification body, accreditor or regulator</div></div>
      <div class="stat"><div class="stat-num mono">UK</div><div class="stat-label">based and focused exclusively on UK regulatory standards and housing legislation</div></div>
    </div>
  </div>
</section>

<!-- VALUES -->
<section style="padding:64px 0;border-top:1px solid var(--ink-line);border-bottom:1px solid var(--ink-line);">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">01</span>
      <div><h2>Our values</h2><p>What guides how we work with every client.</p></div>
    </div>
    <div class="about-values">
      <div class="value-card">
        <div class="value-card-num">01</div>
        <h3>Transparency</h3>
        <p>We tell you exactly what we can and cannot do. We do not sell certifications &#8212; only the preparation work that earns them.</p>
      </div>
      <div class="value-card">
        <div class="value-card-num">02</div>
        <h3>Continuity</h3>
        <p>Compliance is a schedule, not a project. We maintain your documents so they stay current between audits and inspections.</p>
      </div>
      <div class="value-card">
        <div class="value-card-num">03</div>
        <h3>Practicality</h3>
        <p>We write policies and procedures that reflect how your business actually operates, not a generic template that will not hold up to scrutiny.</p>
      </div>
      <div class="value-card">
        <div class="value-card-num">04</div>
        <h3>Growth focus</h3>
        <p>Compliance should enable growth, not block it. We build systems that scale with your business and reduce administrative friction.</p>
      </div>
    </div>
  </div>
</section>

<!-- PROCESS -->
<section class="process" id="process">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">HOW</span>
      <div><h2>How we work</h2><p>Every engagement follows the same four stages to make the result predictable and audit-ready.</p></div>
    </div>
    <div class="steps">
      <div class="step"><span class="step-num mono">STAGE 1</span><h3>Assessment</h3><p>We review what you already have against the standard you are working toward, and list the gaps.</p></div>
      <div class="step"><span class="step-num mono">STAGE 2</span><h3>Documentation</h3><p>Policies, registers and records get written or rebuilt to match how your business actually operates.</p></div>
      <div class="step"><span class="step-num mono">STAGE 3</span><h3>Implementation</h3><p>Controls go live, staff are briefed, and the compliance record starts tracking evidence as it is created.</p></div>
      <div class="step"><span class="step-num mono">STAGE 4</span><h3>Audit handoff</h3><p>We hand a complete, evidenced file to your accredited certification body or inspector.</p></div>
    </div>
  </div>
</section>

<section class="cta-final">
  <div class="wrap">
    <h2>Ready to work with us?</h2>
    <p>Get in touch and we will arrange a free 30-minute call to understand your needs.</p>
    <div class="hero-ctas" style="justify-content:center;margin-top:0;">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Contact us</a>
      <a href="<?php echo esc_url(home_url('/services')); ?>" class="btn btn-ghost">View services</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>