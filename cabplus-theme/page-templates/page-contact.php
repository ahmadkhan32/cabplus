<?php
/**
 * Template Name: Contact
 * CABPLUS — page-templates/page-contact.php
 */
get_header();

$submitted = false;
$errors    = array();

if ( $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cabplus_contact_nonce']) ) {
    if ( wp_verify_nonce( sanitize_text_field($_POST['cabplus_contact_nonce']), 'cabplus_contact_form' ) ) {
        $name    = sanitize_text_field( $_POST['contact_name'] ?? '' );
        $email   = sanitize_email( $_POST['contact_email'] ?? '' );
        $phone   = sanitize_text_field( $_POST['contact_phone'] ?? '' );
        $service = sanitize_text_field( $_POST['contact_service'] ?? '' );
        $message = sanitize_textarea_field( $_POST['contact_message'] ?? '' );

        if ( empty($name) )    $errors[] = 'Please enter your name.';
        if ( !is_email($email) ) $errors[] = 'Please enter a valid email address.';
        if ( empty($message) ) $errors[] = 'Please enter a message.';

        if ( empty($errors) ) {
            $to      = get_option('admin_email');
            $subject = 'New enquiry from ' . $name . ' — CABPLUS';
            $body    = "Name: $name\nEmail: $email\nPhone: $phone\nService of interest: $service\n\nMessage:\n$message";
            $headers = array( 'Content-Type: text/plain; charset=UTF-8', 'Reply-To: ' . $email );
            wp_mail( $to, $subject, $body, $headers );
            $submitted = true;
        }
    }
}

$services = cabplus_get_services();
?>

<section class="page-hero">
  <div class="wrap">
    <span class="kicker mono">GET IN TOUCH</span>
    <h1>Contact Us</h1>
    <p class="lead">Book a free 30-minute discovery call, ask a question or request a quote. We respond within one business day.</p>
  </div>
</section>

<section class="contact-section">
  <div class="wrap contact-grid">

    <div class="contact-form-wrap">
      <?php if ($submitted): ?>
      <div class="form-success">
        <svg width="48" height="48" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="var(--teal)" opacity="0.2"/><path d="M14 24l8 8 14-14" stroke="var(--teal)" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
        <h3>Thank you, we'll be in touch!</h3>
        <p>We've received your message and will respond within one business day.</p>
      </div>
      <?php else: ?>
        <?php if (!empty($errors)): ?>
        <div class="form-errors">
          <?php foreach ($errors as $e): ?><p>&#9888; <?php echo esc_html($e); ?></p><?php endforeach; ?>
        </div>
        <?php endif; ?>

      <form method="POST" class="contact-form" novalidate>
        <?php wp_nonce_field( 'cabplus_contact_form', 'cabplus_contact_nonce' ); ?>

        <div class="form-row form-row--2">
          <div class="form-group">
            <label for="contact_name">Full name <span class="req">*</span></label>
            <input type="text" id="contact_name" name="contact_name" value="<?php echo isset($_POST['contact_name']) ? esc_attr($_POST['contact_name']) : ''; ?>" placeholder="Your name" required>
          </div>
          <div class="form-group">
            <label for="contact_email">Email address <span class="req">*</span></label>
            <input type="email" id="contact_email" name="contact_email" value="<?php echo isset($_POST['contact_email']) ? esc_attr($_POST['contact_email']) : ''; ?>" placeholder="you@company.com" required>
          </div>
        </div>

        <div class="form-row form-row--2">
          <div class="form-group">
            <label for="contact_phone">Phone (optional)</label>
            <input type="tel" id="contact_phone" name="contact_phone" value="<?php echo isset($_POST['contact_phone']) ? esc_attr($_POST['contact_phone']) : ''; ?>" placeholder="+44 7700 000000">
          </div>
          <div class="form-group">
            <label for="contact_service">Service of interest</label>
            <select id="contact_service" name="contact_service">
              <option value="">&#8212; Select a service &#8212;</option>
              <?php foreach ($services as $svc): ?>
              <option value="<?php echo esc_attr($svc['slug']); ?>" <?php selected( (isset($_POST['contact_service']) ? $_POST['contact_service'] : ''), $svc['slug'] ); ?>>
                <?php echo esc_html(strip_tags($svc['title'])); ?>
              </option>
              <?php endforeach; ?>
              <option value="general">General enquiry</option>
            </select>
          </div>
        </div>

        <div class="form-group">
          <label for="contact_message">Message <span class="req">*</span></label>
          <textarea id="contact_message" name="contact_message" rows="6" placeholder="Tell us about your business and what you need help with..." required><?php echo isset($_POST['contact_message']) ? esc_textarea($_POST['contact_message']) : ''; ?></textarea>
        </div>

        <button type="submit" class="btn btn-gold" style="width:100%;justify-content:center;font-size:1rem;padding:14px 24px;">
          Send message &#8594;
        </button>
        <p style="font-size:0.78rem;color:var(--cream-muted);margin-top:12px;text-align:center;">We respond within 1 business day. Your data is handled in accordance with our privacy policy.</p>
      </form>
      <?php endif; ?>
    </div>

    <aside class="contact-info">
      <div class="contact-info-card">
        <h4>Direct contact</h4>
        <p><a href="mailto:cp@cabplus.uk">cp@cabplus.uk</a></p>
        <p style="font-size:0.82rem;color:var(--cream-muted);margin-top:8px;">UK-based independent consultancy</p>
        <div style="margin-top:14px;padding-top:12px;border-top:1px solid var(--ink-line);">
          <a href="https://wa.me/447752666100" target="_blank" rel="noopener noreferrer" class="whatsapp-btn" style="width:100%;box-sizing:border-box;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" style="flex-shrink:0;" xmlns="http://www.w3.org/2000/svg"><path d="M12.04 2C6.58 2 2.13 6.45 2.13 11.91C2.13 13.66 2.59 15.36 3.45 16.86L2.05 22L7.3 20.62C8.75 21.41 10.38 21.83 12.04 21.83C17.5 21.83 21.95 17.38 21.95 11.92C21.95 9.27 20.92 6.78 19.05 4.91C17.18 3.04 14.69 2 12.04 2Z" fill="#25D366"/><path d="M12.04 3.67C16.58 3.67 20.28 7.37 20.28 11.92C20.28 16.46 16.58 20.17 12.04 20.17C10.66 20.17 9.32 19.82 8.14 19.17L7.44 18.78L4.32 19.6L5.15 16.56L4.72 15.84C4.01 14.64 3.63 13.29 3.63 11.91C3.63 7.37 7.5 3.67 12.04 3.67ZM16.96 14.37C16.7 14.24 15.38 13.59 15.13 13.5C14.88 13.41 14.7 13.37 14.52 13.63C14.34 13.89 13.82 14.5 13.66 14.68C13.5 14.86 13.34 14.88 13.08 14.75C12.82 14.62 11.99 14.35 11 13.47C10.23 12.78 9.71 11.93 9.55 11.67C9.39 11.41 9.53 11.27 9.66 11.14C9.78 11.02 9.92 10.84 10.05 10.69C10.18 10.54 10.22 10.43 10.31 10.25C10.4 10.07 10.35 9.92 10.28 9.79C10.21 9.66 9.69 8.38 9.47 7.86C9.26 7.35 9.04 7.42 8.88 7.41C8.73 7.4 8.55 7.4 8.37 7.4C8.19 7.4 7.9 7.47 7.65 7.74C7.4 8.01 6.7 8.66 6.7 9.98C6.7 11.3 7.66 12.57 7.8 12.75C7.94 12.93 9.69 15.63 12.38 16.79C13.02 17.07 13.52 17.23 13.91 17.36C14.55 17.56 15.14 17.53 15.6 17.46C16.12 17.38 17.2 16.8 17.42 16.17C17.65 15.54 17.65 15.01 17.58 14.88C17.51 14.75 17.33 14.67 17.07 14.54L16.96 14.37Z" fill="white"/></svg>
            <span>+44 7752 666100</span>
          </a>
          <p style="font-size:0.76rem;color:var(--cream-muted);margin-top:6px;text-align:center;">Instant advisor assistance on WhatsApp</p>
        </div>
      </div>
      <div class="contact-info-card">
        <h4>What happens next</h4>
        <ul class="contact-steps-list">
          <li>We read your message and respond within 1 business day</li>
          <li>We book a 30-minute discovery call (free)</li>
          <li>We send a written summary of what we'd recommend and an indicative cost</li>
          <li>You decide whether to proceed &#8212; no pressure</li>
        </ul>
      </div>
      <div class="contact-info-card">
        <h4>Services</h4>
        <div class="foot-services">
          <?php foreach ($services as $svc): ?>
          <a href="<?php echo esc_url(home_url('/services/' . $svc['slug'])); ?>"><?php echo $svc['title']; ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </aside>

  </div>
</section>

<?php get_footer(); ?>
