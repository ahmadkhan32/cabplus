<?php
/**
 * Template Name: Pricing
 * CABPLUS - page-templates/page-pricing.php
 */
get_header();
?>

<section class="page-hero">
  <div class="wrap">
    <span class="kicker mono">TRANSPARENT PACKAGES</span>
    <h1>Compliance &amp; Growth Pricing</h1>
    <p class="lead">Predictable fixed fees and monthly packages. Every package includes clear deliverables, scheduled check-ins, and audit-ready documentation.</p>
  </div>
</section>

<section class="pricing" style="border-top:none;">
  <div class="wrap">
    <div class="plans">

      <div class="plan">
        <div class="plan-name">Basic Documentation</div>
        <div class="plan-desc">A one-off set of core policies to get an existing or newly registered business compliant quickly.</div>
        <div class="plan-price mono">&#163;199&#8211;&#163;399</div>
        <ul>
          <li>GDPR privacy policy &amp; data map</li>
          <li>Core employee &amp; staff compliance policies</li>
          <li>Basic risk assessment &amp; register</li>
          <li>Statutory register setup</li>
          <li>Delivered within 5 business days</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-ghost">Start here</a>
      </div>

      <div class="plan featured">
        <div class="plan-name">Monthly Compliance Support</div>
        <div class="plan-desc">Ongoing documentation, scheduled monitoring, and continuous audit-readiness for trading businesses.</div>
        <div class="plan-price mono">&#163;299&#8211;&#163;799<span style="font-size:0.9rem;">/mo</span></div>
        <ul>
          <li>Everything included in Basic</li>
          <li>Staff training record tracking &amp; renewal alerts</li>
          <li>Quarterly risk assessment review &amp; updates</li>
          <li>Priority support before official inspections</li>
          <li>Monthly compliance dashboard report</li>
          <li>Direct phone &amp; email access to your lead consultant</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Most common choice</a>
      </div>

      <div class="plan">
        <div class="plan-name">ISO &amp; Cyber Readiness Project</div>
        <div class="plan-desc">A fixed-scope, end-to-end project to take your organization from current state to Stage 1 audit readiness.</div>
        <div class="plan-price mono">&#163;1,500&#8211;&#163;5,000+</div>
        <ul>
          <li>Comprehensive gap assessment against ISO 27001 Annex A</li>
          <li>Complete policy suite, procedures &amp; evidentiary trails</li>
          <li>Cyber Essentials self-assessment preparation</li>
          <li>Staff briefing &amp; pre-audit dry run</li>
          <li>Direct handoff to accredited certification bodies</li>
        </ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-ghost">Discuss scope</a>
      </div>

    </div>
  </div>
</section>

<section class="cta-final">
  <div class="wrap">
    <h2>Need a custom package for multiple locations or properties?</h2>
    <p>We tailor retainer and project scopes for housing providers, supported living networks, and growing small businesses across the UK.</p>
    <div class="hero-ctas" style="justify-content:center;margin-top:0;">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Request a Custom Proposal</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>