<?php
/*
Plugin Name: kodam broker menu
Description: Custom menu plugin with desktop/mobile assets.
Version: 1.3
Author: <a href="mailto:yazdizadeharefeh@gmail.com">عارفه یزدی زاده</a>
*/

if (!defined('ABSPATH')) {
    exit;
}

define('CMB_VERSION', '1.2');
define('CMB_PATH', plugin_dir_path(__FILE__));
define('CMB_URL', plugin_dir_url(__FILE__));

// Backward-compatible alias used inside the templates.
define('AMENU_URL', CMB_URL);

require_once CMB_PATH . 'includes/helpers.php';
require_once CMB_PATH . 'includes/admin-page.php';
require_once CMB_PATH . 'includes/frontend.php';
