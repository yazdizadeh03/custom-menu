<?php

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Plugin options with sensible defaults.
 *
 * @return array{show_logo:bool, show_search:bool}
 */
function cmb_get_options()
{
    $defaults = [
        'show_logo'   => 1,
        'show_search' => 1,
    ];

    return wp_parse_args(get_option('cmb_settings', []), $defaults);
}

/**
 * Single option accessor.
 */
function cmb_option($key)
{
    $options = cmb_get_options();
    return isset($options[$key]) ? $options[$key] : null;
}

add_action('admin_menu', function () {
    add_menu_page(
        'Menu Builder',
        'Menu Builder',
        'manage_options',
        'cmb-settings',
        'cmb_settings_page',
        'dashicons-menu',
        25
    );
});

add_action('admin_init', function () {
    register_setting('cmb_settings_group', 'cmb_settings', [
        'type'              => 'array',
        'sanitize_callback' => 'cmb_sanitize_settings',
        'default'           => [],
    ]);
});

/**
 * Force checkbox values to clean 0/1.
 */
function cmb_sanitize_settings($input)
{
    return [
        'show_logo'   => empty($input['show_logo']) ? 0 : 1,
        'show_search' => empty($input['show_search']) ? 0 : 1,
    ];
}

function cmb_settings_page()
{
    $options = cmb_get_options();
    ?>
    <div class="wrap">
        <h1>تنظیمات منو</h1>

        <form method="post" action="options.php">
            <?php settings_fields('cmb_settings_group'); ?>

            <table class="form-table">
                <tr>
                    <th>نمایش لوگو</th>
                    <td>
                        <label>
                            <input type="checkbox" name="cmb_settings[show_logo]" value="1" <?php checked($options['show_logo'], 1); ?>>
                            فعال
                        </label>
                    </td>
                </tr>

                <tr>
                    <th>نمایش جستجو</th>
                    <td>
                        <label>
                            <input type="checkbox" name="cmb_settings[show_search]" value="1" <?php checked($options['show_search'], 1); ?>>
                            فعال
                        </label>
                    </td>
                </tr>
            </table>

            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
