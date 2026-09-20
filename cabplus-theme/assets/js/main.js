/**
 * CABPLUS AI Compliance — main.js v2.0
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
      toggle.setAttribute('aria-expanded', open);
      toggle.innerHTML = open ? '&#10005;' : '&#9776;';
    });
  }
  window.closeMob = function () {
    if (!mob) return;
    mob.classList.remove('open');
    if (toggle) {
      toggle.setAttribute('aria-expanded', 'false');
      toggle.innerHTML = '&#9776;';
    }
  };

  /* Active nav on scroll (homepage sections) */
  var sections  = document.querySelectorAll('section[id]');
  var navLinks  = document.querySelectorAll('nav.links .nav-list a');
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

  /* Smooth close mobile nav on anchor click */
  document.querySelectorAll('.mobile-nav a').forEach(function (a) {
    a.addEventListener('click', function () { window.closeMob(); });
  });

  /* Contact form field validation feedback */
  var form = document.querySelector('.contact-form');
  if (form) {
    form.addEventListener('submit', function (e) {
      var valid = true;
      form.querySelectorAll('[required]').forEach(function (field) {
        if (!field.value.trim()) {
          field.style.borderColor = 'var(--amber)';
          valid = false;
        } else {
          field.style.borderColor = '';
        }
      });
      if (!valid) e.preventDefault();
    });
  }

  /* Animate service cards into view */
  if ('IntersectionObserver' in window) {
    var cards = document.querySelectorAll('.svc-card, .plan, .step, .stat');
    var cardObs = new IntersectionObserver(function (entries) {
      entries.forEach(function (e) {
        if (e.isIntersecting) {
          e.target.style.opacity = '1';
          e.target.style.transform = 'translateY(0)';
          cardObs.unobserve(e.target);
        }
      });
    }, { threshold: 0.1 });
    cards.forEach(function (c) {
      c.style.opacity  = '0';
      c.style.transform = 'translateY(16px)';
      c.style.transition = 'opacity .45s ease, transform .45s ease';
      cardObs.observe(c);
    });
  }

})();
