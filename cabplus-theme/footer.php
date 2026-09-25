<?php
/**
 * CABPLUS - footer.php
 */
$services = cabplus_get_services();
?>

<footer id="site-footer">
  <div class="wrap">
    <div class="foot-grid">

      <!-- Brand -->
      <div class="foot-brand">
        <a href="<?php echo esc_url(home_url('/')); ?>" class="foot-logo-wrap" aria-label="<?php bloginfo('name'); ?> Home">
          <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/cabplus-logo.png'); ?>" alt="<?php bloginfo('name'); ?> Logo" class="foot-logo-img">
          <div>
            <div class="foot-brand-name">CABPLUS&#174;</div>
            <div class="foot-brand-sub">AI COMPLIANCE</div>
          </div>
        </a>
        <p>AI-assisted compliance and business support for small businesses, housing providers and supported living services in the UK.</p>
        <p class="foot-tagline">IDEAS &#183; COMPLIANCE &#183; GROWTH &#183; A BRIGHTER TOMORROW</p>
      </div>

      <!-- Services -->
      <div class="foot-col">
        <h4>Services</h4>
        <div class="foot-services">
          <?php foreach ($services as $svc): ?>
          <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'])); ?>"><?php echo strip_tags($svc['title']); ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Navigate -->
      <div class="foot-col">
        <h4>Navigate</h4>
        <div class="foot-links-col">
          <a href="<?php echo esc_url(home_url('/')); ?>">Home</a>
          <a href="<?php echo esc_url(home_url('/services')); ?>">All Services</a>
          <a href="<?php echo esc_url(home_url('/pricing')); ?>">Pricing &amp; Packages</a>
          <a href="<?php echo esc_url(home_url('/housing')); ?>">Supported Living &amp; Housing</a>
          <a href="<?php echo esc_url(home_url('/about')); ?>">About CABPLUS</a>
          <a href="<?php echo esc_url(home_url('/contact')); ?>">Contact Us</a>
        </div>
      </div>

      <!-- Contact -->
      <div class="foot-col">
        <h4>Contact</h4>
        <div class="foot-contact">
          <p><a href="mailto:cp@cabplus.uk">cp@cabplus.uk</a></p>
          <p style="margin-top:8px;">
            <a href="https://wa.me/447752666100" target="_blank" rel="noopener noreferrer" class="whatsapp-link">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" style="flex-shrink:0;" xmlns="http://www.w3.org/2000/svg"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.04 14.69 2 12.04 2Z" fill="#25D366"/><path d="M12.04 3.67C16.58 3.67 20.28 7.37 20.28 11.92C20.28 16.46 16.58 20.17 12.04 20.17C10.66 20.17 9.32 19.82 8.14 19.17L7.44 18.78L4.32 19.6L5.15 16.56L4.72 15.84C4.01 14.64 3.63 13.29 3.63 11.91C3.63 7.37 7.5 3.67 12.04 3.67ZM16.96 14.37C16.7 14.24 15.38 13.59 15.13 13.5C14.88 13.41 14.7 13.37 14.52 13.63C14.34 13.89 13.82 14.5 13.66 14.68C13.5 14.86 13.34 14.88 13.08 14.75C12.82 14.62 11.99 14.35 11 13.47C10.23 12.78 9.71 11.93 9.55 11.67C9.39 11.41 9.53 11.27 9.66 11.14C9.78 11.02 9.92 10.84 10.05 10.69C10.18 10.54 10.22 10.43 10.31 10.25C10.4 10.07 10.35 9.92 10.28 9.79C10.21 9.66 9.69 8.38 9.47 7.86C9.26 7.35 9.04 7.42 8.88 7.41C8.73 7.4 8.55 7.4 8.37 7.4C8.19 7.4 7.9 7.47 7.65 7.74C7.4 8.01 6.7 8.66 6.7 9.98C6.7 11.3 7.66 12.57 7.8 12.75C7.94 12.93 9.69 15.63 12.38 16.79C13.02 17.07 13.52 17.23 13.91 17.36C14.55 17.56 15.14 17.53 15.6 17.46C16.12 17.38 17.2 16.8 17.42 16.17C17.65 15.54 17.65 15.01 17.58 14.88C17.51 14.75 17.33 14.67 17.07 14.54L16.96 14.37Z" fill="white"/></svg>
              <span>+44 7752 666100</span>
            </a>
          </p>
          <p style="font-size:0.8rem;color:var(--cream-muted);margin-top:6px;">UK-based independent consultancy</p>
          <a href="<?php echo esc_url(home_url('/contact')); ?>" class="btn btn-gold" style="margin-top:14px;display:inline-flex;">Get in touch</a>
        </div>
      </div>

    </div>

    <p class="disclaimer">CABPLUS AI Compliance is an independent consultancy and is not an accredited certification body. We prepare policies, evidence and audit-readiness for standards including ISO/IEC 27001, Cyber Essentials and UK GDPR; formal certification against these standards is issued only by accredited third-party certification bodies. Pricing shown is indicative and confirmed after an initial review. CABPLUS&#174; is a registered trade mark. &copy; <?php echo date('Y'); ?> CABPLUS.</p>
  </div>
</footer>

<!-- Floating WhatsApp Button -->
<a href="https://wa.me/447752666100" target="_blank" rel="noopener noreferrer" class="whatsapp-float" aria-label="Chat with CABPLUS on WhatsApp">
  <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.04 14.69 2 12.04 2Z" fill="#25D366"/><path d="M12.04 3.67C16.58 3.67 20.28 7.37 20.28 11.92C20.28 16.46 16.58 20.17 12.04 20.17C10.66 20.17 9.32 19.82 8.14 19.17L7.44 18.78L4.32 19.6L5.15 16.56L4.72 15.84C4.01 14.64 3.63 13.29 3.63 11.91C3.63 7.37 7.5 3.67 12.04 3.67ZM16.96 14.37C16.7 14.24 15.38 13.59 15.13 13.5C14.88 13.41 14.7 13.37 14.52 13.63C14.34 13.89 13.82 14.5 13.66 14.68C13.5 14.86 13.34 14.88 13.08 14.75C12.82 14.62 11.99 14.35 11 13.47C10.23 12.78 9.71 11.93 9.55 11.67C9.39 11.41 9.53 11.27 9.66 11.14C9.78 11.02 9.92 10.84 10.05 10.69C10.18 10.54 10.22 10.43 10.31 10.25C10.4 10.07 10.35 9.92 10.28 9.79C10.21 9.66 9.69 8.38 9.47 7.86C9.26 7.35 9.04 7.42 8.88 7.41C8.73 7.4 8.55 7.4 8.37 7.4C8.19 7.4 7.9 7.47 7.65 7.74C7.4 8.01 6.7 8.66 6.7 9.98C6.7 11.3 7.66 12.57 7.8 12.75C7.94 12.93 9.69 15.63 12.38 16.79C13.02 17.07 13.52 17.23 13.91 17.36C14.55 17.56 15.14 17.53 15.6 17.46C16.12 17.38 17.2 16.8 17.42 16.17C17.65 15.54 17.65 15.01 17.58 14.88C17.51 14.75 17.33 14.67 17.07 14.54L16.96 14.37Z" fill="white"/></svg>
  <span class="whatsapp-float-tooltip">Chat on WhatsApp (+44 7752 666100)</span>
</a>

<?php wp_footer(); ?>
</body>
</html>