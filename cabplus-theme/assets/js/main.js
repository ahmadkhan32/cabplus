/**
 * CABPLUS AI Compliance - main.js v2.2
 * Sticky header | Mobile menu | Scroll animations | AJAX contact form
 */
(function () {
  'use strict';

  /* Sticky header shadow */
  var hdr = document.getElementById('site-header');
  if (hdr) {
    window.addEventListener('scroll', function () {
      hdr.classList.toggle('scrolled', window.scrollY > 20);
    }, { passive: true });
  }

  /* Mobile menu toggle */
  var toggle = document.getElementById('menuToggle');
  var mob    = document.getElementById('mobileNav');
  if (toggle && mob) {
    toggle.addEventListener('click', function () {
      var open = mob.classList.toggle('open');
      toggle.setAttribute('aria-expanded', String(open));
      toggle.innerHTML = open ? '&#10005;' : '&#9776;';
    });
  }
  window.closeMob = function () {
    if (!mob) return;
    mob.classList.remove('open');
    if (toggle) { toggle.setAttribute('aria-expanded', 'false'); toggle.innerHTML = '&#9776;'; }
  };
  document.querySelectorAll('.mobile-nav a').forEach(function (a) {
    a.addEventListener('click', window.closeMob);
  });

  /* Desktop dropdown smooth hover with grace period */
  var dropdownItems = document.querySelectorAll('nav.links .nav-list .menu-item-has-children');
  dropdownItems.forEach(function (item) {
    var timer = null;
    item.addEventListener('mouseenter', function () {
      if (timer) { clearTimeout(timer); timer = null; }
      item.classList.add('dropdown-active');
    });
    item.addEventListener('mouseleave', function () {
      timer = setTimeout(function () {
        item.classList.remove('dropdown-active');
      }, 150);
    });
  });

  /* Active nav on scroll */
  var sections = document.querySelectorAll('section[id]');
  var navLinks = document.querySelectorAll('nav.links .nav-list a');
  if (sections.length && navLinks.length && 'IntersectionObserver' in window) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          navLinks.forEach(function (l) { l.classList.remove('active'); });
          var lnk = document.querySelector('nav.links .nav-list a[href="#' + e.target.id + '"]');
          if (lnk) lnk.classList.add('active');
        }
      });
    }, { rootMargin: '-40% 0px -55% 0px' });
    sections.forEach(function (s) { io.observe(s); });
  }

  /* Card entrance animations */
  if ('IntersectionObserver' in window) {
    var obs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
          obs.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });
    document.querySelectorAll('.svc-card, .plan, .step, .stat, .value-card').forEach(function (c) {
      c.style.opacity   = '0';
      c.style.transform = 'translateY(16px)';
      c.style.transition = 'opacity .45s ease, transform .45s ease';
      obs.observe(c);
    });
  }

  /* AJAX Contact Form handler
   * Works with both:
   *  - cabplusData.ajaxUrl / cabplusData.nonce  (theme's wp_localize_script)
   *  - PHP fallback (form submits normally if fetch fails or JS is unavailable)
   */
  function initAjaxForms() {
    document.querySelectorAll('.cabplus-ajax-form-wrap').forEach(function (wrap) {
      var form       = wrap.querySelector('.cabplus-contact-form');
      var successDiv = wrap.querySelector('.cabplus-form-success');
      var errorDiv   = wrap.querySelector('.cabplus-form-error');
      if (!form) return;

      form.addEventListener('submit', function (e) {
        e.preventDefault();

        var btnText    = form.querySelector('.btn-text');
        var btnLoading = form.querySelector('.btn-loading');
        var submitBtn  = form.querySelector('[type="submit"]');

        /* Client-side validation */
        var valid = true;
        form.querySelectorAll('[required]').forEach(function (f) {
          if (!f.value.trim()) { f.style.borderColor = 'var(--amber,#C2793A)'; valid = false; }
          else f.style.borderColor = '';
        });
        if (!valid) {
          if (errorDiv) { errorDiv.style.display = 'block'; errorDiv.textContent = 'Please fill in all required fields.'; }
          return;
        }
        if (errorDiv) errorDiv.style.display = 'none';
        if (submitBtn) submitBtn.disabled = true;
        if (btnText)   btnText.style.display = 'none';
        if (btnLoading) btnLoading.style.display = 'inline';

        /* Use cabplusData injected by wp_localize_script */
        var cfg = window.cabplusData;
        if (!cfg || !cfg.ajaxUrl) {
          /* Fallback: allow standard PHP POST */
          form.removeEventListener('submit', arguments.callee);
          form.submit();
          return;
        }

        var fd = new FormData(form);
        fd.append('action', cfg.action || 'cabplus_contact');
        fd.append('nonce',  cfg.nonce  || '');

        fetch(cfg.ajaxUrl, { method: 'POST', body: fd })
          .then(function (r) { return r.json(); })
          .then(function (json) {
            if (json.success) {
              form.style.display = 'none';
              if (successDiv) successDiv.style.display = 'block';
            } else {
              var msg = json.data && json.data.message ? json.data.message : 'Something went wrong. Please try again.';
              if (errorDiv) { errorDiv.style.display = 'block'; errorDiv.textContent = msg; }
              if (submitBtn) submitBtn.disabled = false;
              if (btnText)   btnText.style.display = 'inline';
              if (btnLoading) btnLoading.style.display = 'none';
            }
          })
          .catch(function () {
            var msg = 'Network error. Please try again or email cp@cabplus.uk';
            if (errorDiv) { errorDiv.style.display = 'block'; errorDiv.textContent = msg; }
            if (submitBtn) submitBtn.disabled = false;
            if (btnText)   btnText.style.display = 'inline';
            if (btnLoading) btnLoading.style.display = 'none';
          });
      });
    });
  }

  initAjaxForms();

})();