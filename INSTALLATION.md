# CABPLUS WordPress Theme — Installation & Setup Guide

> **Important**: CABPLUS is an all-in-one **WordPress Theme** (not a plugin). 
> It now has **100% Automated Zero-Config Setup** built in. As soon as you activate the theme, everything configures itself automatically!

---

## Why did you see "No valid plugins were found"?

In WordPress, **Themes** and **Plugins** have separate upload screens:
- **Plugins** (`/wp-admin/plugin-install.php`) only accepts WordPress plugins. If you upload a theme zip there, WordPress shows:
  ```
  The package could not be installed. No valid plugins were found.
  Plugin installation failed.
  ```
- **Themes** (`/wp-admin/theme-install.php`) is where themes must be uploaded.

---

## 🚀 How to Install (Upload & You're Done!)

1. Open your WordPress Admin Dashboard.
2. In the left sidebar, navigate to:
   👉 **Appearance** → **Themes** *(Do NOT go to Plugins)*
3. Click the **Add New Theme** button at the top.
4. Click the **Upload Theme** button at the very top.
5. Click **Choose File** and select:
   📁 `cabplus-theme.zip` *(located in your `Downloads\CabbPlus` folder)*
6. Click **Install Now**.
7. Click **Activate**.

---

## ⚡ What Happens Automatically on Activation:

You do **not** need to manually create pages, configure menus, or adjust permalinks:
- ✅ **All Pages Created Automatically**:
  - `Home` (assigned front-page template)
  - `Our Services` (`/services/`)
  - `Pricing & Packages` (`/pricing/`)
  - `Housing & Supported Living` (`/housing/`)
  - `About CABPLUS` (`/about/`)
  - `Contact Us` (`/contact/`)
- ✅ **Homepage Configured**: Automatically sets WordPress to display the static "Home" front page.
- ✅ **Navigation Menu Built**: Automatically generates "CABPLUS Main Menu", adds all pages + service dropdowns, and assigns it to the header navigation.
- ✅ **Permalinks Configured**: Automatically sets clean SEO URLs (`/%postname%/`).
- ✅ **Screenshot & Visuals**: Preview thumbnail appears in your WordPress Themes grid.
- ✅ **All 7 Service URLs Route Automatically**:
  - `https://cabplus.uk/services/` (All Services Overview)
  - `https://cabplus.uk/services/social-media-marketing/`
  - `https://cabplus.uk/services/business-ideas/`
  - `https://cabplus.uk/services/finance-investment/`
  - `https://cabplus.uk/services/business-registration/`
  - `https://cabplus.uk/services/websites-digital-solutions/`
  - `https://cabplus.uk/services/gdpr-iso-cyber/`
  - `https://cabplus.uk/services/business-growth/`

---

## 🔄 Updating the Theme in WordPress:

1. In WordPress Admin, go to **Appearance** → **Themes** → **Add New Theme** → **Upload Theme**.
2. Select the updated `cabplus-theme.zip`.
3. Click **Install Now**.
4. WordPress will say: *"This theme is already installed"*. Click **"Replace active with uploaded"**.
5. Go to **CABPLUS** in your left admin sidebar and click **"One-Click Setup: Create Pages + Fix Permalinks"** (or go to **Settings** → **Permalinks** and click **Save Changes**).
6. If Hostinger / LiteSpeed Cache is active, click **LiteSpeed Cache** → **Purge All** so any previously cached 404 responses are cleared.