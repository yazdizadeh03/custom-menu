<?php

if (!defined('ABSPATH')) {
    exit;
}
add_action('wp_enqueue_scripts', function () {

    $ver = static function ($rel) {
        $path = CMB_PATH . $rel;
        return file_exists($path) ? filemtime($path) : CMB_VERSION;
    };

    if (wp_is_mobile()) {
        wp_enqueue_style('cmb-mobile-css', CMB_URL . 'assets/css/mobile.css', [], $ver('assets/css/mobile.css'));
        wp_enqueue_script('cmb-mobile-js', CMB_URL . 'assets/js/mobile.js', [], $ver('assets/js/mobile.js'), true);
    } else {
        wp_enqueue_style('cmb-desktop-css', CMB_URL . 'assets/css/desktop.css', [], $ver('assets/css/desktop.css'));
        wp_enqueue_script('cmb-desktop-js', CMB_URL . 'assets/js/desktop.js', [], $ver('assets/js/desktop.js'), true);
    }
});

add_shortcode('custom_menu_kdm', function () {

    ob_start();

    if (wp_is_mobile()) {
        include CMB_PATH . 'templates/menu-mobile.php';
    } else {
        include CMB_PATH . 'templates/menu-desktop.php';
    }

    return ob_get_clean();
});

add_action('wp_footer', function () {
    $sprite = CMB_PATH . 'assets/sprite.svg';

    if (file_exists($sprite)) {
        echo '<div style="display:none">';
        echo file_get_contents($sprite);
        echo '</div>';
    }
});