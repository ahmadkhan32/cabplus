CABPLUS AI Compliance WordPress Theme v2.0
==========================================

INSTALLATION
------------
1. Go to WordPress Admin > Appearance > Themes > Add New > Upload Theme
2. Upload cabplus-theme.zip
3. Click Install Now > Activate

OR (manual):
1. Copy the cabplus-theme/ folder to wp-content/themes/
2. Go to Appearance > Themes and activate CABPLUS AI Compliance

SETUP AFTER ACTIVATION
-----------------------
1. SET HOMEPAGE
   Appearance > Customize > Homepage Settings
   - Choose "A static page"
   - Select or create a page called "Home"
   - Assign template: "Front Page" (front-page.php is auto-used)

2. CREATE PAGES
   Create the following pages in Pages > Add New:
   
   Page Title       | Template
   ---------------- | ---------------------------
   Home             | (default, front-page.php handles this)
   Services         | All Services
   About            | About
   Contact          | Contact
   
   For each SERVICE PAGE, create a post under:
   Custom Post Types > Services (in admin sidebar)
   Use these slugs:
     - business-ideas
     - finance-investment
     - business-registration
     - business-growth
     - social-media-marketing
     - websites-digital-solutions
     - gdpr-iso-cyber

3. SET UP NAVIGATION
   Appearance > Menus > Create Menu
   Add: Home, Services (with sub-pages), About, Contact
   Assign to "Primary Menu" location
   Save Menu

4. FLUSH PERMALINKS
   Settings > Permalinks > Save Changes
   (This registers the Services custom post type URLs)

5. ASTRA COMPATIBILITY
   This theme is designed as a standalone theme.
   If you are using ASTRA: Go to Appearance > Themes and 
   switch to CABPLUS as the active theme. Elementor content 
   created under Astra can be migrated page by page.

FILE STRUCTURE
--------------
cabplus-theme/
├── style.css                          Theme header + CSS import
├── functions.php                      Theme setup, CPT, helpers, icons
├── header.php                         Site header with logo + nav
├── footer.php                         Site footer with logo + nav
├── front-page.php                     Homepage
├── index.php                          Blog fallback
├── page.php                           Generic page
├── 404.php                            404 error page
├── archive-cabplus_service.php        Services archive
├── single-cabplus_service.php         Individual service page
├── README.txt                         This file
├── page-templates/
│   ├── page-services.php              All Services page template
│   ├── page-about.php                 About page template
│   └── page-contact.php              Contact page template (with form)
├── template-parts/
│   ├── services-bar.php               Reusable 7-icon bar
│   └── cta-banner.php                Reusable CTA section
└── assets/
    ├── css/
    │   └── cabplus.css                Full design system CSS
    ├── js/
    │   └── main.js                    Navigation, animations, form validation
    └── images/
        └── (place cabplus-logo.png here if using img tag)

SERVICES INCLUDED
-----------------
1. Business Ideas
2. Finance & Investment
3. Business Registration
4. Business Growth
5. Social Media Marketing
6. Websites & Digital Solutions
7. GDPR / ISO 27001 / Cyber Essentials

COLOUR SCHEME
-------------
Navy:  #0F1B2E (background dark)
Navy:  #16273F (cards)
Gold:  #B8962E (brand gold)
Amber: #C2793A (accent)
Teal:  #3E7C6C (CTA green)
Cream: #F4F2EA (text)
Paper: #EDE9DE (light cards/pricing)

CONTACT
-------
cp@cabplus.uk
https://cabplus.uk

(c) 2026 CABPLUS. All rights reserved.
CABPLUS is a registered trade mark.
