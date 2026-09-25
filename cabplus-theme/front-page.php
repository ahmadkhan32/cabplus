<?php
/**
 * CABPLUS — front-page.php (Homepage)
 */
get_header();
$services = cabplus_get_services();
?>

<!-- SERVICES ICON BAR -->
<div class="services-bar" id="services-bar">
  <div class="wrap">
    <div class="services-bar-inner">
      <?php foreach ($services as $i => $svc): ?>
      <?php if ($i > 0): ?><div class="svc-divider"></div><?php endif; ?>
      <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'])); ?>" class="svc-icon-card svc-<?php echo ($i+1); ?>" title="<?php echo esc_attr(strip_tags($svc['title'])); ?>">
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

<!-- HERO -->
<section class="hero" id="hero">
  <div class="wrap hero-grid">
    <div>
      <span class="kicker mono">GDPR &#183; ISO 27001 &#183; Cyber Essentials</span>
      <h1>Compliance, documented and <span class="highlight">kept ready</span> for audit</h1>
      <p class="lead">We build and maintain the policies, records and risk assessments that GDPR, ISO 27001 and Cyber Essentials require &#8212; so your business stays audit-ready instead of scrambling before one.</p>
      <div class="hero-ctas">
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Book a compliance review</a>
        <a href="#services-bar" class="btn btn-ghost">See what we cover</a>
      </div>
      <p class="hero-note">Independent consultancy. Final certification is issued by accredited certification bodies &#8212; we prepare you to pass their audit.</p>
    </div>
    <div class="ledger" aria-hidden="true">
      <div class="ledger-head">
        <div>
          <div class="ledger-title">Compliance Register</div>
          <div class="ledger-ref mono">REF 2026-014 &#183; Reviewed weekly</div>
        </div>
        <span class="ledger-status">3 of 6 open</span>
      </div>
      <div class="ledger-row"><div class="check done"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-6" stroke="currentColor" stroke-width="1.6"/></svg></div><div class="ledger-label">GDPR privacy policy</div><div class="ledger-tag">DRAFTED</div></div>
      <div class="ledger-row"><div class="check done"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-6" stroke="currentColor" stroke-width="1.6"/></svg></div><div class="ledger-label">Staff access records</div><div class="ledger-tag">CURRENT</div></div>
      <div class="ledger-row"><div class="check pending"></div><div class="ledger-label">Risk register &#8212; Q3</div><div class="ledger-tag">IN REVIEW</div></div>
      <div class="ledger-row"><div class="check pending"></div><div class="ledger-label">Cyber Essentials self-assessment</div><div class="ledger-tag">DUE 12 OCT</div></div>
      <div class="ledger-row"><div class="check done"><svg viewBox="0 0 12 12" fill="none"><path d="M2 6l3 3 5-6" stroke="currentColor" stroke-width="1.6"/></svg></div><div class="ledger-label">Tenant file audit &#8212; Block C</div><div class="ledger-tag">COMPLETE</div></div>
      <div class="ledger-row"><div class="check pending"></div><div class="ledger-label">ISO 27001 gap assessment</div><div class="ledger-tag">SCHEDULED</div></div>
    </div>
  </div>
</section>

<!-- TRUST BAR -->
<div class="trust">
  <div class="wrap">
    <span class="trust-label">We prepare businesses for standards issued by:</span>
    <div class="trust-items">
      <span class="trust-item">UK GDPR / ICO</span>
      <span class="trust-item">ISO/IEC 27001</span>
      <span class="trust-item">NCSC Cyber Essentials</span>
      <span class="trust-item">Local Housing Authorities</span>
    </div>
  </div>
</div>

<!-- SERVICES OVERVIEW -->
<section class="services-full" id="services-section">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">01</span>
      <div>
        <h2>Everything we take off your plate</h2>
        <p>Seven core service areas &#8212; from your first business idea through to full compliance certification.</p>
      </div>
    </div>
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

<!-- PROCESS -->
<section class="process" id="process">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">02</span>
      <div><h2>How an engagement runs</h2><p>Four stages, from first assessment to the point an accredited auditor signs off.</p></div>
    </div>
    <div class="steps">
      <div class="step"><span class="step-num mono">STAGE 1</span><h3>Assessment</h3><p>We review what you already have against the standard you're working toward, and list the gaps.</p></div>
      <div class="step"><span class="step-num mono">STAGE 2</span><h3>Documentation</h3><p>Policies, registers and records get written or rebuilt to match how your business actually operates.</p></div>
      <div class="step"><span class="step-num mono">STAGE 3</span><h3>Implementation</h3><p>Controls go live, staff are briefed, and the compliance record starts tracking evidence as it's created.</p></div>
      <div class="step"><span class="step-num mono">STAGE 4</span><h3>Audit handoff</h3><p>We hand a complete, evidenced file to your accredited certification body or inspector.</p></div>
    </div>
  </div>
</section>

<!-- HOUSING -->
<section class="housing" id="housing">
  <div class="wrap housing-grid">
    <div>
      <span class="kicker mono">HOUSING &amp; SUPPORTED LIVING</span>
      <h2>Built for HMO and supported housing compliance</h2>
      <div class="housing-list">
        <div class="housing-item"><span class="dot"></span><p><strong>Tenant files, checked automatically.</strong> Missing gas certificates, expired EICRs and incomplete tenancy agreements get flagged before an inspection finds them.</p></div>
        <div class="housing-item"><span class="dot"></span><p><strong>Support notes kept in order.</strong> For supported housing, care and support records are organised and dated the way funders and regulators expect to see them.</p></div>
        <div class="housing-item"><span class="dot"></span><p><strong>Audit reminders that fire in advance.</strong> Renewal dates are tracked so nothing lapses between one visit and the next.</p></div>
      </div>
    </div>
    <div class="file-illustration">
      <div class="file-row"><svg class="file-icon" viewBox="0 0 16 16" fill="none"><path d="M3 1.5h7l3 3V14.5H3z" stroke="#3E7C6C" stroke-width="1.2"/><path d="M5.5 8h5M5.5 10.5h5" stroke="#3E7C6C" stroke-width="1.2"/></svg><span>Flat 4B &#8212; Gas Safety Certificate &#8212; valid to Mar 2027</span></div>
      <div class="file-row"><svg class="file-icon" viewBox="0 0 16 16" fill="none"><path d="M3 1.5h7l3 3V14.5H3z" stroke="#3E7C6C" stroke-width="1.2"/><path d="M5.5 8h5M5.5 10.5h5" stroke="#3E7C6C" stroke-width="1.2"/></svg><span>Flat 4B &#8212; Tenancy agreement &#8212; signed &amp; filed</span></div>
      <div class="file-row flag"><svg class="file-icon" viewBox="0 0 16 16" fill="none"><path d="M8 1.5v7M8 11v1.5" stroke="#C2793A" stroke-width="1.4" stroke-linecap="round"/></svg><span>Flat 2A &#8212; EICR expired 14 days ago &#8212; action needed</span></div>
      <div class="file-row"><svg class="file-icon" viewBox="0 0 16 16" fill="none"><path d="M3 1.5h7l3 3V14.5H3z" stroke="#3E7C6C" stroke-width="1.2"/><path d="M5.5 8h5M5.5 10.5h5" stroke="#3E7C6C" stroke-width="1.2"/></svg><span>Flat 5C &#8212; Fire risk assessment &#8212; reviewed Aug 2026</span></div>
    </div>
  </div>
</section>

<!-- PRICING -->
<section class="pricing" id="pricing">
  <div class="wrap">
    <div class="section-head">
      <span class="section-num mono">03</span>
      <div><h2>Packages</h2><p>Priced as a starting point &#8212; most clients settle into a monthly package after the first documentation pass.</p></div>
    </div>
    <div class="plans">
      <div class="plan">
        <div class="plan-name">Basic documentation</div>
        <div class="plan-desc">A one-off set of core policies to get an existing business compliant.</div>
        <div class="plan-price mono">&#163;199&#8211;&#163;399</div>
        <ul><li>GDPR privacy policy &amp; data map</li><li>Core staff policies</li><li>Basic risk register</li></ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-ghost">Start here</a>
      </div>
      <div class="plan featured">
        <div class="plan-name">Monthly compliance support</div>
        <div class="plan-desc">Ongoing documentation, monitoring and audit-readiness for a business already trading.</div>
        <div class="plan-price mono">&#163;299&#8211;&#163;799<span style="font-size:0.9rem;">/mo</span></div>
        <ul><li>Everything in Basic</li><li>Staff record tracking &amp; reminders</li><li>Quarterly risk assessment review</li><li>Priority support before inspections</li></ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-primary">Most common choice</a>
      </div>
      <div class="plan">
        <div class="plan-name">ISO-readiness project</div>
        <div class="plan-desc">A fixed-scope project to take you from where you are to stage 1 audit-ready.</div>
        <div class="plan-price mono">&#163;1,500&#8211;&#163;5,000+</div>
        <ul><li>Full gap assessment against Annex A</li><li>Complete policy &amp; evidence set</li><li>Staff briefing &amp; internal audit</li><li>Handoff to your certification body</li></ul>
        <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-ghost">Discuss scope</a>
      </div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta-final" id="contact-cta">
  <div class="wrap">
    <h2>Get an honest read on where your compliance stands</h2>
    <p>A 30-minute review covers what's already in place, what's missing, and roughly what it would take to close the gap.</p>
    <div class="hero-ctas">
      <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold">Book a compliance review</a>
      <a href="#services-section" class="btn btn-ghost">Back to services</a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
